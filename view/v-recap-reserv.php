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
foreach($finalTab as $key => $value){
	$y    = 109;
	$line = array( "REFERENCE"    => $value[1],
	"DESIGNATION"  => $key,
	"QUANTITE"     => $tab[0],
	"P.U. HT"      => $tab[2],
	"MONTANT H.T." => $tab[3],
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
$tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                    array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
$tab_tva = array( "1"       => 19.6,
                  "2"       => 5.5);
$params  = array( "RemiseGlobale" => 1,
                      "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
                      "remise"         => 0,       // {montant de la remise}
                      "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
                  "FraisPort"     => 1,
                      "portTTC"        => 10,      // montant des frais de ports TTC
                                                   // par defaut la TVA = 19.6 %
                      "portHT"         => 0,       // montant des frais de ports HT
                      "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
                  "AccompteExige" => 1,
                      "accompte"         => 0,     // montant de l'acompte (TTC)
                      "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
                  "Remarque" => "Avec un acompte, svp..." );

$pdf->addTVAs( $params, $tab_tva, $tot_prods);
$pdf->addCadreEurosFrancs();
$pdf->Output();
?>
