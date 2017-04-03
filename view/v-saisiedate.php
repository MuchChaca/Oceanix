
<?php
echo "<h1><u>Liaison</u> : ".strtoupper($_SESSION['laLiaison']->getLePortDep()->getNom())." -
".strtoupper($_SESSION['laLiaison']->getLePortArr()->getNom())."</h1>";
?>
<form action="?action=listetraversees" method="POST">
	<table>
		<tr>
			<td>Date souhaitée : </td>
			<td><input type="date" name="dateVoulue" required placeholder="jj/mm/aaa"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="validerTraversees" value="Liste des traversées"</td>
		</tr>
	</table>
</form>
	