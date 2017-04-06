<?php
require "modele/Bateau.php";

//*** Calcul cat�gorie bateau
$baisse = $_POST["tirantCharge"] - $_POST["tirantVide"];
$coeff = ($baisse / $_POST["hauteurCoque"]) * 100;
switch ($coeff)
{
  case ($coeff > 25) :
    $categ='A';
	break;
  case ($coeff > 10) :
    $categ='B';
	break;
  case ($coeff > 0) :
    $categ='C';
	break;
}

//*** D�termination bassin de parcage du bateau en fonction de sa cat�gorie
if ($categ == 'A') {
  $bassin = 1;
}
else {
  $bassin = 2;
}

$bat = new bateau('', $_POST["nomBat"], $bassin);
$bat->create( );
$etat = "creation_ok";
?>
