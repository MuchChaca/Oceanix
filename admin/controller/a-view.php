<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && Passerelle::logged()){
	switch($_GET['obj']){
		case 'liai':	// If it's for a liaison ('liai' = liaison)
			if(!empty($_GET['id'])){
				$liaison = new Liaison($_GET['id']);
				$liaison->retrieve();
				$status = "view";
				$obj = "liai";
			}
			break;
		case 'rese':
			//
			break;
		default:
			$status= "404";
			break;
	}
}else{
	$status= "404";
}
 ?>
