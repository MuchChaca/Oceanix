<?php
	$resultat=Passerelle::verif($_POST["login"], $_POST["mdp"]);
	//$resultat = $pass->verif($_POST["login"], $_POST["mdp"]); //old
	if ($resultat == 1) {
		$etat = "accueil";
		$_SESSION['logged'] = 'logged';
	}
	else {
		$etat = "erreur_connexion";
	}
?>
