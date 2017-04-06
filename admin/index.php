<?php
require_once "modele/Passerelle.php";
Passerelle::gest_error();
// *** on récupère l'action à entreprendre ***
if (isset ($_GET['action'])) {
	$action = strtolower($_GET['action']);
}
else {
	$action = 'init';
}

// *** traitement de l'action ***
$scriptAction = 'a-' .$action. '.php';
include "controleur/".$scriptAction;


// *** génération de la vue ***

	$scriptVue = 'v-' .$etat. '.php';
	include "vue/".$scriptVue;





?>
