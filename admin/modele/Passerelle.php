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
		include "connexionBD.php";
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
}
?>