<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch($_GET['obj']){
		//=> New Tarifs
		case 'tari':
			if((!empty($_POST['liai']) && $_POST['liai']!= 'none') && !empty($_POST['date']) && (!empty($_POST['tycat'])&& $_POST['tycat']!= 'none') && isset($_POST['tarif'])){ //If the form is filled
				if(preg_match("#^[0-9]{2}/[0-9]{2}/[0-9]{4}$#", $_POST['date'])){  //--> Bon format?
					##-- formate la date au format SQL
					$dateSql=preg_replace("#([0-9]{2})/([0-9]{2})/([0-9]{4})#", '$3-$2-$1', $_POST['date']);
				}else{
					$allLiai= Liaison::findAll();
					$allTypeCateg= TypeCateg::findAll();
					$status="new";
					$obj="tari";
					return;
				}
				$liai= new Liaison($_POST['liai']);
				$liai->retrieve();
				$tycat=explode("-", $_POST['tycat']);
				$typeCateg= new TypeCateg($tycat[0], $tycat[1], null);
				$typeCateg->retrieve();
				$newTarif= new Tarif($liai, $dateSql, $typeCateg, $_POST['tarif']);
				$newTarif->create();
				$status="new_ok";
			}else{	// Else we display the form
				$allLiai= Liaison::findAll();
				$allTypeCateg= TypeCateg::findAll();
				$status="new";
				$obj="tari";
			}
			break;

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

			//=> New Port
			case 'port':
				if(!empty($_POST['nom'])){ //If the form is filled
					$newPort= new Port(null);
					$newPort->setNom($_POST['nom']);
					$newPort->create();
					$status="new_ok";
				}else{	// Else we display the form
					$status="new";
					$obj="port";
				}
				break;

		//=> New Liaison
		case 'liai':
			if(!empty($_POST['code']) && !empty($_POST['distance']) && (!empty($_POST['portDep']) && $_POST['portDep']!="err") && (!empty($_POST['portArr']) && $_POST['portArr']!="err")){
				//If all good we create
				$newLiaison= new Liaison($_POST['code']);
				if(!$newLiaison->codeExists($_POST['code'])){
					$portD= new Port($_POST['portDep']);
					$portD->retrieve();
					$portA= new Port($_POST['portArr']);
					$portA->retrieve();
					$newLiaison->fillMe($portD, $portA, $_POST['distance']);
					$newLiaison->create();
					$status= "new_ok";
				}else{
					$errCode="<h4>Cette liaison existe déjà!</h4>";
					$allPorts= Port::findall();
					$status="new";
					$obj="liai";
				}

			}else{
				if(!empty($_POST['code']) && (!empty($_POST['distance']) || $_POST['distance']==0)){
					$err="<h4>Veuillez sélectionner un port de départ et d'arrivé!</h4>";
				}
				if(!empty($_POST['code'])){
					$newLiaison= new Liaison($_POST['code']);
					if($newLiaison->codeExists($_POST['code'])){
						$errCode="<h4>Cette liaison existe déjà!</h4>";
					}
				}
				$allPorts= Port::findall();
				$status="new";
				$obj="liai";
			}
			break;

		//=> New Traversee
		case 'trav':
			if(!empty($_POST['date']) && (!empty($_POST['hour']) ||  $_POST['hour']==0) && (!empty($_POST['minutes']) ||  $_POST['minutes']==0) && (!empty($_POST['bateau']) && $_POST['bateau']!="err") &&
				(!empty($_POST['liaison']) && $_POST['liaison']!="err") ){ //If the form is filled
				$bat= new Bateau($_POST['bateau'], null, null);
				$bat->retrieve();
				$liai= new Liaison($_POST['liaison']);
				$liai->retrieve();
				if(preg_match("#^[0-9]{2}/[0-9]{2}/[0-9]{4}$#", $_POST['date'])){  //--> Bon format?
					##-- formate la date au format SQL
					$dateSql=preg_replace("#([0-9]{2})/([0-9]{2})/([0-9]{4})#", '$3-$2-$1', $_POST['date']);
				}else{
					$allBat= Bateau::findAll();
					$allLiai= Liaison::findAll();
					$status="new";
					$obj="trav";
					return;
				}
				$newTrav= new Traversee(null);
				$hour=$_POST['hour'].":".$_POST['minutes'];
				$newTrav->fillMe($dateSql, $hour, $bat, $liai);
				$newTrav->create();
				$status="new_ok";
			}else{	// Else we display the form
				$allBat= Bateau::findAll();
				$allLiai= Liaison::findAll();
				$status="new";
				$obj="trav";
			}
			break;

		//=> New TypeCateg
		case 'tycat':
			if(!empty($_POST['lettre']) && !empty($_POST['num']) && !empty($_POST['libelle'])){ //If the form is filled
				$newTypeCateg= new TypeCateg(strtoupper($_POST['lettre']), $_POST['num'], $_POST['libelle']);
				if(!TypeCateg::exists($newTypeCateg)){
					$newTypeCateg->create();
					$status="new_ok";
				}else{
					$err="<h4>ERREUR: Cette catégorie existe déjà !</h4>";
					GOTO err;
				}
			}else{	// Else we display the form
				err:
				$status="new";
				$obj="tycat";
			}
			break;

		default:
			$status="404";
			break;
	}
}else{
	$status="404";
}
