<?php

class Bateau{
	private $_idBat;
	private $_nomBat;
	private $_bassinBat;

	function __construct($id, $nom, $bassin){
		$this->_idBat = $id;
		$this->_nomBat = $nom;
		$this->_bassinBat = $bassin;
	}

	function create( )
	{
		include "connexionDB.php";
		$req="INSERT INTO Bateau (nom) VALUES ('". $this->_nomBat ."')";
		$db->exec($req);
	}

	/**
	  * Retrieve of CRUD
	  */
	public function retrieve(){
		include "connexionDB.php";
		$req=$db->prepare("SELECT *
								FROM Bateau
								WHERE id=:id;");
		$req->execute([":id" => $this->_idBat]);
		$result=$req->fetch();
		$this->_nomBat=$result['nom'];
	}

	/**
	  * UPDATE of CRUD
	  * Update de database with the data of this object.
	  */
	function update(){
		include "connexionDB.php";
		$req=$db->prepare("UPDATE Bateau
										SET nom=:nom
										WHERE id=:id;");
		$req->execute([":nom" => $this->_nomBat,
							":id" => $this->_idBat]);
	}
	/**
	  * DELETE of CRUD
	  * Delete this object from database.
	  */
	function delete(){
		include "connexionDB.php";
		$req=$db->prepare("DELETE FROM Bateau
										WHERE id=:id ;");
		$req->execute([":id" => $this->_idBat]);
	}

	/**
	* Get the information of the wanted boat.
	* @param Bateau A boat in order to get alll his intel from the database
	* @return array Array of all the data of the boat submitted
	*/
	function getBateau(Bateau $bat){
		include "connexionBD.php";
		$req=$db->prepare("SELECT *
				 FROM Bateau
				 WHERE id=:id;");
		$req->execute([':id' => $bat->idBat()]);
		return $req->fetch();
	}

	/**
	* A static function to get all the data from the Bateau table.
	* @return ArrayBateau An array with all the boat of the Bateau table.
	*/
	static function findAll(){
		include "connexionDB.php";
		$listBat = array();
		$req=$db->query("SELECT *
									FROM Bateau;");
		while($bateau=$req->fetch()){
			$objBat = new Bateau($bateau["id"], $bateau["nom"], null);
			$listBat[] = $objBat;
		}
		return $listBat;
	}

/*********   SETTERS & GETTERS  *********/
// GETTERS
	function idBat(){ return htmlspecialchars($this->_idBat); }
	function nomBat(){ return htmlspecialchars($this->_nomBat); }
	function bassinBat(){ return htmlspecialchars($this->_bassinBat); }
// SETTERS
	function setId($id){ $this->_idBat=$id; }
	function setNom($name){ $this->_nomBat=$name; }
	function setBassinBat($bassin){ $this->_bassinBat=$bassin; }
}
?>
