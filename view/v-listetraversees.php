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

		echo "<div=\"\">";
		echo "<table>
		<thead>
			<tr>
				<th>Numéro</th>
				<th>Heure</th>
				<th colspan=\"1\">Bateau</th>
				<th></th>
			</tr>
		</thead>";
		echo "<tbody>";
			foreach($traversees as $laTraversee){
				echo "<tr>
				<td>".$laTraversee->num()."</td>
				<td>".$laTraversee->heure()."</td>
				<td>".$laTraversee->bateau()->id()."</td>
				<td><a href=?action=choixtraversees&numTrav=".$laTraversee->num().">Réserver</a></td>
				</tr>";
			}
			echo"</tbody>
		</table>";
		echo "</div>";
		?>
	</div>
</div>

	</div>
</div>
