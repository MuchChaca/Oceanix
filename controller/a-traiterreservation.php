<?php
//echo "lol";
$allTypeCateg = array();
$allTypeCateg = TypeCateg::findAll();


//--> On recup la traversee
if(!empty($_GET['info'])){
	$traversee  = new Traversee($_GET['info']);
	$traversee->retrieve();
}
// print_r($traversee);
//try{
	//===> On fait la réservation
	$reservation = new Reservation(NULL, $_POST['name'], $_POST['adress'], $_POST['cp'], $_POST['city']);
	$reservation->setLaTraversee($traversee);
	$reservation->create();
	// $reservation->retrieve();


	## Declare les collections d'objets des enregistrement et de reservations
	$aReserver= array();
	$aEnregistrer = array();
	## On assigne des valeurs aux collections du dessus selon leur nature
	foreach($_POST as $key => $value){
		if($key == "name" || $key == "adress" || $key == "cp" || $key == "city"){
			$aReserver[$key] = $value;
		}else{
			$aEnregistrer[$key]=$value;
		}

	}

	//==> le tableau final
	$finalTab=array();
	//==> le cout total final
	$finalCost = 0;

	//lesTypeCateg
	$lesTypeCateg= array();

	//==> Création des enregistrements dans la bdd
	foreach($aEnregistrer as $key => $value){
		//Si la valeur a été renseignée ou qu'elle n'est pas nulle
		if(!empty($value) && $value != 0){
			//recup la categorie
			$idTypeCateg = explode("-", $key);
			$typeCateg = new TypeCateg($idTypeCateg[0], $idTypeCateg[1], NULL);
			$typeCateg->retrieve();
			array_push($lesTypeCateg, $typeCateg);
			//on crée l'enregistrement
			$enregistrement = new Enregistrer($reservation, $typeCateg, $value);
			$enregistrement->create();

			$finalTab[$typeCateg->libelle()][0] = $value;
			$finalTab[$typeCateg->libelle()][1]=$idTypeCateg;

			//Calcul du cout final
			//(Liaison $liaison, $dateDeb,TypeCateg  $categorie, Traversee $traversee)
			$tarif = Tarif::getPrix($_SESSION['laLiaison'], $typeCateg, $traversee);
			$finalTab[$typeCateg->libelle()][2]=$tarif;
			$finalCost = $finalCost+($value*$tarif);
			$finalTab[$typeCateg->libelle()][3]=$tarif;
		}
	}
	$reservation->setLesTypeCateg($lesTypeCateg);


//}catch(Exception $e){
//	$action = "error";
//	$info = "insert";
//	$info2 = $e;
//}


$status = "recap";
//$info = "";
?>
