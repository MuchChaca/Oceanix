<!-- <div id="menu_container">
	<ul class="sf-menu" id="nav">
		<li><a href="index.php?action=liaisons">Nos liaisons</a></li>
		<li><a href="index.php?action=tarifs">Tarifs</a></li>
		<li><a href="index.php?action=liaisons">Réserver</a></li>
		<li><a href="admin/index.php">Connexion</a></li>
	</ul>
</div> -->
<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
				<div class="container">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header page-scroll">
												<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
																<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
												</button>
												<a class="navbar-brand" href="index.php" title="Compagnie Maritime Océanix">
													<img src="favicon.png" width="40px" style="float: left; margin: -10px 10px;" alt="logo-oceanix">
													Océanix
												</a>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
												<ul class="nav navbar-nav navbar-right">
																<li class="hidden">
																				<a href="#page-top"></a>
																</li>
																<li class="page-scroll">
																				<a href="index.php?action=liaisons">Nos liaisons</a>
																</li>
																<li class="page-scroll">
																	<a href="index.php?action=liaisons">Réserver</a>
																</li>
																<li class="page-scroll">
																	<a href="index.php?action=about">A Propos</a>
																</li>
																<li class="page-scroll">
																	<?php echo (Passerelle::logged()) ?
																	"<a href=\"index.php?action=connection\">Déconnexion</a>" :
																	"<a href=\"index.php?action=connection\">Connexion</a>";
																	?></a>
																</li>
												</ul>
								</div>
								<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
</nav>
