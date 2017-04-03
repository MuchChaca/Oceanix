<h1>Réservation</h1>
<h3>Liaison 
<?= $_SESSION['laLiaison']->getLePortDep()->getNom()." - ".$_SESSION['laLiaison']->getLePortArr()->getNom();  ?><br>
Traversée n° <?= $laTraversee->num()." le ".$laTraversee->dateTraversee()." à ".$laTraversee->heure(); ?></h3><br>

<fieldset>
	<legend>Saisir les informations relatives à la réservation: </legend>
	<form method="POST" action="?action=traiterreservation&info=<?= $_GET['numTrav']; ?>">
		<table>
			<tr>
				<td>Nom: *</td>
				<td colspan="3"><input type="text" name="name" required autofocus /></td>
			</tr>
			<tr>
				<td>Adresse: *</td>
				<td colspan="3"><input type="text" name="adress" required /></td>
			</tr>
			<tr>
				<td>Code postal: * </td>
				<td><input type="text" name="cp" required style="width:75px;" /></td>
				<td>Ville: * </td>
				<td><input type="text" name="city" required style="width:130px;" /></td>
			</tr>
		</table>
	
	
		<table>
			<tr>
				<th></th>
				<th>Tarif en €</th>
				<th>Quantité</th>
			</tr>
			<?php
				foreach($typeCategs as $aTypeCateg){
					echo "<tr>";
				////--> LIBELLE
						echo "<td>".$aTypeCateg->libelle()."</td>";
				////--> TARIF  (((On peut a la place créer un tab assoc ds le controlleur et ensuite utiliser celui-ci ici)))
						echo "<td>".Tarif::getPrix($_SESSION['laLiaison'], $aTypeCateg, $laTraversee)."</td>";
				////--> QUANTITE
						echo "<td><input style=\"width:65px;\" type=\"number\" name=\"".$aTypeCateg->lettreCateg()."-".$aTypeCateg->numOrdre()."\" maxlength=\"5\" min=\"0\"/></td>";
					echo "</tr>";
					
				}
			?>
			<tr>
				<td colspan="3"><input type="submit" value="Enregistrer la Réservation" name="reserver" /></td>
			</tr>
		</table>
	</form>
</fieldset>