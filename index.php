<?php
/**
 * @param Class $class -> une le nom d'une classe
 * @category Autoload class - Charge automatiquement les classes nécessaires.
 */
function loadClass($class){
	require_once "model/".$class.".php";
}
spl_autoload_register("loadClass");

session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Compagnie Maritime Océnaix</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
	</head>
	<body>
		<div id="main">
			<header>
				<?php include "view/html/header.html" ?>
				<nav>
					<?php include "view/html/menu.html" ?>
				</nav>
			</header>
			<section>
				<div class="content">
					<?php
						//the action
						if(!empty($_GET['action'])){
							$action=$_GET['action'];
							$action=strtolower($action);
						}else{
							$action="init";
						}
						//controler
							include "controler/a-".$action.".php";
						//view
						if(!empty($status)){
							include "view/v-".$status.".php";
						}
					?>
				</div>
			</section>
		</div>
			<footer>
				<?php include "view/html/footer.html" ?>
			</footer>
		
	</body>
</html>


