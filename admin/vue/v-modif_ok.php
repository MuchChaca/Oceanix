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
						echo "<h1> Modification effectuée </h1>";
						echo "<table>
									<tr>
										<th>Nom : </th>
										<td>".$bat->nomBat()."</td>
									</tr>
								</table>";
						echo "<p><a href=\"index.php?action=consult_bat\">Retour à la liste des bateaux</a></p>";
					}else if(!empty($typCateg)){
						echo "<h1> Modification effectuée </h1>";
						echo "<table>
									<tr>
										<th>Lettre Catégorie : </th>
										<td>".$typCateg->lettreCateg()."</td>
									</tr>
									<tr>
										<th>Numéro d'ordre : </th>
										<td>".$typCateg->numOrdre()."</td>
									</tr>
									<tr>
										<th>Libelle : </th>
										<td>".$typCateg->libelle()."</td>
									</tr>
								</table>";
						echo "<p><a href=\"index.php?action=list&obj=tycat\">Retour à la liste des types / catégoies</a></p>";
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
