<?php
if(Passerelle::logged()){
	session_destroy();
	$etat="form_connexion";
}else{
	$etat="form_connexion";
}

?>
