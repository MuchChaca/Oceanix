<?php
if(Passerelle::logged()){ ?>
<section class="portfolio" id="porfolio">
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
						<div class="form-area">
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Nom </h5></div>
								<div class="simple-form-field form-left">
									<input type="text" size=40 name="nomBat" required />
								</div>
							</div>
							<!-- submit -->
							<div class="simple-form">
								<div class="simple-form-submit"><input type="submit" value="Valider"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php
			break;
		//=> NEW PORT
		case 'port': ?>
			<!-- TITLE-PORT -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Création d'un port</h1>
				</div>
			</div>

			<!-- main-Port-container -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="index.php?adm=true&action=new&obj=port" method="POST">
						<div class="form-area">
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Nom </h5></div>
								<div class="simple-form-field form-left">
									<input type="text" size=40 name="nom" required />
								</div>
							</div>
							<!-- submit -->
							<div class="simple-form">
								<div class="simple-form-submit"><input type="submit" value="Valider"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php
			break;
		//=> NEW LIAISON
		case 'liai': ?>
			<!-- TITLE-LIAISON -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Création d'une liaison</h1>
					<?php if(!empty($err)){ echo $err; }
					if(!empty($errCode)){ echo $errCode; }  ?>
				</div>
			</div>

			<!-- main-liaison-container -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="index.php?adm=true&action=new&obj=liai" method="POST">
						<div class="form-area">
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Code </h5></div>
								<div class="simple-form-field form-left">
									<input type="text" maxlength="7" name="code" placeholder="XXX-XXX" required />
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Port de départ </h5></div>
								<div class="simple-form-field form-left">
									<select name="portArr">
										<option selected value="err">&lt; Sélectionnez &gt;</option>
										<?php foreach($allPorts as $port): ?>
											<option value="<?= $port->getId() ?>"><?= $port->getNom() ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Port d'arrivé </h5></div>
								<div class="simple-form-field form-left">
									<select name="portDep">
										<option selected value="err">&lt; Sélectionnez &gt;</option>
										<?php foreach($allPorts as $port): ?>
											<option value="<?= $port->getId() ?>"><?= $port->getNom() ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Distance (en km)</h5></div>
								<div class="simple-form-field form-left">
									<input type="number" size=10 name="distance" min="0" value="0" required />
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
			break;
			 ?>
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
