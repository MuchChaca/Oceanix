<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch($_GET['obj']){
		//=> Delete a Liaison
		case 'liai':
			if(!empty($_GET['id'])){
				$liaisonCode=$_GET['id'];
				$liaison = new Liaison($liaisonCode);
				$liaison->retrieve();
				$liaison->delete();
				$status="delete_ok";
			}else{
				$status="404";
			}
			break;
		//=> Delete a Bateau
		case 'boat':
			if(!empty($_GET['id'])){
				$bat= new Bateau($_GET['id'], null, null);
				$bat->retrieve();
				$bat->delete();
				$status="delete_ok";
			}else{
				$status="404";
			}
			break;
		default:
			$status="404";
			break;
	}
}else{
	$status="404";
}
 ?>
