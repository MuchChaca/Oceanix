<div class="container">
		<div class="col-lg-12 text-center">

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Liste de nos liaisons</h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-4 portfolio-item">
		<div class="display-table">
			<table>
				<thead>
					<tr>
						<th>Port de départ</th>
						<th colspan="2">Port d'arrivée</th>
						<?php if(Passerelle::logged()): ?>
							<th class="admin" colspan="3">Action</th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php
					//print_r($lesLiaisons);
					foreach($lesLiaisons as $aLiaison){
						//print_r($aLiaison);
						echo "<tr>
							<td>".$aLiaison->getLePortDep()->getNom()."</td>
							<td>".$aLiaison->getLePortArr()->getNom()."</td>
							<td><a href=\"?action=afftraversees&trav=".$aLiaison->getCode()."\">Afficher les traversées</a></td>";
							if(Passerelle::logged()):
								echo
								"<td><a href=\"index.php?action=\">
									<i class=\"fa fa-eye\" aria-hidden=\"true\" alt=\"Voir\" title=\"Voir\"></i>
								</a></td>
								<td><a href=\"index.php?action=\">
									<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\" alt=\"Modifier\" title=\"Modifier\"></i>
								</a></td>
								<td><a href=\"index.php?action=\">
									<i class=\"fa fa-trash\" aria-hidden=\"true\" alt=\"Supprimer\" title=\"Supprimer\"></i>
								</a></td>";
							endif;
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
</div>
