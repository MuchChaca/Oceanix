<?php
if (Passerelle::logged()){
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Compagnie Maritime Océanix</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<link rel="stylesheet" href="styles/font-awesome-4.7.0/css/font-awesome.min.css">
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
					<h1> Liste des bateaux:</h1>
					<table>
						<tr>
							<th>ID</th>
							<th>Nom</th>
							<th>Action</th>
						</tr>
					<?php
						foreach($listBat as $bat){
							echo "<tr>
								<td>".$bat->idBat()."</td>
								<td>".$bat->nomBat()."</td>
								<td class='tabAction'><a href='index.php?action=delete_bat&id=".$bat->idBat()."'><i class='fa fa-trash' aria-hidden='true'></i></a>
									<a href='index.php?action=modif_bat&id=".$bat->idBat()."'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
							</tr>";
						}
					?>
					</table>
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
