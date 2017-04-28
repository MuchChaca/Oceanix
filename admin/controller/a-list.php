<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch ($_GET['obj']){
		//=> TypeCategory
		case 'tycat':
			$listTypCateg= TypeCateg::findAll();
			$etat= "list";
			break;
		//=> For a Boat
		case 'boat':
			$listBat = Bateau::findAll();
			$status="list";
			break;
		default:
			$status="404";
	}

}else{
	$status="404";
}
?>
