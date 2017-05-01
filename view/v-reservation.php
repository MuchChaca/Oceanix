<section class="portfolio" id="portfolio">
<div class="container">
	<div class="col-lg-12 text-center">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1>Réservation</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<h3>Liaison
					<?= $_SESSION['laLiaison']->getLePortDep()->getNom()." - ".$_SESSION['laLiaison']->getLePortArr()->getNom();  ?><br>
					Traversée n° <?= $laTraversee->num()." le ".$laTraversee->dateTraversee()." à ".$laTraversee->heure(); ?></h3><br>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-lg-12 text-center">
					<h6>Saisir les informations relatives à la réservation: </h6>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
			<form method="POST" action="?action=traiterreservation&info=<?= $_GET['numTrav']; ?>">

		<div class="row">
			<div class="display-table">
		<table>
			<div class="form-area">
				<div class="simple-form">
					<div class="simple-form-legend form-left"><h5>Nom: *</h5></div>
					<div  class="simple-form-field form-left"><input type="text" name="name" required /></div>
				</div>
				<div class="simple-form">
					<div class="simple-form-legend form-left"><h5>Adresse: *</h5></div>
					<div  class="simple-form-field form-left"><input type="text" name="adress" required /></div>
				</div>
				<div class="simple-form easy-form">
					<div class="simple-form-legend form-left"><h5>Code postal: * </h5></div>
					<div  class="simple-form-field form-left"><input type="text" name="cp" required /></div>
				</div>
				<div class="simple-form">
					<div class="simple-form-legend form-left"><h5>Ville: * </h5></div>
					<div  class="simple-form-field form-left"><input type="text" name="city" required /></div>
				</div>
			</div>
		</table>
	</div>
	</div>

				</div>
		</div>
	</div>
	</div>

</section>
	<section class="success" id="about">
		<div class="container">
			<div class="row">
	<div class="display-table">
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Tarif en €</th>
					<th>Quantité</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($typeCategs as $aTypeCateg){
						echo "<tr>";
					////--> LIBELLE
							echo "<td>".$aTypeCateg->libelle()."</td>";
					////--> TARIF  (((On peut a la place créer un tab assoc ds le controlleur et ensuite utiliser celui-ci ici)))
							echo "<td>".Tarif::getPrix($_SESSION['laLiaison'], $aTypeCateg, $laTraversee)."</td>";
					////--> QUANTITE
							echo "<td><input style=\"width:65px;\" type=\"number\" name=\"".$aTypeCateg->lettreCateg()."-".$aTypeCateg->numOrdre()."\" maxlength=\"5\" min=\"0\" /></td>";
						echo "</tr>";

					}
				?>
				<tr>
					<td colspan="3"><input type="submit" value="Enregistrer la Réservation" name="reserver" /></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</form>
</div>
</section>
