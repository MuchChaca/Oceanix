<?php

if(!empty($_GET["id"])){
	$id=htmlspecialchars($_GET["id"]);
	$bat= new Bateau($id, null, null);
	$bat->retrieve();
	$bat->delete();
	$resultat = true;
}else{
	$resultat = false;
}
$etat = "delete_ok";
 ?>
