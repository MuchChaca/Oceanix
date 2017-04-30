<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch ($_GET['obj']){
		// If it's for TypeCateg ('tycat')
		case 'tycat':
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
			}else if(!empty($_POST['id']) && !empty($_POST['distance']) && !empty($_POST['portDep']) && !empty($_POST['portArr'])){
				//If the form is not empty
				$newLiaison = new Liaison(null);
				$newPortDep = new Port($_POST['portDep']);
				$newPortDep->retrieve();
				$newPortArr = new Port($_POST['portArr']);
				$newPortArr->retrieve();
				$newLiaison->fillMe($_POST['id'], $_POST['distance'], $newPortDep, $newPortArr);
				$newLiaison->update();
				$status="modif_ok";
			}else{ $status="404"; }
			break;
		//=> Modify a Boat
		case 'boat':
			if(!empty($_POST['id']) && !empty($_POST['nomBat'])){
				$newBat= new Bateau($_POST['id'], null, null);
				$newBat->setNom($_POST['nomBat']);
				$newBat->update();
				$status= "modif_ok";
			}else if(!empty($_GET['id'])){
				$bat= new Bateau($_GET['id'], null, null);
				$bat->retrieve();
				$status= "mod";
				$obj='boat';
			}
			break;
		//=> Modify a Port
		case 'port':
			if(!empty($_POST['id']) && !empty($_POST['nom'])){
				$newPort= new Port($_POST['id']);
				$newPort->setNom($_POST['nom']);
				$newPort->update();
				$status= "modif_ok";
				}else if(!empty($_GET['id'])){
				$port= new Port($_GET['id']);
				$port->retrieve();
				$status= "mod";
				$obj='port';
			}
			break;
		//=> Default action
		default:
			$etat="404";
			break;
	}
}else{
	$status="404";
}
?>
