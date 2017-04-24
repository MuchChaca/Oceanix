<?php
if(!empty($_GET['trav'])){
	$_SESSION['laLiaison']=new Liaison($_GET['trav']);
	$_SESSION['laLiaison']->retrieve();
	//echo $_SESSION['laLiaison']->getCode();
	
	$status = "saisiedate";
}
