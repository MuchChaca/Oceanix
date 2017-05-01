<?php
class Periode{
	#################  - VARS -  #################
	private $_dateDeb, $_dateFin;

	#################  - CONSTRUCT -  #################
	public function __construct($dateDeb, $dateFin){
		$this->_dateDeb=$dateDeb;
		$this->_dabeFin=$dateFin;
	}

	#################  - CRUD -  #################
	//===> RETRIEVE
	public function retrieve(){
		include "connexionDB.php";   //fournis la base de donnée $db
		$req="SELECT nom
				FROM Port
				WHERE id=".$this->_id.";";
		$result=$db->query($req);
		$result=$result->fetch();
		$this->_nom=$result['nom'];
	}

	#################  - FINDALL() -  #################
	public static function findAll(){
		include "connexionDB.php";
		$lesPeriodes=array();
		$req="SELECT *
				FROM Periode;";
		$req=$db->query($req);
		while($line=$result->fetch()){
			$periode=new Periode($line['dateDeb'], $line['dateFin']);
			array_push($lesPeriodes, $periode);
		}
		return $lesPeriodes;
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
		$req->execute(['date' => $traversee->getDate()]);
		$result=$req->fetch();
		return $periode = new Periode($result['dateDeb'], $result['dateFin']);
	}


	#################  - GETTERS -  #################
	public function dateDeb(){ return $this->_dateDeb; }
	public function dateFin(){ return $this->_dateFin; }
}
