					<?php
					// if(!empty($bat)){
					// 	if($result = true)
					// 	echo "<h1> Le bateau: \"".$bat->nomBat()."\" a été supprimé avec succès !</h1>";
					// 	echo "<p><a href=\"index.php?action=consult_bat\">Retour à la liste des bateaux</a></p>";
					// 	else {
					// 		echo "<h1>ERREUR: Le Bateau n'a pas put être supprimé. Veuillez réessayer.</h1>";
					// 	}
					// }else if(!empty($typCateg)){
					// 	if($result = true)
					// 	echo "<h1> Le type / catégorie: \"".$typCateg->libelle()."\" a été supprimé avec succès !</h1>"
					// 	echo "<p><a href=\"index.php?action=consult_bat\">Retour à la liste des bateaux</a></p>";
					// 	else {
					// 		echo "<h1>ERREUR: Le type / catégorie n'a pas put être supprimé. Veuillez réessayer.</h1>";
					// 	}
					// }
					?>
<section id="porfolio">
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
}
?>

</div> <!-- //text-center -->
</div> <!-- //container -->
</section> <!-- //#portfolio -->
