

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
					<div class="content-404">
						<div class="img-404">
							<img src="images/404-not_found.png" alt="404 NOT FOUND">
						</div>
						<div class="text-404">
							<p>Are you lost? <a href="http://localhost/SIO2/SLAM5/Oceanix/">home</a></p>
						</div>
					</div>

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
