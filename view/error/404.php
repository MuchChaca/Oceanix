<?php
ob_start(); //For Header('Location: xx')
/**
 * @param Class $class -> une le nom d'une classe
 * @category Autoload class - Charge automatiquement les classes nécessaires.
 */
function loadClass($class){
	require_once "../../model/".$class.".php";
}
spl_autoload_register("loadClass");

session_start();

Passerelle::gest_error();

?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Océanix - Compagnie Maritime</title>
		<link rel="icon" href="favicon.png">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Theme CSS -->
	<link href="styles/freelancer.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
	<body id="page-top" class="index">
		<section class="portfolio" id="porfolio">
		<div class="row">
			<?php include "../parts/menu.php" ?>

			<?php include "../parts/header.html" ?>

			<?php include "../../admin/tools/admin-bar.php" ?>

			<div class="col-lg-12 text-center">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h1>404 NOT FOUND</h1>
					</div>
				</div>
				<div class="img-404">
					<img src="images/angif-rock-the-boat-def.gif" alt="404 NOT FOUND">
				</div>
				<div class="text-404">
					<p>Etes-vous perdu?</p>
					<p><a href="http://localhost/SIO2/SLAM5/Oceanix/"> Aller à l'Accueil</a></p>
				</div>
			</div>
		</div>
		</section>
	</div>

			<?php include "../parts/footer.html" ?>



		<!-- Bootstrap Core JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- jQuery -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<!-- Plugin JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

		<!-- Contact Form JavaScript -->
		<script src="js/jqBootstrapValidation.js"></script>

		<!-- Theme JavaScript -->
		<script src="js/freelancer.min.js"></script>
	</body>
	</html>
