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
					if(!empty($obj) && $obj=="typeCateg"){
						if(!empty($typCateg)){?>
							<h1> Modification d'un type / catégorie </h1>
							<form action="index.php?action=modif&obj=tycat" method="POST">
								<table>
									<tr>
										<td>Libellé </td>
										<td><input type="text" size=30 name="libelle" required value="<?= $typCateg->libelle(); ?>"/><td>
										<input type="hidden" name="lettre" value="<?= $typCateg->lettreCateg(); ?>" />
										<input type="hidden" name="num" value="<?= $typCateg->numOrdre(); ?>" />
									</tr>
									<tr>
										<td colspan="2"><input type="submit" value="Modifer"></input></td>
									</tr>
								</table>
							</form><?php
						}else{ ?>
							<h1> Saisie d'un bateau </h1>
							<form action="index.php?action=modif&obj=tycat" method="POST">
								<table>
									<tr>
										<td>Libellé </td>
										<td><input type="text" size=30 name="libelle" required /><td>
											<!-- SELECT BALISE TAG A FAIRE ICI  -->
									</tr>
									<tr>
										<td colspan="2"><input type="submit" value="Modifer"></input></td>
									</tr>
								</table>
							</form><?php
						}
					}?>
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
