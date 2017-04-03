<?php
echo "<h1><u>Liaison</u> : ".strtoupper($_SESSION['laLiaison']->getLePortDep()->getNom())." -
	  ".strtoupper($_SESSION['laLiaison']->getLePortArr()->getNom())."</h1>";
echo "<h1><u>Liste des traversées du</u> : ".$_POST['dateVoulue']."</h1>";
echo "<div=\"\">";
echo "<table>
	<tr>
		<th>Numéro</th>
		<th>Heure</th>
		<th>Bateau</th>
		<th></th>
	</tr>";
	foreach($traversees as $laTraversee){
		echo "<tr>
			<td>".$laTraversee->num()."</td>
			<td>".$laTraversee->heure()."</td>
			<td>".$laTraversee->bateau()->id()."</td>
			<td><a href=?action=choixtraversees&numTrav=".$laTraversee->num().">Réserver</a></td>
		</tr>";
	}
echo"</table>";
echo "</div>";
?>