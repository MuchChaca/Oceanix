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
		//--> Bateau[obj]
		$this->_bateau=new Bateau($result['idBateau'], null, null);
		$this->_bateau->retrieve();
		//--> Liaison[obj]
		$this->_liaison=new Liaison($result['codeLiaison']);
		$this->_liaison->retrieve();
	}

	##==========  - GETTERS -  ==========##
	public function num(){	return $this->_num;	}
	public function dateTraversee(){	return $this->_dateTraversee;	}
	public function heure(){	return $this->_heure;	}
	public function bateau(){	return $this->_bateau;	}
	public function liaison(){	return $this->_liaison;	}
}
