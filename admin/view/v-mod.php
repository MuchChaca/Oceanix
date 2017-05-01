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
				break;

			//--> TRAVERSEE
			case 'trav': ?>
				<!-- TITLE-LIAISON -->
				<div class="row">
					<div class="col-lg-12 text-center">
						<h1>La traversée n° <?= $trav->num() ?></h1>
					</div>
				</div>

				<!-- main-liaison-container -->
				<div class="row">
					<div class="col-lg-12 text-center">
						<form action="index.php?adm=true&action=mod&obj=trav" method="POST">
							<input type="hidden" name="num" value="<?= $trav->num() ?>" />
							<div class="form-area">
								<div class="simple-form">
									<div class="simple-form-legend form-left"><h5>Date traversée </h5></div>
									<div class="simple-form-field form-left">
										<input type="text" size=30 name="date" required value="<?= $trav->dateTraversee() ?>" placeholder="jj/mm/aaaa" />
									</div>
								</div>
								<div class="simple-form">
									<div class="simple-form-legend form-left"><h5>Heure </h5></div>
									<div class="simple-form-field form-left" style="width: 94px !important">
										<input type="number" min="0" max="24" name="hour" style="width: 98% !important" required value="<?= substr($trav->heure(), -5, 2) ?>" />
									</div>
									<strong style="font-size: 1.5em; font-weight:800;">: </strong>
									<div class="simple-form-field form-left" style="width: 94px !important">
										<input type="number" min="0" max="60" name="minutes" style="width: 98% !important" rrequired value="<?= substr($trav->heure(), -2, 2) ?>" />
									</div>
								</div>
								<div class="simple-form">
									<div class="simple-form-legend form-left"><h5>Bateau </h5></div>
									<div class="simple-form-field form-left">
										<select name="bateau">
											<?php foreach($allBat as $bat){ ?>
												<option value="<?= $bat->idBat() ?>"
													<?php if($bat->idBat()==$trav->bateau()->idBat()){ echo " selected"; } ?> >
													<?= $bat->nomBat() ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="simple-form">
									<div class="simple-form-legend form-left"><h5>Liaison </h5></div>
									<div class="simple-form-field form-left">
										<select name="liaison">
											<?php foreach($allLiai as $liai){ ?>
												<option value="<?= $liai->getCode() ?>"
													<?php if($liai->getCode()==$trav->liaison()->getCode()){ echo " selected"; } ?> >
													[<?= $liai->getCode() ?>] <?= $liai->getLePortDep()->getNom() ?> - <?= $liai->getLePortArr()->getNom() ?>
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
				break;

				//--> TYPECATEG
				case 'tycat': ?>
					<!-- TITLE-TYPECATEG -->
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1>La catégorie: <?= $typCateg->lettreCateg() ?> - <?= $typCateg->numOrdre() ?></h1>
						</div>
					</div>

					<!-- main-TYPECATEG-container -->
					<div class="row">
						<div class="col-lg-12 text-center">
							<form action="index.php?adm=true&action=mod&obj=tycat" method="POST">
								<input type="hidden" name="lettre" value="<?= $typCateg->lettreCateg() ?>" />
								<input type="hidden" name="num" value="<?= $typCateg->numOrdre() ?>" />
								<div class="form-area">
									<div class="simple-form">
										<div class="simple-form-legend form-left"><h5>Libelle </h5></div>
										<div class="simple-form-field form-left">
											<input type="text" size=40 name="libelle" required value="<?= $typCateg->libelle(); ?>"/>
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
					break;

					default:
						Header('Locate: /index.php?action=404');
						break;
					?>
<?php
}
}else{
	Header('Locate: /index.php?action=404');
}
?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->
