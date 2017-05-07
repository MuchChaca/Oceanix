<section class="portfolio" id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

					<?php
					if(!empty($typCateg)){ ?>
						<!-- TITLE-TYPECATEG -->
						<div class="row">
							<div class="col-lg-12 text-center">
								<h1>Modification effectuée</h1>
							</div>
						</div>

						<div class="row">
							<!-- div-TYPECATEG -->
							<div class="col-lg-12 text-center">
								<div class="display-table">
									<table>
										<thead>
												<th>Lettre</th>
												<th>Numéro</th>
												<th>Libellé</th>
												<th class="admin" colspan="2">Action</th>
											</tr>
										</thead>
										<tbody>
												<tr>
													<td><?= $typCateg->lettreCateg() ?></td>
													<td><?= $typCateg->numOrdre() ?></td>
													<td><?= $typCateg->libelle() ?></td>
													<td><a href="index.php?adm=true&action=mod&obj=tycat&l=<?= $typCateg->lettreCateg() ?>&n=<?= $typCateg->numOrdre() ?>">
														<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
													</a></td>
													<td><a href="index.php?adm=true&action=del&obj=tycat&l=<?= $typCateg->lettreCateg() ?>&n=<?= $typCateg->numOrdre() ?>">
														<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
													</a></td>
												</tr>
										</tbody>
								</table>
							</div>
						</div>
					</div>
						<p><a href="?adm=true&action=list&obj=tycat">Retour à la liste des catégories</a></p>
					<?php
					}else if(!empty($newLiaison)){ ?>
						<!-- TITLE-LIAISON -->
						<div class="row">
							<div class="col-lg-12 text-center">
								<h1>Modification effectuée</h1>
							</div>
						</div>

						<div class="row">
							<!-- div-liaison -->
							<div class="col-lg-12 text-center">
								<div class="display-table">
									<table>
										<thead>
											<tr><th colspan="6"><h5>La Liaison Modifiée</h5></th></tr>
											<tr>
												<th>Code</th>
												<th>Port de Départ</th>
												<th>Port d'Arrivé</th>
												<th>Distance</th>
												<th colspan="2">Action</th>
											</tr>
										</thead>
										<tbody>
												<tr>
													<td><?= $newLiaison->getCode() ?></td>
													<td><?= $newLiaison->getLePortDep()->getNom() ?></td>
													<td><?= $newLiaison->getLePortArr()->getNom() ?></td>
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
						</div>
					</div>
						<p><a href="index.php?action=liaisons">Retour à la liste des liaisons</a></p>
					<?php
				}else if(!empty($newBat)){ ?>
					<!-- TITLE-BATEAU -->
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1>Modification effectuée</h1>
						</div>
					</div>

					<div class="row">
						<!-- div-liaison -->
						<div class="col-lg-12 text-center">
							<div class="display-table">
								<table>
									<thead>
										<tr><th colspan="6"><h5>Le Bateau Modifié</h5></th></tr>
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
					<p><a href="?adm=true&action=list&obj=boat">Retour à la liste des bateaux</a></p>
				<?php
			}else if(!empty($newPort)){ ?>
					<!-- TITLE-Port -->
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1>Modification effectuée</h1>
						</div>
					</div>

					<div class="row">
						<!-- div-liaison -->
						<div class="col-lg-12 text-center">
							<div class="display-table">
								<table>
									<thead>
										<tr><th colspan="6"><h5>Le Port Modifié</h5></th></tr>
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
					<p><a href="?adm=true&action=list&obj=port">Retour à la liste des ports</a></p>
				<?php
			}else if(!empty($newTrav)){ ?>
					<!-- TITLE-TRAVERSEE -->
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1>Modification effectuée</h1>
						</div>
					</div>

					<div class="row">
						<!-- div-traversee -->
						<div class="col-lg-12 text-center">
							<div class="display-table">
								<table>
									<thead>
										<tr><th colspan="7"><h5>La traversée modifiée</h5></th></tr>
										<tr>
											<th>Numéro</th>
											<th>Date Traversée</th>
											<th>Heure</th>
											<th>Bateau</th>
											<th>Liaison</th>
											<th colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>
											<tr>
												<td><?= $newTrav->num() ?></td>
												<td><?= $newTrav->dateTraversee() ?></td>
												<td><?= $newTrav->heure() ?></td>
												<td><?= $newTrav->bateau()->nomBat() ?></td>
												<td><?= $newTrav->liaison()->getCode() ?> km</td>
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
					</div>
				</div>
					<p><a href="index.php?adm=true&action=list&obj=trav">Retour à la liste des traversées</a></p>
				<?php
			}else if(!empty($reserv)){ ?>
				<!-- TITLE-RESERVATION -->
				<div class="row">
					<div class="col-lg-12 text-center">
						<h1>Modification effectuée</h1>
					</div>
				</div>

				<div class="row">
					<!-- div-reserv -->
					<div class="col-lg-12 text-center">
								<div class="display-table">
									<table>
										<thead>
											<tr><th colspan="4"><h5>La réservation n°<?=$reserv->num() ?> modifiée</h5></th></tr>
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
							</div> <!-- //div-reserv -->

					<!-- div-liaison -->
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
					<!-- //div-liaison -->

					<!-- div-enregistrement -->
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
												<th>Tarif Unitaire</th>
											</tr>
										</thead>
										<tbody>
												<?php foreach($lesEnr as $enr):
													$tarif = Tarif::getPrix($reserv->laTraversee()->liaison(), $enr->leTypeCateg(), $reserv->laTraversee()); ?>
													<tr>
														<td><?= $enr->leTypeCateg()->libelle() ?></td>
														<td><?= $enr->quantite() ?></td>
														<td><?= $tarif ?> €</td>
													</tr>
												<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
					<!-- //div-enregistrement -->

					<!-- div-version-pdf -->
					<div class="col-lg-12 text-center">
						<a href="pdf/index.php?&id=<?= $reserv->num() ?>" target="_blank">Accéder à la version PDF</a>
					</div>
					<!-- //div-version-pdf -->
				</div> <!-- //row-reserv -->
				<p><a href="index.php?adm=true&action=list&obj=rese">Retour à la liste des réservations</a></p>
			<?php
		}
				?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->
