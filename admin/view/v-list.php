<?php if(Passerelle::logged()){ ?>
<section class="portfolio" id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

					<?php
						if(!empty($listTypCateg)){ //LIST OF TYPECATEG ?>
							<div class="row">
								<div class="col-lg-12 text-center">
									<h1>Liste des catégories</h1>
								</div>
							</div>

							<div class="col-md-3 col-md-offset-3">
								<div class="display-table">
									<table>
										<thead>
												<th>Lettre</th>
												<th>Numéro</th>
												<th>Libellé</th>
												<th class="admin" colspan="2">Action</th>
											</tr>
										</thead>
										<tboby>
											<?php foreach($listTypCateg as $typCateg): ?>
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
											<?php endforeach; ?>
										</tboby>
									</table>

								</div>
							</div><!-- //LIST-TYPECATEG -->
							<?php
						}else if(!empty($listBat)){ //LIST OF THE BOATS ?>
							<div class="row">
								<div class="col-lg-12 text-center">
									<h1>Liste des Bateaux</h1>
								</div>
							</div>

							<div class="col-md-3 col-md-offset-3">
								<div class="display-table">
									<table>
										<thead>
												<th>ID</th>
												<th>Nom</th>
												<th class="admin" colspan="2">Action</th>
											</tr>
										</thead>
										<tboby>
											<?php foreach($listBat as $bat): ?>
												<tr>
													<td><?= $bat->idBat() ?></td>
													<td><?= $bat->nomBat() ?></td>
													<td><a href="index.php?adm=true&action=mod&obj=boat&id=<?= $bat->idBat() ?>">
														<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
													</a></td>
													<td><a href="index.php?adm=true&action=del&obj=boat&id=<?= $bat->idBat() ?>">
														<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
													</a></td>
												</tr>
											<?php endforeach; ?>
										</tboby>
										<tfoot>
											<tr>
												<td colspan="2" style="text-align: left;">
													<?php
													if($prevPage >= 0){
														echo "<a href=\"index.php?adm=true&action=list&obj=boat&page=".$prevPage."\">&lt;&lt; Précédent</a>";
													}else{
														echo "&lt;&lt; Précédent";
													}
													?>
												</td>
												<td colspan="2" style="text-align: right;">
													<?php
													if($nextPage >= 0){
														echo "<a href=\"index.php?adm=true&action=list&obj=boat&page=".$nextPage."\">Suivant &gt;&gt;</a>";
													}else{
														echo "Suivant &gt;&gt;";
													}
													?>
												</td>
											</tr>
										</tfoot>
									</table>

								</div>
							</div>
						<?php
					}else if(!empty($listPort)){ //LIST OF THE PORTS ?>
						<div class="row">
							<div class="col-lg-12 text-center">
								<h1>Liste des Ports</h1>
							</div>
						</div>

						<div class="col-md-3 col-md-offset-3">
							<div class="display-table">
								<table>
									<thead>
											<th>ID</th>
											<th>Nom</th>
											<th class="admin" colspan="2">Action</th>
										</tr>
									</thead>
									<tboby>
										<?php foreach($listPort as $port): ?>
											<tr>
												<td><?= $port->getId() ?></td>
												<td><?= $port->getNom() ?></td>
												<td><a href="index.php?adm=true&action=mod&obj=port&id=<?= $port->getId() ?>">
													<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
												</a></td>
												<td><a href="index.php?adm=true&action=del&obj=port&id=<?= $port->getId() ?>">
													<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
												</a></td>
											</tr>
										<?php endforeach; ?>
									</tboby>
								</table>

							</div>
						</div><!-- //LIST-PORTS -->
					<?php
				}else if(!empty($listTrav)){ //LIST OF THE TRAVERSEES ?>
						<div class="row">
							<div class="col-lg-12 text-center">
								<h1>Liste des traversées</h1>
							</div>
						</div>

						<div class="col-md-3 col-md-offset-3">
							<div class="display-table">
								<table>
									<thead>
											<th>Numéro</th>
											<th>Date traversée</th>
											<th>Heure</th>
											<th colspan="3">Bateau</th>
											<th></th>
											<th></th>
											<th>Code Liaison</th>
											<th class="admin" colspan="2">Action</th>
										</tr>
									</thead>
									<tboby>
										<?php foreach($listTrav as $trav): ?>
											<tr>
												<td><?= $trav->num() ?></td>
												<td><?= $trav->dateTraversee() ?></td>
												<td><?= $trav->heure() ?></td>
												<td colspan="3"><?= $trav->bateau()->nomBat() ?></td>
												<td></td>
												<td></td>
												<td><?= $trav->liaison()->getCode() ?></td>
												<td><a href="index.php?adm=true&action=mod&obj=trav&id=<?= $trav->num() ?>">
													<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
												</a></td>
												<td><a href="index.php?adm=true&action=del&obj=trav&id=<?= $trav->num() ?>">
													<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
												</a></td>
											</tr>
										<?php endforeach; ?>
									</tboby>
									<tfoot>
										<tr>
											<td colspan="4" style="text-align: left;">
												<?php
												if($prevPage >= 0){
													echo "<a href=\"index.php?adm=true&action=list&obj=trav&page=".$prevPage."\">&lt;&lt; Précédent</a>";
												}else{
													echo "&lt;&lt; Précédent";
												}
												?>
											</td>
											<td></td>
											<td></td>
											<td colspan="4" style="text-align: right;">
												<?php
												if($nextPage >= 0){
													echo "<a href=\"index.php?adm=true&action=list&obj=trav&page=".$nextPage."\">Suivant &gt;&gt;</a>";
												}else{
													echo "Suivant &gt;&gt;";
												}
												?>
											</td>
										</tr>
									</tfoot>
								</table>

							</div>
						</div>
					<?php
				}else if(!empty($listReserv)){ //LIST OF THE RESERVATIONS ?>
						<div class="row">
							<div class="col-lg-12 text-center">
								<h1>Liste des Réservations</h1>
							</div>
						</div>

						<div class="col-md-3 col-md-offset-3">
							<div class="display-table">
								<table>
									<thead>
										<tr>
											<th>Numéro</th>
											<th>Nom</th>
											<th class="admin" colspan="3">Action</th>
										</tr>
									</thead>
									<tboby>
										<?php foreach($listReserv as $reserv):?>
											<tr>
												<td><?= $reserv->num() ?></td>
												<td><?= $reserv->nom() ?></td>
												<td><a href="index.php?adm=true&action=view&obj=rese&id=<?= $reserv->num() ?>">
													<i class="fa fa-eye" aria-hidden="true" alt="Voir" title="Voir"></i>
												</a></td>
												<td><a href="index.php?adm=true&action=mod&obj=rese&id=<?= $reserv->num() ?>">
													<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
												</a></td>
												<td><a href="index.php?adm=true&action=del&obj=rese&id=<?= $reserv->num() ?>">
													<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
												</a></td>
											</tr>
										<?php endforeach; ?>
									</tboby>
									<tfoot>
										<tr>
											<td colspan="3" style="text-align: left;">
												<?php
												if($prevPage >= 0){
													echo "<a href=\"index.php?adm=true&action=list&obj=rese&page=".$prevPage."\">&lt;&lt; Précédent</a>";
												}else{
													echo "&lt;&lt; Précédent";
												}
												?>
											</td>
											<td></td>
											<td colspan="2" style="text-align: right;">
												<?php
												if($nextPage >= 0){
													echo "<a href=\"index.php?adm=true&action=list&obj=rese&page=".$nextPage."\">Suivant &gt;&gt;</a>";
												}else{
													echo "Suivant &gt;&gt;";
												}
												?>
											</td>
										</tr>
									</tfoot>
								</table>

							</div>
						</div><!-- //LIST-PORTS -->
					<?php
				}else{
					Header('Location: /index.php?action=valid_connexion');
				}
					?>


</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //portfolio -->
<?php
}else{ Header('Location: /index.php?action=valid_connexion');}
?>
