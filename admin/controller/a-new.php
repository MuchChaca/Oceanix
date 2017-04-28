<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch($_GET['obj']){
		//=> New Bateau
		case 'boat':
			if(!empty($_POST['nomBat'])){ //If the form is filled
				$newBat= new Bateau(null, $_POST['nomBat'], null);
				$newBat->create();
				$newBat->retrieve();
				$status="new_ok";
			}else{	// Else we display the form
				$status="new";
				$obj="boat";
			}
			break;
		//=> New Liaison
		case 'liai':
			//
			break;
		default:
			$status="404";
			break;
	}
}else{
	$status="404";
}
