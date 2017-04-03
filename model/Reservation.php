<?php
class Reservation{
	#################  - VARS -  #################
	private $_num, $_nom, $_adr, $_cp, $_ville;
	private $_laTraversee;
	private $_lesTypeCateg = array();

	#################  - CONSTRUCT -  #################
	public function __construct($num, $nom, $adr, $cp, $ville){
		$this->_num=$num;
		$this->_nom=$nom;
		$this->_adr=$adr;
		$this->_cp=$cp;
		$this->_ville=$ville;
	}
	
	#################  - CRUD -  #################
	//===> RETRIEVE
	public function retrieve(){
		include "connexionDB.php";   //fournis la base de donnée $db
		$req="SELECT nom
				FROM Reservation
				WHERE num=".$this->_num.";";
		$result=$db->query($req);	/** @TODO compléter pour toute les variables */
		$result=$result->fetch();
		$this->_nom=$result['nom'];
	}
	//===> CREATE
	public function create(){
		include "connexionDB.php";
		$req=$db->prepare("INSERT INTO Reservation(nom, adr, cp, ville)
						 VALUES (:nom, :adr, :cp, :ville);");
		$req->execute([
			//":num" => $this->_num,
			":nom" => $this->_nom,
			":adr" => $this->_adr,
			":cp" => $this->_cp,
			":ville" => $this->_ville
		]);
		$this->_num = $db->lastInsertId();
		$req->closeCursor();
	}
	
	#################  - FINDALL() -  #################
	public static function findAll(){
		include "connexionDB.php";
		$lesReservations=array();
		$req="SELECT *
				FROM Reservation;";
		$req=$db->query($req);
		while($line=$result->fetch()){
			$reservation=new Reservation($line['num'], $line['nom'],
											 $line['adr'], $line['cp'], $line['ville']);
			array_push($lesReservations, $reservation);
		}
		return $lesReservations;
	}
	
	
	/* #################  - GETPERIODE -  #################
	 * @param Traversee $traversee
	 * @return Periode La Periode à laquelle la date entrée appartient
	 */
	public static function getPeriode(Traversee $traversee){
		include "connexionDB.php";
		$req=$db->prepare("SELECT *
							 FROM Periode
							 WHERE :date BETWEEN dateDeb AND dateFin");
		$req->execute(['date' => $traversee->dateTraversee()]);
		$result=$req->fetch();
		return $periode = new Periode($result['dateDeb'], $result['dateFin']);
	}

	#################  - GETTERS -  #################
	public function dateDeb(){ return $this->_dateDeb; }
	public function dateFin(){ return $this->_dateFin; }
	public function num(){ return $this->_num; }
	public function nom(){ return $this->_nom; }
	public function adr(){ return $this->_adr; }
	public function cp(){ return $this->_cp; }
	public function ville(){ return $this->_ville; }
	#################  - SETTERS -  #################
	//$_num, $_nom, $_adr, $_cp, $_ville;
	public function setNum($num){ $this->_num = $num; }
	public function setNom($nom){ $this->_nom = $nom; }
	public function setAdr($adr){ $this->_adr= $adr; }
	public function setCp($cp){ $this->_cp= $cp; }
	public function setVille($ville){ $this->_ville= $ville; }
	public function setLaTraversee(Traversee $traversee){ $this->_laTraversee= $traversee; }
	public function setLesTypeCateg($typeCateg){ $this->_lesTypeCateg = $typeCateg; }
}
