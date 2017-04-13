<?php

if(!empty($_GET["id"])){
	$id=htmlspecialchars($_GET["id"]);
	$bat= new Bateau($id, null, null);
	$bat->delete();
	$etat = "delete_bat_ok";
}else{
	$etat = "404";
}
 ?>
