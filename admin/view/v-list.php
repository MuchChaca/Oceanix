<?php
if (Passerelle::logged()){
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Compagnie Maritime Océanix</title>
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

					<?php
						if(!empty($listTypCateg)){
							echo "<h1> Liste des types / catégories :</h1>
							<table>
								<tr>
									<th>Lettre</th>
									<th>Numéro</th>
									<th>Nom</th>
									<th>Action</th>
								</tr>";
							foreach($listTypCateg as $typCateg){
								echo "<tr>
									<td>".$typCateg->lettreCateg()."</td>
									<td>".$typCateg->numOrdre()."</td>
									<td>".$typCateg->libelle()."</td>
									<td class='tabAction'><a href='index.php?action=del&obj=tycat&l=".$typCateg->lettreCateg()."&n=".$typCateg->numOrdre()."'><i class='fa fa-trash' aria-hidden='true'></i></a>
										<a href='index.php?action=mod&obj=tycat&l=".$typCateg->lettreCateg()."&n=".$typCateg->numOrdre()."'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
								</tr>";
							}
							echo "</table>";
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
