<?php

class Passerelle
{
	public static function verif($login, $mdp)
	{
		//Original Version
		//include "connexionBD.php";
		//$req="SELECT * from administrateur where login='". $login . "' and mdp='" . $mdp ."'";
		//$stmt = $db->query($req);
		//if ($stmt->rowCount() > 0)
		//{
		//	return 1;
		//}
		//else
		//{
		//	return 0;
		//}

		//Version with verify()
		include "connexionDB.php";
		$login = htmlspecialchars($login);
		$mdp = htmlspecialchars($mdp);
		$req="SELECT * from Administrateur where login='". $login . "'";
		$stmt = $db->query($req);
		$stmt=$stmt->fetch();
		if(password_verify($mdp, $stmt['mdp']) && (sizeof($stmt) > 0)){
			return 1;
		}else{
			return 0;
		}
	}

	/**
	 * @static function logged()
	 * @param none
	 * @return boolean (true or false: if the person is logged or not)
	 */
	public static function logged(){
		if(!empty($_SESSION['logged']) && $_SESSION['logged'] == 'logged') {
			return true;
		}else{
			return false;
		}
	}




	public static function gest_error(){
		set_error_handler(function($type, $msg, $file, $line){
			// ************************************************
			// * Generation du message d'erreur à mettre dans *
			// * un fichier de log avec la fonction error_log *
			// ************************************************
			date_default_timezone_set('UTC');
			$date = date('d/m/Y H:i:s', $_SERVER['REQUEST_TIME']);
			$msgError =  "[ERREUR " .$type." - ".$date."]: ".$msg." dans ".$file." ligne: ".$line."\n";
			error_log($msgError, 3,  "erreur_log.log");

			// Gen un msg pour l'utilisateur
			$msgErrorUser = "Une erreur s'est produite. Nous vous prions de nous excuser pour ce dysfonctionnement<br>Réessayez plus tard.";

			// On emploie "exit" pour arrêter l'execution
			exit($msgErrorUser);
		});

	}
}