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
			'dateTraversee' => $this->getDate(),
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
		$this->_heure=$result['heure'];
		// $this->_heure=substr($result['heure'], -8, 5);
		//--> Bateau[obj]
		$this->_bateau=new Bateau($result['idBateau'], null, null);
		$this->_bateau->retrieve();
		//--> Liaison[obj]
		$this->_liaison=new Liaison($result['codeLiaison']);
		$this->_liaison->retrieve();
	}

	public function update(){
		include "connexionDB.php";
		$req=$db->prepare("UPDATE Traversee
										SET dateTraversee=:dateTrav, heure=:heure, idBateau=:idBat, codeLiaison=:codeLiai
										WHERE num=:num");
		$req->execute([
			'num' => $this->num(),
			'dateTrav' => $this->getDate(),
			'heure' => $this->heure(),
			'idBat' => $this->bateau()->idBat(),
			'codeLiai' => $this->liaison()->getCode()
		]);
	}

	public function delete(){
		include "connexionDB.php";
		$req=$db->prepare("DELETE FROM Traversee
										WHERE num=:num");
		$req->execute(['num' => $this->num()]);
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
	public function dateTraversee(){
		$date=substr($this->_dateTraversee, -2)."/".substr($this->_dateTraversee, -5, 2)."/".substr($this->_dateTraversee, -10, 4);
		return htmlspecialchars($date);
	}
	public function getDate(){ return $this->_dateTraversee; }
	public function heure(){ return htmlspecialchars(substr($this->_heure, -8, 5)); }
	public function bateau(){	return $this->_bateau;	}
	public function liaison(){	return $this->_liaison;	}
}
