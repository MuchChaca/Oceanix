<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Liste de nos liaisons</h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-4 portfolio-item">
		<table>
			<tr>
				<th>Port de départ</th>
				<th>Port d'arrivée</th>
			</tr>
			<?php
			//print_r($lesLiaisons);
			foreach($lesLiaisons as $aLiaison){
				//print_r($aLiaison);
				echo "<tr>
					<td>".$aLiaison->getLePortDep()->getNom()."</td>
					<td>".$aLiaison->getLePortArr()->getNom()."</td>
					<td><a href=\"?action=afftraversees&trav=".$aLiaison->getCode()."\">Afficher les traversées</a></td>
				</tr>";
			}
			?>
		</table>
	</div>
</div>
