					<?php
					// if(!empty($typCateg)){
					// 	if($result = true)
					// 	echo "<h1> Le type / catégorie: \"".$typCateg->libelle()."\" a été supprimé avec succès !</h1>"
					// 	echo "<p><a href=\"index.php?action=consult_bat\">Retour à la liste des bateaux</a></p>";
					// 	else {
					// 		echo "<h1>ERREUR: Le type / catégorie n'a pas put être supprimé. Veuillez réessayer.</h1>";
					// 	}
					// }
					?>
<section class="portfolio" id="porfolio">
<div class="container">
<div class="col-lg-12 text-center">

	<div class="row">
		<div class="col-lg-12 text-center">
			<h1>Supression effectuée</h1>
		</div>
	</div>
<?php
if(!empty($liaisonCode)){ ?>
	<!-- Confirmation -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>La Liaison &quot;<?= $liaisonCode ?>&quot; a bien été supprimé.</h3>
		</div>
	</div>
	<br>
	<!-- //Msg-Retrou -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<p><a href="index.php?action=liaisons">Retour à la liste des liaisons</a></p>
		</div>
	</div>


<?php
}else if(!empty($bat)){ ?>
	<!-- Confirmation -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Le Bateau &quot;<?= $bat->nomBat() ?>&quot; a bien été supprimé.</h3>
		</div>
	</div>
	<br>
	<!-- //Msg-Retrou -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<p><a href="index.php?adm=true&action=list&obj=boat">Retour à la liste des bateaux</a></p>
		</div>
	</div>
<?php
}else if(!empty($port)){ ?>
	<!-- Confirmation -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Le Port &quot;<?= $port->getNom() ?>&quot; a bien été supprimé.</h3>
		</div>
	</div>
	<br>
	<!-- //Msg-Retrou -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<p><a href="index.php?adm=true&action=list&obj=port">Retour à la liste des ports</a></p>
		</div>
	</div>
<?php
}else if(!empty($trav)){ ?>
	<!-- Confirmation -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>La traversée n°<?= $trav->num() ?> a bien été supprimé.</h3>
		</div>
	</div>
	<br>
	<!-- //Msg-Retrou -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<p><a href="index.php?adm=true&action=list&obj=trav">Retour à la liste des traversées</a></p>
		</div>
	</div>
<?php
}else if(!empty($typeCateg)){ ?>
	<!-- Confirmation -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>La catégorie [<?= $typeCateg->lettreCateg() ?> - <?= $typeCateg->numOrdre() ?>]
				&quot;<?= $typeCateg->libelle() ?>&quot; a bien été supprimé.</h3>
		</div>
	</div>
	<br>
	<!-- //Msg-Retrou -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<p><a href="index.php?adm=true&action=list&obj=tycat">Retour à la liste des catégories</a></p>
		</div>
	</div>
<?php
}else if(!empty($reserv)){ ?>
	<!-- Confirmation -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>La réservation n° <?= $reserv->num() ?> a bien été supprimé.</h3>
		</div>
	</div>
	<br>
	<!-- //Msg-Retrou -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<p><a href="index.php?adm=true&action=list&obj=rese">Retour à la liste des réservations</a></p>
		</div>
	</div>
<?php
}else if(!empty($tarif)){ ?>
	<!-- Confirmation -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Le tarif pour la liaison &quot;<?= $tarif->liaison()->getCode() ?>&quot; de
				la catégorie &quot;<?= $tarif->typeCateg()->libelle() ?>&quot; pour
				le <?= $tarif->affiDate() ?> a bien été supprimé.</h3>
		</div>
	</div>
	<br>
	<!-- //Msg-Retrou -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<p><a href="index.php?adm=true&action=list&obj=tari">Retour à la liste des tarifs</a></p>
		</div>
	</div>
<?php
}else{
	Header('Location: index.php?action=404');
}
?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->
