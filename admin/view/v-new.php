<?php
if(Passerelle::logged()){ ?>
<section class="portfolio" id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

	<?php
	switch($obj){
		//=> NEW TARIF
		case 'tari': ?>
			<!-- TITLE-BATEAU -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Création d'un tarif</h1>
				</div>
			</div>

			<!-- main-TARIF-container -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="index.php?adm=true&action=new&obj=tari" method="POST">
						<div class="form-area">
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Liaison </h5></div>
								<div class="simple-form-field form-left">
									<select name="liai">
										<option selected value="none">&lt; Sélectionnez &gt;</option>
										<?php foreach($allLiai as $liai): ?>
											<option value="<?= $liai->getCode() ?>">[<?= $liai->getCode() ?>]
												<?= $liai->getLePortDep()->getNom() ?> - <?= $liai->getLePortArr()->getNom() ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Date début </h5></div>
								<div class="simple-form-field form-left">
									<input type="text" maxlength="10" name="date" required placeholder="JJ/MM/AAAA" />
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Catégorie </h5></div>
								<div class="simple-form-field form-left">
									<select name="tycat">
										<option selected value="none">&lt; Sélectionnez &gt;</option>
										<?php foreach($allTypeCateg as $typeCateg): ?>
											<option value="<?= $typeCateg->lettreCateg() ?>-<?= $typeCateg->numOrdre() ?>">
												<?= $typeCateg->libelle() ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Tarif (en €)</h5></div>
								<div class="simple-form-field form-left">
									<input type="number" minvalue="0" name="tarif" value="0" required />
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

		//=> NEW Traversee
		case 'trav': ?>
			<!-- TITLE-TRVERSEE -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Création d'une traversée</h1>
				</div>
			</div>

			<!-- main-traversee-container -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="index.php?adm=true&action=new&obj=trav" method="POST">
						<div class="form-area">
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Date et heure traversée </h5></div>
								<div class="simple-form-field form-left">
									<div  class="simple-form-field"><input type="date" name="date" required placeholder="jj/mm/aaa" /></div>
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Heure </h5></div>
								<div class="simple-form-field form-left" style="width: 94px !important">
									<input type="number" value="00" min="0" max="24" name="hour" style="width: 98% !important" required />
								</div>
								<strong style="font-size: 1.5em; font-weight:800;">: </strong>
								<div class="simple-form-field form-left" style="width: 94px !important">
									<input type="number" value="00" min="0" max="60" name="minutes" style="width: 98% !important" rrequired />
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Bateau </h5></div>
								<div class="simple-form-field form-left">
									<select name="bateau">
										<option selected value="err">&lt; Sélectionnez &gt;</option>
										<?php foreach($allBat as $bat): ?>
											<option value="<?= $bat->idBat() ?>"><?= $bat->nomBat() ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Liaison </h5></div>
								<div class="simple-form-field form-left">
									<select name="liaison">
										<option selected value="err">&lt; Sélectionnez &gt;</option>
										<?php foreach($allLiai as $liai): ?>
											<option value="<?= $liai->getCode() ?>">[<?= $liai->getCode() ?>]
												<?= $liai->getLePortDep()->getNom() ?> - <?= $liai->getLePortArr()->getNom() ?></option>
										<?php endforeach; ?>
									</select>
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

		//=> NEW TYPECATEG
		case 'tycat': ?>
			<!-- TITLE-TYPECATEG -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Création d'une catégorie</h1>
					<?php if(!empty($err)){ echo $err; } ?>
				</div>
			</div>

			<!-- main-TYPECATEG-container -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<form action="index.php?adm=true&action=new&obj=tycat" method="POST">
						<div class="form-area">
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Lettre </h5></div>
								<div class="simple-form-field form-left">
									<input type="text" maxlength="1" name="lettre" required />
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Numéro </h5></div>
								<div class="simple-form-field form-left">
									<input type="number" minimum="1" value="1" maxlength="1" name="num" required />
								</div>
							</div>
							<div class="simple-form">
								<div class="simple-form-legend form-left"><h5>Libellé </h5></div>
								<div class="simple-form-field form-left">
									<input type="text" name="libelle" required />
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
		 ?>
	<?php
		default:
			Header('Locate: index.php?action=404');
	}
	?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //portfolio -->
<?php
}else{
	Header('Locate: index.php?action=valid_connexion');
}
?>
