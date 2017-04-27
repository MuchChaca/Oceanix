<?php

class Liaison{
	##==========  - VARS -  ==========##
	private $_code, $_distance;
	private $_lePortDep, $_lePortArr;
	private $_lesTraversees = array();

	//\\=> Require a retrieve or create the SETTERS then use them
	public function __construct($code){
		$this->_code=$code;
	}

	/*** Hydrate if needed *** */
	public function hydrate($code, $distance, $portDep, $portArr, $traversees){
		$this->_code = $code;
		$this->_distance = $distance;
		$this->_lePortDep = $portDep;
		$this->_lePortArr = $portArr;
		$this->_lesTraversees = $traversees;
	}

	public function getCode(){ return $this->_code; }
	public function getLePortDep(){ return $this->_lePortDep; }
	public function getLePortArr(){ return $this->_lePortArr; }
	public function getDistance(){ return $this->_distance; }
	public function getTraversees(){ return $this->_lesTraversees; }

	public function retrieve(){
		include "connexionDB.php";   //fournis la base de donnée $db
		//require_once "Port.php";
		$req="SELECT *
				FROM Liaison
				WHERE code=\"".$this->_code."\";";
		$result=$db->query($req);
		$result=$result->fetch();

		$this->_distance=$result['distance'];
		//Port Arrivé
		$arrPort= new Port($result['idPortArr']);
		$arrPort->retrieve();
		$this->_lePortArr=$arrPort;
		//Port Depart
		$depPort=new Port($result['idPortDep']);
		$depPort->retrieve();
		$this->_lePortDep= $depPort;
	}

	/*public function chargerTraversees(){
		$req=$db->prepare("SELECT num
								FROM traversee
								WHERE codeLiaison=\":codeLiaison\";");
		$req->execute(['codeLiaison'=>$this->_code]);
		while($result=$req->fetch()){
			//
		}
	}*/
	//::::::::::::::  - SetLesTraversees -  :::::::::::::://
	public function setLesTraversees($lesTraversees){
		$this->_lesTraversees=$lesTraversees;
	}

	public static function findAll(){
		include "connexionDB.php";   //fournis la base de donnée $db
		$mesLiaisons=array();
		$req=$db->prepare("SELECT code
								FROM Liaison;");
		$req->execute();
		while($result=$req->fetch()){
			$maLiaison=new Liaison($result['code']);
			$maLiaison->retrieve();
			array_push($mesLiaisons, $maLiaison);
		}
		return $mesLiaisons;
	}

	public static function chargerTraversees(Liaison $uneLiaison, $date){
		include "connexionDB.php";   //fournis la base de donnée $db
		//require_once "Traversee.php";
		$lesTraversees=array();
		$req=$db->prepare("SELECT num
								FROM Traversee
								WHERE codeLiaison=:codeLiaison AND dateTraversee=:date;");
		$req->execute([':codeLiaison'=> $uneLiaison->getCode(),
							':date'=>$date]);
		while($result=$req->fetch()){
			$uneTraversee=new Traversee($result['num']);
			$uneTraversee->retrieve();
			array_push($lesTraversees, $uneTraversee);
		}
		return $lesTraversees;
	}
}
