<?php
class Enregistrer
{

	#################  - VARS -  #################
	private  $_quantite;
	//--> les objets faisant liaison
	private $_leTypeCateg;
	private $_laReservation;

	#################  - CONSTRUCT -  #################
	public function __construct($laReservation, $leTypeCateg, $quantite){
		$this->_quantite=$quantite;
		$this->_leTypeCateg=$leTypeCateg;
		$this->_laReservation=$laReservation;
	}

	#################  - CRUD -  #################
	//===> CREATE
	public function create(){
		include "connexionDB.php";
		$req=$db->prepare("INSERT INTO Enregistrer(numReserv, lettreCateg, numType, quantite)
							VALUES (:numReserv, :lettreCateg, :numType, :quantite);");
		$req->execute([
			//":num" => $this->_num,
			":numReserv" => $this->_laReservation->num(),
			":lettreCateg" => $this->_leTypeCateg->lettreCateg(),
			":numType" => $this->_leTypeCateg->numOrdre(),
			":quantite" => $this->_quantite
		]);
	}
	//===> RETRIEVE
	public function retrieve(){
		include "connexionDB.php";   //fournis la base de donnée $db
		$req="SELECT *
				FROM Enregistrer
				WHERE numReserv=".$this->_laReservation->num()."
					AND lettreCateg='".$this->_leTypeCateg->lettreCateg()."'
					AND numType=".$this->_leTypeCateg->numOrdre()."
				;";
		$result=$db->query($req);	/** @TODO compléter pour toute les variables */
		$result=$result->fetch();
		$this->_quantite=$result['quantite'];
	}
	//===>UPDATE
	public function update(){
		include "connexionDB.php";
		$req=$db->prepare("UPDATE Enregistrer
										SET quantite=:quantite
										WHERE numReserv=:num
											AND lettreCateg=:lettre
											AND numType=:numOrdre");
		$req->execute([
			"lettre" => $this->_leTypeCateg->lettreCateg(),
			"numOrdre" => $this->_leTypeCateg->numOrdre(),
			"quantite" => $this->_quantite,
			"num" => $this->_laReservation->num()
		]);
		$req->closeCursor();
		unset($db); //close connection
	}
	//===>DELETE
	public function delete(){
		include "connexionDB.php";
		$req=$db->prepare("DELETE FROM Enregistrer
										WHERE numReserv=:num
											AND lettreCateg=:lettre
											AND numType=:numOrdre");
		$req->execute([
			"lettre" => $this->_leTypeCateg->lettreCateg(),
			"numOrdre" => $this->_leTypeCateg->numOrdre(),
			"num" => $this->_laReservation->num()
		]);
		$req->closeCursor();
		unset($db); //close connection
	}


	/*
	 * @param Reservation $reservation
	 * @return list $enregistrements
	 */
	public static function getLesEnr(Reservation $reservation){
		try{
			$db= new PDO('mysql:host=localhost;dbname=SIO2_SLAM5_Oceanix', 'sio', 'Btssio2016@', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die("Erreur de connexion à la bdd de type: ".$e);
		}
		$enregistrements = array();
		$req=$db->query("SELECT *
							 FROM Enregistrer
							 WHERE numReserv = ".$reservation->num()." ;");
		while($line = $req->fetch()){
			$typeCateg = new TypeCateg($line['lettreCateg'], $line['numType'], NULL);
			$typeCateg->retrieve();
			$unEnr = new Enregistrer($reservation, $typeCateg, NULL);
			$unEnr->retrieve();
			array_push($enregistrements, $unEnr);
		}

		$req->closeCursor();
		unset($db); //close connection

		return $enregistrements;
	}

	public static function hasValue(Reservation $reserv, TypeCateg $typeCateg){
		try{
			$db= new PDO('mysql:host=localhost;dbname=SIO2_SLAM5_Oceanix', 'sio', 'Btssio2016@', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $e){
			die("Erreur de connexion à la bdd de type: ".$e);
		}
		$req=$db->prepare("SELECT *
										FROM Enregistrer
										WHERE lettreCateg=:lettre
											AND numType=:numOrdre
											AND numReserv=:num");
		$req->execute([
			"lettre" => $typeCateg->lettreCateg(),
			"numOrdre" => $typeCateg->numOrdre(),
			"num" => $reserv->num()
		]);
		if($req->rowCount()>0){
			$data=$req->fetch();
			$quantite=$data['quantite'];
			$req->closeCursor();
			unset($db); //close connection
			return $quantite;
		}else{
			$req->closeCursor();
			unset($db); //close connection
			return 0;
		}
	}

	#################  - FINDALL() -  #################
	//public static function findAll(){
	//	include "connexionDB.php";
	//	$lesEnregistrements=array();
	//	$req="SELECT *
	//			FROM Enregistrer;";
	//	$req=$db->query($req);
	//	while($line=$result->fetch()){
			//@TODO -> Faire les objets pour passer en param
	//		$enregistrer=new Enregistrer($line['numReserv'], $line['lettreCateg'],
	//										 $line['numType'], $line['quantite']);
	//		array_push($lesEnregistrements, $enregistrer);
	//	}
	//	return $lesEnregistrements;
	//}



	#################  - GETTERS -  #################
	public function quantite(){ return $this->_quantite; }
	public function leTypeCateg(){ return $this->_leTypeCateg; }
	public function laReservation(){ return $this->_laReservation; }

}
