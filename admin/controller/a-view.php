<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch($_GET['obj']){
		case 'liai':	// If it's for a liaison ('liai' = liaison)
			if(!empty($_GET['id'])){
				$liaison = new Liaison($_GET['id']);
				$liaison->retrieve();
				$status = "view";
				$obj = "liai";
			}else{ $status="404"; }
			break;

		// If it's for a Reservation ('rese' = reservation)
		case 'rese':
			if(!empty($_GET['id'])){
				$reserv = new Reservation($_GET['id'], null, null ,null ,null);
				$reserv->retrieve();
				$status = "view";
				$obj = "rese";
			}else{ $status="404"; }
			break;

		default:
			$status= "404";
			break;
	}
}else{
	$status= "404";
}
 ?>
