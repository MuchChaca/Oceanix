<?php
if(Passerelle::logged()){
	session_destroy();
	Header('Location: '.$_SERVER['PHP_SELF'].'?action=connection');
	ob_end_clean();
}else{
	// header('Location:index.php?action=connection');
	$status = "form_connexion";
}
$adminMode = false;
?>
