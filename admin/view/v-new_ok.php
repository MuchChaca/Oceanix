<?php
if(Passerelle::logged()){
 ?>

<section class="portfolio" id="porfolio">
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
}else if(!empty($newLiaison)){  // For a created 'Liaison'?>
<!-- TITLE-LIAISON -->
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
							<tr><th colspan="4"><h5>La liaison créé</h5></th></tr>
							<tr>
								<th>Code</th>
								<th>Distance</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td><?= $newLiaison->getCode() ?></td>
									<td><?= $newLiaison->getDistance() ?> km</td>
									<td><a href="index.php?adm=true&action=mod&obj=liai&id=<?= $newLiaison->getCode() ?>">
										<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
									</a></td>
									<td><a href="index.php?adm=true&action=del&obj=liai&id=<?= $newLiaison->getCode() ?>">
										<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
									</a></td>
								</tr>
						</tbody>
					</table>
				</div>
			</div> <!-- //div-liaison -->

	<!-- div-port-dep -->
	<div class="col-md-3 col-md-offset-1">
				<div class="display-table">
					<table>
						<thead>
							<tr>
								<th colspan="4"><h5>Port de départ</h5></th>
							</tr>
							<tr>
								<th>ID</th>
								<th>Nom</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td><?= $newLiaison->getLePortDep()->getId() ?></td>
									<td><?= $newLiaison->getLePortDep()->getNom() ?></td>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
	<!-- //div-port-dep -->

	<!-- div-port-arr -->
	<div class="col-md-3 col-md-offset-3">
				<div class="display-table">
					<table>
						<thead>
							<tr>
								<th colspan="4"><h5>Port d'arrivé</h5></th>
							</tr>
							<tr>
								<th>ID</th>
								<th>Nom</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td><?= $newLiaison->getLePortArr()->getId() ?></td>
									<td><?= $newLiaison->getLePortArr()->getNom() ?></td>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
	<!-- //div-port-arr -->
</div> <!-- //row-laison -->
<p><a href="index.php?action=liaisons">Retour à la liste des liaisons</a></p>
<?php
}else if(!empty($newPort)){  // For a created 'Port'?>
	<!-- TITLE-PORT -->
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
						<tr><th colspan="6"><h5>Le port créé</h5></th></tr>
						<tr>
							<th>ID</th>
							<th>Nom</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td><?= $newPort->getId() ?></td>
								<td><?= $newPort->getNom() ?></td>
								<td><a href="index.php?adm=true&action=mod&obj=port&id=<?= $newPort->getId() ?>">
									<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
								</a></td>
								<td><a href="index.php?adm=true&action=del&obj=port&id=<?= $newPort->getId() ?>">
									<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
								</a></td>
							</tr>
					</tbody>
			</table>
		</div>
	</div>
</div>
	<p><a href="index.php?adm=true&action=list&obj=port">Retour à la liste des ports</a></p>
<?php
}else if(!empty($newTrav)){  // For a created 'Traversee'?>
<!-- TITLE-TRAVERSEE -->
<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Création effectuée</h1>
	</div>
</div>

<div class="row">
	<!-- div-liaison -->
	<div class="col-lg-12 text-center">
		<div class="col-md-10 col-md-offset-1">
			<div class="display-table">
				<table>
					<thead>
							<th>Numéro</th>
							<th>Date traversée</th>
							<th>Heure</th>
							<th class="admin" colspan="2">Action</th>
						</tr>
					</thead>
						<tbody>
							<tr>
								<td><?= $newTrav->num() ?></td>
								<td><?= $newTrav->dateTraversee() ?></td>
								<td><?= $newTrav->heure() ?></td>
								<td><a href="index.php?adm=true&action=mod&obj=trav&id=<?= $newTrav->num() ?>">
									<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
								</a></td>
								<td><a href="index.php?adm=true&action=del&obj=trav&id=<?= $newTrav->num() ?>">
									<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
								</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> <!-- //div-traversee -->

			<!-- div-bateau -->
			<div class="col-md-4 col-md-offset-0">
						<div class="display-table">
					<table>
						<thead>
							<tr>
								<th colspan="4"><h5>Bateau</h5></th>
							</tr>
							<tr>
								<th>ID</th>
								<th>Nom</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td><?= $newTrav->bateau()->idBat() ?></td>
									<td><?= $newTrav->bateau()->nomBat() ?></td>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
	<!-- //div-bateau -->

	<!-- div-liaison -->
	<div class="col-md-4 col-md-offset-2">
				<div class="display-table">
					<table>
						<thead>
							<tr>
								<th colspan="4"><h5>Liaison</h5></th>
							</tr>
							<tr>
								<th>Code</th>
								<th>Port de départ</th>
								<th>Port d'arrivé</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td><?= $newTrav->liaison()->getCode() ?></td>
									<td><?= $newTrav->liaison()->getLePortDep()->getNom() ?></td>
									<td><?= $newTrav->liaison()->getLePortArr()->getNom() ?></td>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
	<!-- //div-port-arr -->
</div> <!-- //row-laison -->
<p><a href="index.php?adm=true&action=list&obj=trav">Retour à la liste des traversées</a></p>
<?php
}else if(!empty($newTypeCateg)){  // For a created 'Port'?>
	<!-- TITLE-PORT -->
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
						<tr><th colspan="5"><h5>La catégorie créée</h5></th></tr>
						<tr>
							<th>Lettre</th>
							<th>Numéro</th>
							<th>Libellé</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td><?= $newTypeCateg->lettreCateg() ?></td>
								<td><?= $newTypeCateg->numOrdre() ?></td>
								<td><?= $newTypeCateg->libelle() ?></td>
								<td><a href="index.php?adm=true&action=mod&obj=tycat&l=<?= $newTypeCateg->lettreCateg() ?>&n=<?= $newTypeCateg->numOrdre() ?>">
									<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
								</a></td>
								<td><a href="index.php?adm=true&action=del&obj=tycat&l=<?= $newTypeCateg->lettreCateg() ?>&n=<?= $newTypeCateg->numOrdre() ?>">
									<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
								</a></td>
							</tr>
					</tbody>
			</table>
		</div>
	</div>
</div>
	<p><a href="index.php?adm=true&action=list&obj=tycat">Retour à la liste des catégories</a></p>
<?php
}else if(!empty($newTarif)){  // For a created 'Tarif'?>
	<!-- TITLE-Tarif -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h1>Création effectuée</h1>
		</div>
	</div>

	<div class="row">
		<!-- div-Tarif -->
		<div class="col-lg-12 text-center">
			<div class="display-table">
				<table>
					<thead>
						<tr><th colspan="6"><h5>Le tarif créé</h5></th></tr>
						<tr>
							<th>Liaison</th>
							<th>Date Début</th>
							<th>Catégorie</th>
							<th>Tarif / U</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td><?= $newTarif->liaison()->getCode() ?></td>
								<td><?= $newTarif->affiDate() ?></td>
								<td><?= $newTarif->typeCateg()->libelle() ?></td>
								<td><?= $newTarif->tarif() ?> €</td>
								<td><a href="index.php?adm=true&action=mod&obj=tari&liai=<?= $newTarif->liaison()->getCode() ?>&l=
									<?= $newTarif->typeCateg()->lettreCateg() ?>&n=<?= $newTarif->typeCateg()->numOrdre() ?>&date=<?= $newTarif->dateDeb() ?>">
									<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
								</a></td>
								<td><a href="index.php?adm=true&action=del&obj=tari&liai=<?= $newTarif->liaison()->getCode() ?>&l=
									<?= $newTarif->typeCateg()->lettreCateg() ?>&n=<?= $newTarif->typeCateg()->numOrdre() ?>&date=<?= $newTarif->dateDeb() ?>">
									<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
								</a></td>
							</tr>
					</tbody>
			</table>
		</div>
	</div>
</div>
	<p><a href="index.php?adm=true&action=list&obj=tari">Retour à la liste des tarifs</a></p>
<?php
}else{
	Header('Location: index.php?action=404');
}
?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->

<?php
}
 ?>
