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
	//===> CREATE
	public function create(){
		include "connexionDB.php";
		$req=$db->prepare("INSERT INTO Reservation(nom, adr, cp, ville, traversee_id)
						 VALUES (:nom, :adr, :cp, :ville, :trav);");
		$req->execute([
			//":num" => $this->_num,
			"nom" => $this->_nom,
			"adr" => $this->_adr,
			"cp" => $this->_cp,
			"ville" => $this->_ville,
			"trav" => $this->_laTraversee->num()
		]);
		$this->_num = $db->lastInsertId();
		$req->closeCursor();
	}
	//===> RETRIEVE
	public function retrieve(){
		include "connexionDB.php";   //fournis la base de donnée $db
		$req="SELECT *
				FROM Reservation
				WHERE num=".$this->_num.";";
		$result=$db->query($req);
		$result=$result->fetch();
		$this->_nom=$result['nom'];
		$this->_adr=$result['adr'];
		$this->_cp=$result['cp'];
		$this->_ville=$result['ville'];

		$trav= new Traversee($result['traversee_id']);
		$trav->retrieve();
		$this->_laTraversee=$trav;

		$this->_lesTypeCateg= Enregistrer::getLesEnr($this);
	}
	//===>UPDATE
	public function update(){
		include"connexionDB.php";
		$req=$db->prepare("UPDATE Reservation
										SET nom=:nom, adr=:adr, cp=:cp, ville=:ville, traversee_id=:trav
										WHERE num=:num");
		$req->execute([
			"nom" => $this->_nom,
			"adr" => $this->_adr,
			"cp" => $this->_cp,
			"ville" => $this->_ville,
			"trav" => $this->_laTraversee->num(),
			"num" => $this->_num
		]);
		$req->closeCursor();
		unset($db); //close connection
	}
	//===> DELETE
	public function delete(){
		include "connexionDB.php";
		$req=$db->prepare("DELETE FROM Reservation
										WHERE num=:num");
		$req->execute([ "num" => $this->_num ]);
		$secReq=$db->prepare("DELETE FROM Enregistrer
											WHERE numReserv=:numReserv");
		$secReq->execute([ "numReserv" => $this->_num ]);
	}


	#################  - FINDALL() -  #################
	public static function findAll(){
		include "connexionDB.php";
		$lesReservations=array();
		$req="SELECT *
				FROM Reservation";
		$req=$db->query($req);
		while($line=$req->fetch()){
			$reservation=new Reservation($line['num'], $line['nom'],
											 			  $line['adr'], $line['cp'], $line['ville']);
			$trav= new Traversee($line['traversee_id']);
			// $trav->retrieve();
			$reservation->setLaTraversee($trav);
			$reservation->setLesTypeCateg(Enregistrer::getLesEnr($reservation));
			array_push($lesReservations, $reservation);
		}
		return $lesReservations;
	}

	/* #################  - GETPERIODE -  #################
	 * @param Traversee $traversee
	 * @return Periode La Periode à laquelle la date entrée appartient
	 */
	public static function getPeriode($traversee){
		include "connexionDB.php";
		$req=$db->prepare("SELECT *
							 FROM Periode
							 WHERE :dateDonnee BETWEEN dateDeb AND dateFin");
		$req->execute(['dateDonnee' => $traversee->getDate()]);
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
	public function laTraversee(){ return $this->_laTraversee; }
	public function lesTypeCateg(){ return $this->_lesTypeCateg; }
	#################  - SETTERS -  #################
	//$_num, $_nom, $_adr, $_cp, $_ville;
	public function setNum($num){ $this->_num = $num; }
	public function setNom($nom){ $this->_nom = $nom; }
	public function setAdr($adr){ $this->_adr= $adr; }
	public function setCp($cp){ $this->_cp= $cp; }
	public function setVille($ville){ $this->_ville= $ville; }
	public function setLaTraversee($traversee){ $this->_laTraversee= $traversee; }
	public function setLesTypeCateg($typeCateg){ $this->_lesTypeCateg = $typeCateg; }
}
