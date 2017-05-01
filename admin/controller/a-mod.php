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
			}else{
				$status="404";
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
			}else{
				$status="404";
			}
			break;

		//=> Modify a Traversee
		case 'trav':
			if(!empty($_POST['num']) && !empty($_POST['date']) && !empty($_POST['liaison']) && !empty($_POST['bateau']) && !empty($_POST['hour']) && !empty($_POST['minutes'])){
				if(preg_match("#^[0-9]{2}/[0-9]{2}/[0-9]{4}$#", $_POST['date'])){  //--> Bon format?
					##-- formate la date au format SQL
					$dateSql=preg_replace("#([0-9]{2})/([0-9]{2})/([0-9]{4})#", '$3-$2-$1', $_POST['date']);
					$liai= new Liaison($_POST['liaison']);
					$liai->retrieve();
					$bat= new Bateau($_POST['bateau'], null, null);
					$bat->retrieve();
					$heure=$_POST['hour'].":".$_POST['minutes'];
					$newTrav= new Traversee($_POST['num']);
					$newTrav->fillMe($dateSql, $heure, $bat, $liai);
					$newTrav->update();
					$status= "modif_ok";
				}else{
					Header('Location: ?adm=true&action=mod&obj=trav&id='.$_POST['num']);
				}
			}else if(!empty($_GET['id'])){
				$trav= new Traversee($_GET['id'], null, null);
				$trav->retrieve();
				$allLiai= Liaison::findAll();
				$allBat= Bateau::findAll();
				$status= "mod";
				$obj='trav';
			}else{
				$status="404";
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
