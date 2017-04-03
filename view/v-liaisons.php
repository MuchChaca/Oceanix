
		<h1>Liste de nos liaisons</h1>

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

