<?php
class Tarif{
	private $_codeLiaison, $_dateDeb, $_lettreCateg, $_numType, $_tarif;

	public function __construct($codeLiaison, $dateDeb, $lettreCateg, $numType, $tarif){
		$this->_codeLiaison = $codeLiaison;
		$this->_dateDeb = $dateDeb;
		$this->_lettreCateg = $lettreCateg;
		$this->_numType = $numType;
		$this->_tarif = $tarif;
	}

	##============  - CRUD -  ============##
	##==>  - RETRIEVE
	public function retrieve(){
		include "connexionDB.php";
		$req=$db->prepare("SELECT *
										FROM Tarifer
										WHERE codeLiaison = :codeLiaison;");
		$result=$req->execute([":codeLiaison" => $this->_codeLiaison]);
		$result= $result->fetch();
		$this->_dateDeb=$result['dateDeb'];
		$this->_lettreCateg=$result['lettreCateg'];
		$this->_numType=$result['numType'];
		$this->_tarif=$result['tarif'];
	}
	##============  - FINDALL -  ============##
	public static function findAll(){
		include "connexionDB.php";
		$typeCategs=array();
		$req=$db->query("SELECT *
									FROM Tarifer;");
		while($result = $req->fetch()){
			$typeCateg= new Tarif($result['codeLiaison'], $result['dateDeb'], $result['lettreCateg'], $result['numType'], $result['tarif']);
			//$typeCateg->retrieve();
			array_push($typeCategs, $typeCateg);
		}
		return $typeCategs;
	}

   /* ===========  - getPrix() -  =========== *\
	 * @param Liaison $liaison Une liaison
	 * @param String $dateDeb La date de debut
	 * @param TypeCateg $categorie Un objet TypeCateg donnant le type de categorie
	 * @param Traversee $traversse Un objet la traversee concernée
	 * @return String Le tarif selon les paramètres entrée dans la méthode.
	 */
	public static function getPrix(Liaison $liaison, TypeCateg  $categorie, Traversee $traversee){
		include "connexionDB.php";
		$periode= Periode::getPeriode($traversee);
		$req=$db->query("SELECT tarif
										FROM Tarifer
										WHERE codeLiaison = \"".$liaison->getCode()."\"
									AND dateDeb = '".$periode->dateDeb()."'
									AND numType = ".$categorie->numOrdre()."
									AND lettreCateg = \"".$categorie->lettreCateg()."\";");
		$result = $req->fetch();
		return $result['tarif'];
}

	##============  - GETTERS -  ============##
	public function lettreCategorie(){ return $this->_lettreCategorie; }
	public function numOrdre(){ return $this->_numOrdre; }
	public function libelle(){ return $this->_libelle; }
}
