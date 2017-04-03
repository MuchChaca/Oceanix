<h1>Récapitulatif de la réservation</h1>
<h3>Liaison 
<?= $_SESSION['laLiaison']->getLePortDep()->getNom()." - ".$_SESSION['laLiaison']->getLePortArr()->getNom();  ?><br>
Traversée n° <?= $traversee->num()." le ".$traversee->dateTraversee()." à ".$traversee->heure(); ?></h3><br>

<fieldset disabled>
	<legend>Réservation enregistrée sous le n°<?= $reservation->num(); ?>:</legend>
	<br>
	<h3>
		<?= $reservation->nom().", ".$reservation->adr()." ".$reservation->ville() ?>
	</h3>
	
	<table>
		<?php
		foreach($finalTab as $key => $value){
			echo "<tr>
				<td>".$key."</td>
				<td>".$value."</td>
			</tr>";
		}
		?>
	<tr>
		<td>Montant total à régler: </td>
		<td><?= $finalCost ?> €</td>
	</tr>
	</table>
</fieldset>