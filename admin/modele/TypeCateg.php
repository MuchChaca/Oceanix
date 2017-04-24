<?php
class TypeCateg{
	private $_lettreCateg, $_numOrdre, $_libelle;

	function __construct($lettreCateg, $numOrdre, $libelle){
		$this->_lettreCateg= $lettreCateg;
		$this->_numOrdre= $numOrdre;
		$this->_libelle= $libelle;
	}

	/**** CRUD *****/
	/**
		* Create the TypeCateg in the database
	*/
	function create(){
		include "connexionDB.php";
		$req=$db->prepare("INSERT INTO TypeCateg (lettreCategorie, numOrdre, libelle)
				VALUES (':lettre', ':num', ':libelle')");
		$db->exec([":lettre" => $this->_lettreCateg,
							":num" => $this->_numOrdre,
							":libelle" => $this->_libelle]);
	}

	/**
	  * Retrieve of CRUD
	  */
	public function retrieve(){
		include "connexionDB.php";
		$req=$db->prepare("SELECT *
								FROM TypeCateg
								WHERE lettreCategorie=:lettre
									AND numOrdre=:num;");
		$req->execute([":lettre" => $this->_lettreCateg,
									":num" => $this->_numOrdre]);
		$result=$req->fetch();
		$this->_libelle=$result['libelle'];
	}

	/**
	  * UPDATE of CRUD
	  * Update de database with the data of this object.
	  */
	function update(){
		include "connexionDB.php";
		$req=$db->prepare("UPDATE TypeCateg
										SET libelle=:libelle
										WHERE lettreCategorie=:lettre
											AND numOrdre=:num;");
		$req->execute([":libelle" => $this->_libelle,
								":lettre" => $this->_lettreCateg,
								":num" => $this->_numOrdre]);
	}
	/**
	  * DELETE of CRUD
	  * Delete this object from database.
	  */
	function delete(){
		include "connexionDB.php";
		$req=$db->prepare("DELETE FROM TypeCateg
										WHERE lettreCategorie=:lettre
											AND numOrdre=:num;");
		$req->execute([":lettre" => $this->_lettreCateg,
									":num" => $this->_numOrdre]);
	}
		/*********id=".$typCateg->libelle().
	/**
		* A static function to get all the data from the TypeCateg table.
		* @return ArrayTypeCateg Array with all the data from the TypeCateg table.
		*/
	static function findAll(){
		include "connexionDB.php";
		$listTyCateg = array();
		$req=$db->query("SELECT *
									FROM TypeCateg;");
		while($tyCateg=$req->fetch()){
			$objTyCateg = new TypeCateg($tyCateg["lettreCategorie"], $tyCateg["numOrdre"], null);
			$objTyCateg->retrieve();
			$listTyCateg[]= $objTyCateg;
		}
		return $listTyCateg;
	}

	/**** GETTERS & SETTERS *****/
	//GETTERS
	function lettreCateg(){ return htmlspecialchars($this->_lettreCateg); }
	function numOrdre(){ return htmlspecialchars($this->_numOrdre); }
	function libelle(){ return htmlspecialchars($this->_libelle); }
	//SETTERS
	function setLettreCateg($lettre){ $this->_lettreCateg=$lettre; }
	function setNumOrdre($num){ $this->_numOrdre=$num; }
	function setLibelle($libelle){ $this->_libelle=$libelle; }
}
