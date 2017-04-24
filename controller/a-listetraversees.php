<?php
if(!empty($_POST['dateVoulue'])){
	if(preg_match("#^[0-9]{2}/[0-9]{2}/[0-9]{4}$#", $_POST['dateVoulue'])){  //--> Bon format?
		##-- formate la date au format SQL
		$dateSql=preg_replace("#([0-9]{2})/([0-9]{2})/([0-9]{4})#", '$3-$2-$1', $_POST['dateVoulue']);
		echo $_SESSION['laLiaison']->retrieve();
		$traversees=Liaison::chargerTraversees($_SESSION['laLiaison'], $dateSql);
	}else{
		$status= "error";
		$info = "dateFormat";
	}
	
	$status="listetraversees";
}else{
	$status = "error";
	$info= "date";
}
?>