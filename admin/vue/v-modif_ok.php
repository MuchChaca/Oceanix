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
					<h1> Modification effectuée </h1>
					<?php
					if(!empty($bat)){
						echo "<table>
									<tr>
										<th>Nom : </th>
										<td>".$bat->nomBat()."</td>
									</tr>
								</table>";
						echo "<p><a href=\"index.php?action=consult_bat\">Retour à la liste des bateaux</a></p>";
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
