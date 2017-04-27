<?php
ob_start();
/**
 * @param Class $class -> une le nom d'une classe
 * @category Autoload class - Charge automatiquement les classes nécessaires.
 */
function loadClass($class){
	require_once "model/".$class.".php";
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


				<?php include "view/parts/menu.php" ?>

				<?php include "view/parts/header.html" ?>

				<?php include "admin/tools/admin-bar.php" ?>

		<!-- <section id="portfolio"> -->
			<!-- <div class="container">
					<div class="col-lg-12 text-center"> -->
						<?php
						//the action
						if(!empty($_GET['action'])){
							$action=$_GET['action'];
							$action=strtolower($action);
						}else{
							$action="init";
						}

						//Setting the path
						if(!empty($_GET['adm']) && $_GET['adm']==true){
							$controlerPath="admin/controller/a-".$action;
							$viewPath="admin/view/v-";
						}else{
							$controlerPath="controller/a-".$action;
							$viewPath="view/v-";
						}
						//controler
						// if(!empty($viewPath)){
							include $controlerPath.".php";
						// }
						//view
						// if(!empty($status) && !empty($viewPath)){
						if(!empty($status)){
							include $viewPath.$status.".php";
						}else{
							$status="404";
						}
						// }
						?>
					<!-- </div>
				</div> -->

		<!-- </section> -->
		</div>
				<?php include "view/parts/footer.html" ?>



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
