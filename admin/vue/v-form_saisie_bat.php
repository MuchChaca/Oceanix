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
					<h1> Saisie d'un bateau </h1>
					<form action="index.php?action=valid_crea_bat" method="POST">
					<table>
						<tr>
							<td>Nom bateau </td><td><input type="text" size=30 name="nomBat" required ></input></td>
						</tr>
						<tr>
							<td>Tirant d'eau à vide </td><td><input type="text" size=5 name="tirantVide" required ></input></td>
						</tr>
						<tr>
							<td>Tirant d'eau en charge </td><td><input type="text" size=5 name="tirantCharge" required ></input></td>
						</tr>
						<tr>
							<td>Hauteur coque </td><td><input type="text" size=5 name="hauteurCoque" required ></input></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Valider"></input></td>
						</tr>
					</table>
					</form>
				</div>
			</section>

			<footer>
				<?php include "html/footer.html" ?>
			</footer>
		</div>
	</body>
</html>
