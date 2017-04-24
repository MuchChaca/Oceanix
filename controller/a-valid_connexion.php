<?php
	$resultat=Passerelle::verif($_POST["login"], $_POST["mdp"]);
	//$resultat = $pass->verif($_POST["login"], $_POST["mdp"]); //old
	if ($resultat == 1) {
		$_SESSION['logged'] = 'logged';
		$adminMode = false;
		Header('Location: '.$_SERVER['PHP_SELF']);
		ob_end_clean();
	}
	else {
		$status = "erreur_connexion";
		$adminMode = false;
	}
?>
