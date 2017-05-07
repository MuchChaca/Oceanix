<?php
class Tarif{
	private $_liaison, $_dateDeb, $_typeCateg, $_tarif;

	public function __construct($liaison, $dateDeb, $typeCateg, $tarif){
		$this->_liaison = $liaison;
		$this->_dateDeb = $dateDeb;
		$this->_typeCateg = $typeCateg;
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
									FROM Tarifer
									ORDER BY codeLiaison");
		while($result = $req->fetch()){
			$typeCateg= new TypeCateg($result['lettreCateg'], $result['numType'], null);
			$typeCateg->retrieve();
			$liai= new Liaison($result['codeLiaison']);
			$liai->retrieve();
			$typeCateg= new Tarif($liai, $result['dateDeb'], $typeCateg, $result['tarif']);
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
	public function liaison(){ return $this->_liaison; }
	public function dateDeb(){ return $this->_dateDeb; }
	public function typeCateg(){ return $this->_typeCateg; }
	public function tarif(){ return htmlspecialchars($this->_tarif); }

	public function affiDate(){
		$date=substr($this->_dateDeb, -2)."/".substr($this->_dateDeb, -5, 2)."/".substr($this->_dateDeb, -10, 4);
		return htmlspecialchars($date);
	}
}
