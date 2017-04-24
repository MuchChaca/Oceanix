<?php
//echo $_SESSION['laLiaison']->getCode();  //ok
//juste pr etre sur
if(!empty($_SESSION['laLiaison']) && !empty($_GET['numTrav'])){
	$typeCategs=TypeCateg::findAll();
	
	$allTarifs = Tarif::findAll();
	
	$laTraversee = new Traversee($_GET['numTrav']);
	$laTraversee->retrieve();
	
	$status="reservation";
}else{
	$status="error";
	$info="numTrav";
}
