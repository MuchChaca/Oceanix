<section class="portfolio" id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">


<?php
if(!empty($obj)){
switch($obj){
	//--> LIAISON
	case 'liai': ?>
		<!-- TITLE-LIAISON -->
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1>La liaison: <?= $liaison->getCode() ?></h1>
			</div>
		</div>

		<!-- main-liaison-container -->
		<div class="row">
			<div class="col-lg-12 text-center">
				<form action="index.php?adm=true&action=mod&obj=liai" method="POST">
					<input type="hidden" name="id" value="<?= $liaison->getCode() ?>" />
					<div class="form-area">
						<div class="simple-form">
							<div class="simple-form-legend form-left"><h5>Distance Liaison </h5></div>
							<div class="simple-form-field form-left">
								<input type="number" size=30 name="distance" required value="<?= $liaison->getDistance(); ?>"/>
							</div>
						</div>
						<div class="simple-form">
							<div class="simple-form-legend form-left"><h5>Port de départ </h5></div>
							<div class="simple-form-field form-left">
								<select name="portDep">
									<?php foreach($ports as $port){ ?>
										<option value="<?= $port->getId() ?>"
											<?php if($port->getId()==$liaison->getLePortDep()->getId()){ echo " selected"; } ?> >
											<?= $port->getNom() ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="simple-form">
							<div class="simple-form-legend form-left"><h5>Port d'arrivé </h5></div>
							<div class="simple-form-field form-left">
								<select name="portArr">
									<?php foreach($ports as $port){ ?>
										<option value="<?= $port->getId() ?>"
											<?php if($port->getId()==$liaison->getLePortArr()->getId()){ echo " selected"; } ?> >
											<?= $port->getNom() ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="simple-form">
							<div class="simple-form-submit"><input type="submit" value="Valider"></input></div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
		break; ?>
		<?php
		//--> BATEAU
		case 'boat': ?>
			<!-- TITLE-BATEAU -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Le Bateau: <?= $bat->nomBat() ?></h1>
				</div>
			</div>

			<!-- main-Bateau-container -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="index.php?adm=true&action=mod&obj=boat" method="POST">
						<input type="hidden" name="id" value="<?= $bat->idBat() ?>" />
						<div class="form-area">
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Nom </h5></div>
								<div class="simple-form-field form-left">
									<input type="text" size=40 name="nomBat" required value="<?= $bat->nomBat(); ?>"/>
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
			//--> Port
			case 'port': ?>
				<!-- TITLE-PORT -->
				<div class="row">
					<div class="col-lg-12 text-center">
						<h1>Le port: <?= $port->getNom() ?></h1>
					</div>
				</div>

				<!-- main-Bateau-container -->
				<div class="row">
					<div class="col-lg-12 text-center">
						<form action="index.php?adm=true&action=mod&obj=port" method="POST">
							<input type="hidden" name="id" value="<?= $port->getId() ?>" />
							<div class="form-area">
								<div class="simple-form">
									<div class="simple-form-legend form-left"><h5>Nom </h5></div>
									<div class="simple-form-field form-left">
										<input type="text" size=40 name="nom" required value="<?= $port->getNom(); ?>"/>
									</div>
								</div>
								<!-- submit -->
								<div class="simple-form">
									<div class="simple-form-submit"><input type="submit" value="Valider" /></div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php
				break; ?>
<?php
}
}else{
	Header('Locate: /index.php?action=404');
}
?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->
