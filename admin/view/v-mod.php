<section id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

<?php
if(!empty($bat)){ ?>
	<h1> Modification d'un bateau </h1>
	<form action="index.php?action=modif_bat" method="POST">
		<table>
			<tr>
				<td>Nom bateau </td><td><input type="text" size=30 name="nomBat" required value="<?= $bat->nomBat(); ?>"/>
				<input type="hidden" name="id" value="<?= $bat->idBat(); ?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Valider"></input></td>
			</tr>
		</table>
	</form><?php
}
?>

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
							<div class="simple-form-legend form-left">Distance Liaison </div>
							<div class="simple-form-field form-left">
								<input type="number" size=30 name="distance" required value="<?= $liaison->getDistance(); ?>"/>
							</div>
						</div>
						<div class="simple-form">
							<div class="simple-form-legend form-left">Port de départ </div>
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
							<div class="simple-form-legend form-left">Port d'arrivé </div>
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
}
}
?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->
