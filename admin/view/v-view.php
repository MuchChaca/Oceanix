<?php if(Passerelle::logged()){ ?>
<section id="porfolio">
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
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td><?= $liaison->getLePortDep()->getId() ?></td>
											<td><?= $liaison->getLePortDep()->getNom() ?></td>
											<td><a href="index.php?adm=true&action=mod&obj=port&id=<?= $liaison->getLePortDep()->getId() ?>">
												<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
											</a></td>
											<td><a href="index.php?adm=true&action=del&obj=port&id=<?= $liaison->getLePortDep()->getId() ?>">
												<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
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
										<th colspan="4"><h5>Port d'arrivé</h5></th>
									</tr>
									<tr>
										<th>ID</th>
										<th>Nom</th>
										<th class="admin" colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td><?= $liaison->getLePortArr()->getId() ?></td>
											<td><?= $liaison->getLePortArr()->getNom() ?></td>
											<td><a href="index.php?adm=true&action=mod&obj=port&id=<?= $liaison->getLePortArr()->getId() ?>">
												<i class="fa fa fa-pencil" aria-hidden="true" alt="Modifier" title="Modifier"></i>
											</a></td>
											<td><a href="index.php?adm=true&action=del&obj=port&id=<?= $liaison->getLePortArr()->getId() ?>">
												<i class="fa fa-trash" aria-hidden="true" alt="Supprimer" title="Supprimer"></i>
											</a></td>
										</tr>
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
