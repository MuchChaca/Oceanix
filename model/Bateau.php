<?php
class Bateau{
	##==========  - VARS -  ==========##
	private $_id, $_nom;
	
	//\\=> Require a retrieve or create the SETTERS then use them
	public function __construct($id){
		$this->_id=$id;
	}
	
	##==========  - CRUD -  ==========##
	##==>  - RETRIEVE
	public function retrieve(){
		include "connexionDB.php";
		$req=$db->prepare("SELECT *
								FROM Bateau
								WHERE id=:id;");
		$req->execute([":id" => $this->_id]);
		$result=$req->fetch();
		$this->_nom=$result['nom'];
	}
	
	##==========  - GETTERS -  ==========##
	public function id(){	return $this->_id;	}
	public function nom(){	return $this->_nom;	}
}