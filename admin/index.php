<?php
session_start();

// require_once "modele/Passerelle.php";
function classLoader($class){
	// On inclut la classe correspondante au paramètre passé.
	require_once 'modele/'.$class.'.php';
}
//On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
spl_autoload_register('classLoader');

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
