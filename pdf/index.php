<?php
function loadClass($class){
	require_once "../model/".$class.".php";
}
spl_autoload_register("loadClass");

session_start();



if(!empty($_GET['id'])){
	$reserv= new Reservation($_GET['id'], null, null, null, null);
	$reserv->retrieve();
	$allEnr = Enregistrer::getLesEnr($reserv);
	$status="recap-reserv";

	$finalCost = 0;
	$table="";
	foreach($allEnr as $enr){
		$tarif=Tarif::getPrix($reserv->laTraversee()->liaison(), $enr->leTypeCateg(), $reserv->laTraversee());
		$quantite=$enr->quantite();
		$finalCost += $tarif*$quantite;
		$table .= "<tr>
								<td>".$enr->leTypeCateg()->lettreCateg().$enr->leTypeCateg()->numOrdre()."</td>
								<td><a href=\"#\">".$enr->leTypeCateg()->libelle()."</a></td>
								<td class=\"text-right\">".$enr->quantite()."</td>
								<td class=\"text-right\">".$tarif." €</td>
								<td class=\"text-right\">".$tarif*$enr->quantite()." €</td>
							</tr><br>";
	}
}

include_once 'generate_pdf_invoice.php';

?>
