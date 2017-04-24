<?php
if(!empty($_SESSION['logged']) && $_SESSION['logged']=="logged"){
	$etat="accueil";
}else{
	$etat="form_connexion";
}
?>
