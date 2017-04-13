<?php

class Bateau
{
	private $_idBat;
	private $_nomBat;
	private $_bassinBat;
	function __construct($id, $nom, $bassin)
	{
		$this->_idBat = $id;
		$this->_nomBat = $nom;
		$this->_bassinBat = $bassin;
	}

	function create( )
	{
		include "connexionBD.php";
		$req="INSERT INTO Bateau (nom) VALUES ('". $this->_nomBat ."')";
		$db->exec($req);
	}

	/**
	  * Retrieve of CRUD
	  * @return array with the info from the database about the boat
	  */
	function retrieve(){
		include "connexionBD.php";
		$req=$db->prepare("SELECT *
				 FROM Bateau
				 WHERE id=:id;");
		$req->execute([':id' => $this->_idBat]);
		return $req->fetch();
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
		$req->exec([":nom" => $this->_nomBat,
							":id" => $this->_idBat]);
	}

	/**
	*
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
	* @return ID Id of the boat
	*/
	function idBat(){
		return $this->_idBat;
	}

	/**
	* @return NAME Name of the boat
	*/
	function nomBat(){
		return $this->_nomBat;
	}
}
?>
