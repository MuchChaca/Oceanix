<?php
class Port{
	private $_id, $_nom;

	public function __construct($id){
		$this->_id=$id;
	}
	public function getId(){
		return $this->_id;
	}
	public function getNom(){
		return $this->_nom;
	}

	public function retrieve(){
		include "connexionDB.php";   //fournis la base de donnée $db
		$req="SELECT nom
				FROM Port
				WHERE id=".$this->_id.";";
		$result=$db->query($req);
		$result=$result->fetch();
		$this->_nom=$result['nom'];
	}

	//correct
	public function findAll(){
		include "connexionDB.php";
		$req="SELECT *
				FROM Port;";
		$result=$db->query($req);
		$mesPorts=array();
		while($line=$result->fetch()){
			$nomPort=new Port($line['id']);
			$nomPort->retrieve();
			array_push($mesPorts, $nomPort);
		}
		return $mesPorts;
	}
}