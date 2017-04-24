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
						<div class="connectForm">
							<form action="?action=valid_connexion" method="POST">
								<table>
									<tr>
										<th>Nom</th>
										<td><input type="text" name="login" required /></td>
									</tr>
									<tr>
										<th>Mot de passe</th>
										<td><input type="password" name="mdp" required ></td>
									</tr>
									<tr>
										<td colsrow	="2"><input type="submit" value="Connexion"></td>
									</tr>
								</table>
							</form>
						</div>
				</div>
			</section>
					
			<footer>
				<?php include "html/footer.html" ?>
			</footer>
		</div>	  
	</body>
</html>