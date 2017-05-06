<?php if(Passerelle::logged()){ ?>
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

		<div class="row">
			<!-- div-liaison -->
			<div class="col-lg-12 text-center">
						<div class="display-table">
							<table>
								<thead>
									<tr><th colspan="4"><h5>La Liaison</h5></th></tr>
									<tr>
										<th>Code</th>
										<th>Distance</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td><?= $liaison->getCode() ?></td>
											<td><?= $liaison->getDistance() ?> km</td>
											<td><a href="index.php?adm=true&action=mod&obj=liai&id=<?= $liaison->getCode() ?>">
												<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
											</a></td>
											<td><a href="index.php?adm=true&action=del&obj=liai&id=<?= $liaison->getCode() ?>">
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
											<td><?= $liaison->getLePortDep()->getId() ?></td>
											<td><?= $liaison->getLePortDep()->getNom() ?></td>
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
											<td><?= $liaison->getLePortArr()->getId() ?></td>
											<td><?= $liaison->getLePortArr()->getNom() ?></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
			<!-- //div-port-arr -->
		</div> <!-- //row-laison -->
		<?php break;
		//--> RESERVATION
		case 'rese': ?>
			<!-- TITLE-LIAISON -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>La réservation n° <?= $reserv->num() ?></h1>
				</div>
			</div>

			<div class="row">
				<!-- div-liaison -->
				<div class="col-lg-12 text-center">
							<div class="display-table">
								<table>
									<thead>
										<tr><th colspan="4"><h5>La réservation</h5></th></tr>
									</thead>
									<tbody>
											<tr>
												<td><b>Nom</b></td>
												<td><?= $reserv->nom() ?></td>
											</tr>
											<tr>
												<td><b>Adresse</b></td>
												<td><?= $reserv->adr() ?></td>
											</tr>
											<tr>
												<td><b>Code Postal</b></td>
												<td><?= $reserv->cp() ?></td>
											</tr>
											<tr>
												<td><b>Ville</b></td>
												<td><?= $reserv->ville() ?></td>
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
											<th colspan="4"><h5>La Liaison</h5></th>
										</tr>
										<tr>
											<th>Code</th>
											<th>Port Départ</th>
											<th>Port Arrivé</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
											<tr>
												<td><?= $reserv->laTraversee()->liaison()->getCode() ?></td>
												<td><?= $reserv->laTraversee()->liaison()->getLePortDep()->getNom() ?></td>
												<td><?= $reserv->laTraversee()->liaison()->getLePortArr()->getNom() ?></td>
												<td><a href="index.php?adm=true&action=view&obj=liai&id=<?= $reserv->laTraversee()->liaison()->getCode() ?>">
													<i class="fa fa-eye" aria-hidden="true" alt="Voir" title="Voir"></i>
												</a></td>
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
											<th colspan="4"><h5>Enregistrements</h5></th>
										</tr>
										<tr>
											<th>Catégorie</th>
											<th>Quantité</th>
											<th>Tarif</th>
										</tr>
									</thead>
									<tbody>
											<?php foreach($reserv->lesTypeCateg() as $enr): ?>
												<tr>
													<td><?= $enr->leTypeCateg()->libelle() ?></td>
													<td><?= $enr->quantite() ?></td>
													<td><?= Tarif::getPrix($reserv->laTraversee()->liaison(), $enr->leTypeCateg(), $reserv->laTraversee()) ?> €</td>
												</tr>
											<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
				<!-- //div-port-arr -->
			</div> <!-- //row-laison -->
			<?php break;?>
	<?php case 'autre': ?>
		<!-- // -->
		<?php break; ?>
	<?php default:
		Header('Location: index.php?action=404');
		ob_end_clean();
		break;
}
}else{
	Header('Location: index.php?action=404');
}
}else{
	Header('Location: index.php?action=valid_connexion');
}?>


</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //portfolio -->
