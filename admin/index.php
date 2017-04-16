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
if (!empty($_GET['action'])){
	$action = $_GET['action'];
}else{
	$action = 'init';
}

// *** traitement de l'action ***
include "controleur/a-".$action.'.php';


// *** génération de la vue ***
include "vue/v-".$etat.'.php';

/**
	* @TODO Make a way to go back to the regualr website from the admin part
	* @TODO Animation de tutoriel comment faire une réservation. (jQuery)
*/
?>
