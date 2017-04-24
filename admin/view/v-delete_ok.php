<?php
if (Passerelle::logged()){
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Compagnie Maritime Océanix</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
	</head>
	<body>
		<div id="main">
			<header>
				<?php include "html/header.html" ?>
				<nav>
					<?php include "html/menu.html" ?>
				</nav>
			</header>

			<section>
				<div class="content">
					<?php
					if(!empty($bat)){
						if($result = true)
						echo "<h1> Le bateau: \"".$bat->nomBat()."\" a été supprimé avec succès !</h1>";
						echo "<p><a href=\"index.php?action=consult_bat\">Retour à la liste des bateaux</a></p>";
						else {
							echo "<h1>ERREUR: Le Bateau n'a pas put être supprimé. Veuillez réessayer.</h1>";
						}
					}else if(!empty($typCateg)){
						if($result = true)
						echo "<h1> Le type / catégorie: \"".$typCateg->libelle()."\" a été supprimé avec succès !</h1>"
						echo "<p><a href=\"index.php?action=consult_bat\">Retour à la liste des bateaux</a></p>";
						else {
							echo "<h1>ERREUR: Le type / catégorie n'a pas put être supprimé. Veuillez réessayer.</h1>";
						}
					}
					?>

				</div>
			</section>

			<footer>
				<?php include "html/footer.html" ?>
			</footer>
		</div>
	</body>
</html>
<?php
}else{ Header('Locate: /index.php?action=404');}
?>
