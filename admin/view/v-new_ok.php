<?php
if(Passerelle::logged()){
 ?>

<section id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">
	<?php
	if(!empty($newBat)){  // For a created 'Bateau'?>
		<!-- TITLE-BATEAU -->
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1>Création effectuée</h1>
			</div>
		</div>

		<div class="row">
			<!-- div-liaison -->
			<div class="col-lg-12 text-center">
				<div class="display-table">
					<table>
						<thead>
							<tr><th colspan="6"><h5>Le Bateau Créé</h5></th></tr>
							<tr>
								<th>ID</th>
								<th>Nom</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td><?= $newBat->idBat() ?></td>
									<td><?= $newBat->nomBat() ?></td>
									<td><a href="index.php?adm=true&action=mod&obj=boat&id=<?= $newBat->idBat() ?>">
										<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
									</a></td>
									<td><a href="index.php?adm=true&action=del&obj=boat&id=<?= $newBat->idBat() ?>">
										<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
									</a></td>
								</tr>
						</tbody>
				</table>
			</div>
		</div>
	</div>
		<p><a href="index.php?adm=true&action=list&obj=boat">Retour à la liste des bateaux</a></p>
	<?php
	}
	?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->

<?php
}
 ?>
