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
				<?php include "html/header.html" ?>
				<nav>
					<?php include "html/menu.html" ?>
				</nav>
			</header>
			
			<section>
				<div class="content">
					<h1> Echec d'authentification - Veillez recommencer </h1>
					<form action="index.php?action=valid_connexion" method="post">
						<table>
							<tr>
								<td>Nom : </td>
								<td><input type="text" size=15 name="login"></input></td>
							<tr>
							<tr>
								<td>Mot de passe : </td>
								<td><input type="password" size=15 name="mdp"></input></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" value="Valider"></input></td>
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


<h1> </h1>