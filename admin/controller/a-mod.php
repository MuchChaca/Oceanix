<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch ($_GET['obj']){
		case 'tycat':	// If it's for TypeCateg ('tycat')
			if(!empty($_POST['lettre']) && !empty($_POST['num']) && !empty($_POST['libelle'])){
				$typCateg= new TypeCateg($_POST['lettre'], $_POST['num'], $_POST['libelle']);
				$typCateg->update();
				$etat= "modif_ok";
			}else if(!empty($_GET['l']) && !empty($_GET['n'])){
				$typCateg= new TypeCateg($_GET['l'], $_GET['n'], null);
				$typCateg->retrieve();
				$etat= "form";
				$obj="typeCateg";
			}else{
				$etat="404";
			}
			break;
		//=> Modify a Liaison
		case 'liai':
			if(!empty($_GET['id'])){
				$liaison = new Liaison($_GET['id']);
				$liaison->retrieve();
				$ports= Port::findAll();
				$status= "mod";
				$obj='liai';
			}else{ $status="404"; }
			break;
		default:
			$etat="404";
			break;
	}
}
?>
