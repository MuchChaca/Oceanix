<?php
abstract class Passerelle{


	/**
		* @static function verif()
		* @param String Le login
		* @param String Le mot de pase
		* @return int (0 or 1: 1 => not good; 1 => good)
		*/
	public static function verif($login, $mdp){
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
		* @return boolean (true or false: if the person is logged or not)
		*/
	public static function logged(){
		if(!empty($_SESSION['logged']) && $_SESSION['logged'] == 'logged') {
			return true;
		}else{
			return false;
		}
	}

	/**
		* Fonction de gestion des erreurs
		*/
	public static function gest_error(){
		set_error_handler(function($type, $msg, $file, $line){
			// ************************************************
			// * Generation du message d'erreur à mettre dans *
			// * un fichier de log avec la fonction error_log *
			// ************************************************
			date_default_timezone_set('UTC');
			$date = date('d/m/Y H:i:s', $_SERVER['REQUEST_TIME']);
			$msgError =  "[ERREUR " .$type." - ".$date."]: "."\n\t".$msg."\n\tIN ".$file." ligne: ".$line."\n";
			error_log($msgError, 3,  "error.log");

			// Gen un msg pour l'utilisateur
			$msgErrorUser = "Une erreur s'est produite. Nous vous prions de nous excuser pour ce dysfonctionnement<br>Réessayez plus tard.";

			// On emploie "exit" pour arrêter l'execution
			exit($msgErrorUser);
		});
	}

	/**
	  * Splits a table by providing a numer of rows per table.
	  * @param array $table expect the table to split
	  * @param int The limit rows of the array
	  * @return array[][] Double dimension array with the split table
	  */
	public static function splitTable($table, $limit){
		$returnTab= array();
		$rank=0;
		$j=0;
		$max = $limit;
		$rest=sizeof($table)%$limit;
		if($rest == 0){
			while($j<sizeof($table)){
				for($j; $j<$max; $j++){
					$returnTab[$rank][]=$table[$j];
				}
				$rank++;
				$max += $limit;
			}
		}else{
			while($j<sizeof($table)-$rest){
				for($j; $j<$max; $j++){
					$returnTab[$rank][]=$table[$j];
				}
				$rank++;
				$max += $limit;
			}

			$max = $max - $limit + $rest;
			
			for($j; $j<$max; $j++){
				$returnTab[$rank][]=$table[$j];
			}
		}
		return $returnTab;
	}
}
