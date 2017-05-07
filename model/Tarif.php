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
	##==>  - CREATE
	public function create(){
		include "connexionDB.php";
		$req=$db->prepare("INSERT INTO Tarifer (codeLiaison, dateDeb, lettreCateg, numType, tarif)
										VALUES (:liai, :dateD, :lettre, :numOrdre, :tarif)");
		$req->execute([
			"liai" => $this->_liaison->getCode(),
			"dateD" => $this->_dateDeb,
			"lettre" => $this->_typeCateg->lettreCateg(),
			"numOrdre" => $this->_typeCateg->numOrdre(),
			"tarif" => $this->_tarif
		]);
	}
	##==>  - RETRIEVE
	public function retrieve(){
		include "connexionDB.php";
		$req=$db->prepare("SELECT tarif
										FROM Tarifer
										WHERE codeLiaison =:codeLiaison
											AND dateDeb=:dateD
											AND lettreCateg=:lettre
											AND numType=:numOrdre");
		$req->execute([
			"codeLiaison" => $this->_liaison->getCode(),
			"dateD" => $this->_dateDeb,
			"lettre" => $this->_typeCateg->lettreCateg(),
			"numOrdre" => $this->_typeCateg->numOrdre()
		]);

		$result= $req->fetch();
		$this->_tarif=$result['tarif'];
	}
	##==>  - UPDATE
	public function update(){
		include "connexionDB.php";
		$req=$db->prepare("UPDATE Tarifer
										SET tarif=:tarif
										WHERE codeLiaison=:liai
											AND dateDeb=:dateD
											AND lettreCateg=:lettre
											AND numType=:numOrdre");
		$req->execute([
			"tarif" => $this->_tarif,
			"liai" => $this->_liaison->getCode(),
			"dateD" => $this->_dateDeb,
			"lettre" => $this->_typeCateg->lettreCateg(),
			"numOrdre" => $this->_typeCateg->numOrdre(),
			"dateD" => $this->_dateDeb
		]);
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
