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
					<h1> Création effectuée </h1>
					<?php
					if(!empty($idBat)){
						echo "<table>
									<tr>
										<th>ID</th>
										<th>Nom</th>
									</tr>
									<tr>
										<tr>".$bat->_idBat()."</tr>
										<tr>".$bat->_nomBat()."</tr>
									</tr>
								</table>";
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
