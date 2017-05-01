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

	/*** Fill if needed *** */
	public function fillMe($portDep, $portArr, $distance){
		$this->_distance = $distance;
		$this->_lePortDep = $portDep;
		$this->_lePortArr = $portArr;
	}

	public function create(){
		include "connexionDB.php";
		$stmt=$db->prepare("INSERT INTO Liaison(code, idPortDep, idPortArr, distance)
		VALUES(:code, :idPortD, :idPortA, :distance)");
		$stmt->execute([
			'code' => $this->getCode(),
			'idPortD' => $this->getLePortDep()->getId(),
			'idPortA' => $this->getLePortArr()->getId(),
			'distance' => $this->getDistance()
		]);
	}

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


	public function update(){
		include "connexionDB.php";
		$code=$this->getCode();
		$idPortD=$this->getLePortDep()->getId();
		$idPortA=$this->getLePortArr()->getId();
		$distance=$this->getDistance();
		$req=$db->prepare("UPDATE Liaison
										SET idPortDep=:idPortD, idPortArr=:idPortA, distance=:distance
										WHERE code=:code");
		$req->execute([
			'code' => $code,
			'idPortD' => $idPortD,
			'idPortA' => $idPortA,
			'distance' => $distance
		]);
	}

	public function delete(){
		include "connexionDB.php";
		$code=$this->getCode();
		$req=$db->prepare("DELETE FROM Liaison
										WHERE code=:code");
		$req->execute(['code' => $code]);
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

	/**
	  * Check if the code already exists in the database
	  * @param String The code to look up
	  * @return boolean True if the code exists, else false
	  */
	public function codeExists($code){
		include_once "connexionDB.php";
		$stmt=$db->prepare("SELECT code
										FROM Liaison
										WHERE code=:code;");
		$stmt->execute([
			"code" => $code
		]);
		if($stmt->rowCount() > 0){
			return true;
		}else{
			return false;
		}
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

	//////////  - GETTERS & SETTERS -  ////////////////
	public function getCode(){ return htmlspecialchars($this->_code); }
	public function getLePortDep(){ return $this->_lePortDep; }
	public function getLePortArr(){ return $this->_lePortArr; }
	public function getDistance(){ return htmlspecialchars($this->_distance); }
	public function getTraversees(){ return $this->_lesTraversees; }

	public function setLesTraversees($lesTraversees){ $this->_lesTraversees=$lesTraversees; }
}
