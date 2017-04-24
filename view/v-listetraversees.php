<div class="container">
	<div class="col-lg-12 text-center">

<div class="row">
	<div class="col-lg-12 text-center">
		<?php
		echo "<h1><u>Liaison</u> : ".strtoupper($_SESSION['laLiaison']->getLePortDep()->getNom())." -
			  ".strtoupper($_SESSION['laLiaison']->getLePortArr()->getNom())."</h1>";
		echo "<h3><u>Liste des traversées du</u> : ".$_POST['dateVoulue']."</h3>";
		?>
	</div>
</div><br>
<div class="row">
	<div class="col-sm-4 portfolio-item">
		<?php

		echo "<div class=\"display-table\">";
		echo "<table>
		<thead>
			<tr>
				<th>Numéro</th>
				<th>Heure</th>
				<th colspan=\"2\">Bateau</th>";
				if(Passerelle::logged()){
					echo "<th class=\"admin\" colspan=\"3\">Action</th>";
				}
			echo"</tr>
		</thead>";
		echo "<tbody>";
			foreach($traversees as $laTraversee){
				echo "<tr>
				<td>".$laTraversee->num()."</td>
				<td>".$laTraversee->heure()."</td>
				<td>".$laTraversee->bateau()->id()."</td>
				<td><a href=?action=choixtraversees&numTrav=".$laTraversee->num().">Réserver</a></td>";
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
			echo"</tbody>
		</table>";
		echo "</div>";
		?>
	</div>
</div>

	</div>
</div>
