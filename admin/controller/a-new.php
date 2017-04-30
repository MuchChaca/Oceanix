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
		default:
			$status="404";
			break;
	}
}else{
	$status="404";
}
