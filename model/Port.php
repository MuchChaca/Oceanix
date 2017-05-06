<?php
class Port{
	private $_id, $_nom;

	public function __construct($id){
		$this->_id=$id;
	}


	public function create(){
		include "connexionDB.php";
		$stmt=$db->prepare("INSERT INTO Port(nom)
											VALUES(:nom)");
		$stmt->execute([
			'nom' => $this->getNom()
		]);
		$this->_id= $db->lastInsertId();
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

	public function update(){
		include "connexionDB.php";
		$req=$db->prepare("UPDATE Port
		SET id=:id, nom=:nom
		WHERE id=:id");
		$req->execute([
			'id' => $this->getId(),
			'nom' => $this->getNom()
		]);
	}


	public function delete(){
		include "connexionDB.php";
		$req=$db->prepare("DELETE FROM Port
										WHERE id=:id");
		$req->execute([
			'id' => $this->getId()
		]);
	}

	//correct
	static public function findAll(){
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

	//////////  - GETTERS & SETTERS -  ////////////////
	public function getId(){ return $this->_id; }
	public function getNom(){ return $this->_nom; }

	public function setId($id){ $this->_id = $id ; }
	public function setNom($nom){ $this->_nom = $nom; }
}
