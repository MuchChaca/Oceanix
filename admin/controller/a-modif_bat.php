<?php
if(!empty($_POST['id']) && !empty($_POST['nomBat'])){
	$bat= new Bateau($_POST['id'], null, null);
	$bat->setNom($_POST['nomBat']);
	$bat->update();
	$etat= "modif_ok";
}else if(!empty($_GET['id'])){
	$bat= new Bateau($_GET['id'], null, null);
	$bat->retrieve();
	$etat= "form_saisie_bat";
}
 ?>
