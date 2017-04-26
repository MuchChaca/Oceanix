<section id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

	<div class="row">
		<div class="col-lg-12 text-center">
			<h1>Récapitulatif de la réservation</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Liaison
				<?= $_SESSION['laLiaison']->getLePortDep()->getNom()." - ".$_SESSION['laLiaison']->getLePortArr()->getNom();  ?><br>
				Traversée n° <?= $traversee->num()." le ".$traversee->dateTraversee()." à ".$traversee->heure(); ?></h3><br>

		</div>
	</div>

<div class="row">
<!-- <div class="col-sm-4 portfolio-item"> -->
	<div class="col-lg-12 text-center">
	</div>

	<br>
	<h3>
	</h3>
<div class="display-table">
	<table>
		<thead>
			<tr>
				<th colspan="2"><h6>Réservation enregistrée sous le n°<?= $reservation->num(); ?>:</h6></th>
			</tr>
			<tr>
				<th colspan="2"><?= $reservation->nom().", ".$reservation->adr()." ".$reservation->ville() ?></th>
			</tr>

		</thead>

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

</div>
</div>

<!-- </div> -->
</div>
</section>
