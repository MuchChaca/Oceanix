<section id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

					<?php
					/*if(!empty($bat)){
						echo "<h1> Modification effectuée </h1>";
						echo "<table>
									<tr>
										<th>Nom : </th>
										<td>".$bat->nomBat()."</td>
									</tr>
								</table>";
						echo "<p><a href=\"index.php?action=consult_bat\">Retour à la liste des bateaux</a></p>";
					}else if(!empty($typCateg)){
						echo "<h1> Modification effectuée </h1>";
						echo "<table>
									<tr>
										<th>Lettre Catégorie : </th>
										<td>".$typCateg->lettreCateg()."</td>
									</tr>
									<tr>
										<th>Numéro d'ordre : </th>
										<td>".$typCateg->numOrdre()."</td>
									</tr>
									<tr>
										<th>Libelle : </th>
										<td>".$typCateg->libelle()."</td>
									</tr>
								</table>";
						echo "<p><a href=\"index.php?action=list&obj=tycat\">Retour à la liste des types / catégoies</a></p>";
					}else */if(!empty($newLiaison)){ ?>
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
				}
				?>
</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->
