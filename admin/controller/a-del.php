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
			}
			break;
		default:
			//
			break;
	}
}else{
	$status="404";
}
 ?>
