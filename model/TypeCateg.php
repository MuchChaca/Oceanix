<?php
class TypeCateg{
   private $_lettreCategorie, $_numOrdre, $_libelle;

   public function __construct($lettreCategorie, $numOrdre, $libelle){
      $this->_lettreCategorie = $lettreCategorie;
      $this->_numOrdre=$numOrdre;
      $this->_libelle=$libelle;
   }

   ##============  - CRUD -  ============##
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

	##==>  - RETRIEVE
   public function retrieve(){
      include "connexionDB.php";
      $req=$db->prepare("SELECT *
                        FROM TypeCateg
                        WHERE lettreCategorie = :lettreCategorie AND numOrdre = :numOrdre;");
      $req->execute([":lettreCategorie" => $this->_lettreCategorie,
                             ":numOrdre" => $this->_numOrdre]);
      $result= $req->fetch();
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


   ##============  - FINDALL -  ============##
   public static function findAll(){
      include "connexionDB.php";
      $typeCategs=array();
      $req=$db->query("SELECT *
                       FROM TypeCateg;");
      while($result = $req->fetch()){
         $typeCateg= new TypeCateg($result['lettreCategorie'], $result['numOrdre'], $result['libelle']);
         //$typeCateg->retrieve();
         array_push($typeCategs, $typeCateg);
      }
      return $typeCategs;
   }

	##============  - GETTERS & SETTERS -  ============##
	public function lettreCateg(){ return htmlspecialchars($this->_lettreCategorie); }
	public function numOrdre(){ return htmlspecialchars($this->_numOrdre); }
	public function libelle(){ return htmlspecialchars($this->_libelle); }

	public function setLettreCateg($lettre){ $this->_lettreCategorie = $lettre; }
	public function setNumOrdre($num){ $this->_numOrdre = $num; }
	public function setLibelle($libelle){ $this->_libelle = $libelle; }
}
