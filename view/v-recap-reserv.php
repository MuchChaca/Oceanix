<?php
// (c) Xavier Nicolay
// Exemple de g�n�ration de devis/facture PDF

require('fpdf/invoice.php');

$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "Océanix",
                  "8 rue Petite Fusterie\n" .
                  "29200 BREST\n".
                  "Capital : 18000 " . EURO );
$pdf->fact_dev( "Devis ", $reserv->num() );
$pdf->temporaire( "Devis temporaire" );
$pdf->addDate(date('d/m/Y'));
$pdf->addClient($reserv->nom());
$pdf->addPageNumber("1");
$pdf->addClientAdresse($reserv->adr()."\n".$reserv->cp()." ".$reserv->ville());
$cols=array( "REFERENCE"    => 23,
             "DESIGNATION"  => 78,
             "QUANTITE"     => 22,
             "P.U. HT"      => 26,
             "MONTANT H.T." => 30,
             "TVA"          => 11 );
$pdf->addCols( $cols);
$cols=array( "REFERENCE"    => "L",
"DESIGNATION"  => "L",
"QUANTITE"     => "C",
"P.U. HT"      => "R",
"MONTANT H.T." => "R",
"TVA"          => "C" );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);
$y    = 109;
foreach($allEnr as $enr){
	$tarif=Tarif::getPrix($reserv->laTraversee()->liaison(), $enr->leTypeCateg(), $reserv->laTraversee());
	$quantite=$enr->quantite();
	$line = array( "REFERENCE"    => $enr->leTypeCateg()->lettreCateg().$enr->leTypeCateg()->numOrdre(),
	"DESIGNATION"  => $enr->leTypeCateg()->libelle(),
	"QUANTITE"     => $quantite,
	"P.U. HT"      => $tarif,
	"MONTANT H.T." => $tarif*$quantite,
	"TVA"          => "1" );
	$size = $pdf->addLine( $y, $line );
	$y   += $size + 2;

}


$pdf->addCadreTVAs();

// invoice = array( "px_unit" => value,
//                  "qte"     => qte,
//                  "tva"     => code_tva );
// tab_tva = array( "1"       => 19.6,
//                  "2"       => 5.5, ... );
// params  = array( "RemiseGlobale" => [0|1],
//                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
//                      "remise"         => value,     // {montant de la remise}
//                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
//                  "FraisPort"     => [0|1],
//                      "portTTC"        => value,     // montant des frais de ports TTC
//                                                     // par defaut la TVA = 19.6 %
//                      "portHT"         => value,     // montant des frais de ports HT
//                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
//                  "AccompteExige" => [0|1],
//                      "accompte"         => value    // montant de l'acompte (TTC)
//                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
//                  "Remarque" => "texte"              // texte
// $tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
//                     array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
$tot_prods = array();
foreach($allEnr as $enr){
	$tarif=Tarif::getPrix($reserv->laTraversee()->liaison(), $enr->leTypeCateg(), $reserv->laTraversee());
	$tot_prods[]=[
		"px_unit" => $tarif,
		"qte" => $enr->quantite(),
		"tva" => 1
	];
}
$tab_tva = array( "1"       => 0,
                  "2"       => 5.5);
$params  = array( "RemiseGlobale" => 1,
                      "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
                      "remise"         => 0,       // {montant de la remise}
                      "remise_percent" => 0,      // {pourcentage de remise sur ce montant de TVA}
                  "FraisPort"     => 1,
                      "portTTC"        => 0,      // montant des frais de ports TTC
                                                   // par defaut la TVA = 19.6 %
                      "portHT"         => 0,       // montant des frais de ports HT
                      "portTVA"        => 0,    // valeur de la TVA a appliquer sur le montant HT
                  "AccompteExige" => 0,
                      "accompte"         => 0,     // montant de l'acompte (TTC)
                      "accompte_percent" => 0,    // pourcentage d'acompte (TTC)
                  "Remarque" => "Sans acompte" );

$pdf->addTVAs( $params, $tab_tva, $tot_prods);
$pdf->addCadreEurosFrancs();
$pdf->Output();
?>
