<?php
if(!empty($_GET['id'])){
	$reserv= new Reservation($_GET['id'], null, null, null, null);
	$reserv->retrieve();
	$allEnr = Enregistrer::getLesEnr($reserv);
	$status="recap-reserv";
}else{
	$status="404";
}
?>
