<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch($_GET['obj']){
		//=> Delete a Tarif
		case 'tari':
			if(!empty($_GET['liai']) && !empty($_GET['l']) && !empty($_GET['n']) && !empty($_GET['date'])){
				$liai= new Liaison($_GET['liai']);
				$liai->retrieve();
				$aTypeCateg= new TypeCateg($_GET['l'], $_GET['n'], null);
				$aTypeCateg->retrieve();
				$tarif = new Tarif($liai, $_GET['date'], $aTypeCateg, null);
				$tarif->retrieve();
				$tarif->delete();
				$status="delete_ok";
			}else{
				$status="404";
			}
			break;

		//=> Delete a Reservation
		case 'rese':
			if(!empty($_GET['id'])){
				$reserv = new Reservation($_GET['id'], null, null, null, null);
				// $reserv->retrieve();
				$reserv->delete();
				$status="delete_ok";
			}else{
				$status="404";
			}
			break;

		//=> Delete a TypeCateg
		case 'tycat':
			if(!empty($_GET['l']) && !empty($_GET['n'])){
				$typeCateg = new TypeCateg($_GET['l'], $_GET['n'], null);
				$typeCateg->retrieve();
				$typeCateg->delete();
				$status="delete_ok";
			}else{
				$status="404";
			}
			break;

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

			//=> Delete a Port
			case 'port':
				if(!empty($_GET['id'])){
					$port= new Port($_GET['id']);
					$port->retrieve();
					$port->delete();
					$status="delete_ok";
				}else{
					$status="404";
				}
				break;

			//=> Delete a Traversee
			case 'trav':
				if(!empty($_GET['id'])){
					$trav = new Traversee($_GET['id']);
					$trav->retrieve();
					$trav->delete();
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
