<?php if(Passerelle::logged()){ ?>
<section id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

					<?php
						if(!empty($listTypCateg)){
							echo "<h1> Liste des types / catégories :</h1>
							<table>
								<tr>
									<th>Lettre</th>
									<th>Numéro</th>
									<th>Nom</th>
									<th>Action</th>
								</tr>";
							foreach($listTypCateg as $typCateg){
								echo "<tr>
									<td>".$typCateg->lettreCateg()."</td>
									<td>".$typCateg->numOrdre()."</td>
									<td>".$typCateg->libelle()."</td>
									<td class='tabAction'><a href='index.php?action=del&obj=tycat&l=".$typCateg->lettreCateg()."&n=".$typCateg->numOrdre()."'><i class='fa fa-trash' aria-hidden='true'></i></a>
										<a href='index.php?action=mod&obj=tycat&l=".$typCateg->lettreCateg()."&n=".$typCateg->numOrdre()."'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
								</tr>";
							}
							echo "</table>";
						}else if(!empty($listBat)){ //LIST OF THE BOATS ?>
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
									</table>
								</div>
							</div>
						<?php
						}
					?>


</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //portfolio -->
<?php
}else{ Header('Locate: /index.php?action=valid_connexion');}
?>
