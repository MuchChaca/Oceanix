<?php
class Traversee{
	##==========  - VARS -  ==========##
	private $_num, $_dateTraversee, $_heure;
	private $_bateau;
	private $_liaison;

	//\\=> Require a retrieve or create the SETTERS then use them
	public function __construct($num){
		$this->_num=$num;
	}
	##==========  - CRUD -  ==========##
	function create(){
		include "connexionDB.php";
		$stmt=$db->prepare("INSERT INTO Traversee (dateTraversee, heure, idBateau, codeLiaison)
										VALUES (:dateTraversee, :heure, :idBateau, :codeLiaison)");
		$stmt->execute([
			'dateTraversee' => $this->dateTraversee(),
			'heure' => $this->heure(),
			'idBateau' => $this->bateau()->idBat(),
			'codeLiaison' => $this->liaison()->getCode()
		]);
		$this->_num= $db->lastInsertId();
	}

	##==>  - RETRIEVE
	public function retrieve(){
		##--presets
		include "connexionDB.php";
		//require_once "Bateau.php";
		//require_once "Liaison.php";
		##--corecode
		$req=$db->prepare("SELECT *
								FROM Traversee
								WHERE num=:num;");
		$req->execute([":num" => $this->_num]);
		$result=$req->fetch();
		$this->_dateTraversee=$result['dateTraversee'];
		$this->_heure=substr($result['heure'], -8, 5);
		//--> Bateau[obj]
		$this->_bateau=new Bateau($result['idBateau'], null, null);
		$this->_bateau->retrieve();
		//--> Liaison[obj]
		$this->_liaison=new Liaison($result['codeLiaison']);
		$this->_liaison->retrieve();
	}



	public function fillMe($date, $hour, $boat, $liaison){
		$this->_dateTraversee= $date;
		$this->_heure= $hour;
		$this->_bateau = $boat;
		$this->_liaison= $liaison;
	}

	public static function findAll(){
		include "connexionDB.php";
		$allTrav=array();
		$req=$db->prepare("SELECT num
								FROM Traversee;");
		$req->execute();
		while($result=$req->fetch()){
			$trav=new Traversee($result['num']);
			$trav->retrieve();
			array_push($allTrav, $trav);
		}
		return $allTrav;
	}


	##==========  - GETTERS -  ==========##
	public function num(){	return htmlspecialchars($this->_num);	}
	public function dateTraversee(){	return htmlspecialchars($this->_dateTraversee);	}
	public function heure(){
		return htmlspecialchars($this->_heure);
	}
	public function bateau(){	return $this->_bateau;	}
	public function liaison(){	return $this->_liaison;	}
}
