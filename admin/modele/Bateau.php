<?php

class bateau
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
		$req="INSERT INTO bateau (nom) VALUES ('". $this->_nomBat ."')";
		$pdo->exec($req);
	}
}
?>