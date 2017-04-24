<?php
if(!empty($_GET['obj'])){
	switch ($_GET['obj']){
		case 'tycat':
			$listTypCateg= TypeCateg::findAll();
			$etat= "list";
			break;
		default:
			$etat="404";
	}

}
?>
