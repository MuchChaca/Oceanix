<?php
if(Passerelle::logged()){ ?>
<section id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

	<?php
	switch($obj){
		//=> NEW BATEAU
		case 'boat': ?>
			<!-- TITLE-BATEAU -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Création d'un bateau</h1>
				</div>
			</div>

			<!-- main-Bateau-container -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="index.php?adm=true&action=new&obj=boat" method="POST">
						<input type="hidden" name="id" />
						<div class="form-area">
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Nom </h5></div>
								<div class="simple-form-field form-left">
									<input type="text" size=40 name="nomBat" required"/>
								</div>
							</div>
							<!-- submit -->
							<div class="simple-form">
								<div class="simple-form-submit"><input type="submit" value="Valider"></input></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php
		break; ?>
	<?php
		default:
			Header('Locate: /index.php?action=404');
	}
	?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //portfolio -->
<?php
}else{
	Header('Locate: /index.php?action=valid_connexion');
}
?>
