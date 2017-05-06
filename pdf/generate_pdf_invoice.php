<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php");

// PUT YOUR HTML IN A VARIABLE
$my_html="<html lang=\"fr\">
  <head>
    <meta charset=\"UTF-8\">
    <title>Devis Temporaire</title>
		<link rel=\"icon\" href=\"favicon.png\">
    <link rel=\"stylesheet\" href=\"http://phptopdf.com/bootstrap.css\">
    <style>
      @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
      body, h1, h2, h3, h4, h5, h6{
      font-family: 'Bree Serif', serif;
      }
    </style>
  </head>

  <body>
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-xs-6\">
          <h1>
            <a href=\"http://oceanix.rf.gd\">
						Océanix
            </a>
          </h1>
        </div>
        <div class=\"col-xs-6 text-right\">
          <h1>DEVIS TEMPORAIRE</h1>
          <h1><small>Réservation n° ".$reserv->num()."</small></h1>
        </div>
      </div>
      <div class=\"row\">
        <div class=\"col-xs-5\">
          <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
              <h4>De: <a href=\"#\">Océanix</a></h4>
            </div>
            <div class=\"panel-body\">
              <p>
                8 rue Petite Fusterie <br>
                29200 BREST, France <br>
              </p>
            </div>
          </div>
        </div>
        <div class=\"col-xs-5 col-xs-offset-2 text-right\">
          <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
              <h4>Pour : <a href=\"#\">".$reserv->nom()."</a></h4>
            </div>
            <div class=\"panel-body\">
              <p>
                ".$reserv->adr()." <br>
                ".$reserv->cp()." ".$reserv->ville()." <br>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- / end client details section -->
      <table class=\"table table-bordered\">
        <thead>
          <tr>
            <th>
              <h4>Référence</h4>
            </th>
            <th>
              <h4>Description</h4>
            </th>
            <th>
              <h4>Quantité</h4>
            </th>
            <th>
              <h4>Prix</h4>
            </th>
            <th>
              <h4>Sous-total</h4>
            </th>
          </tr>
        </thead>
        <tbody>
				".$table."
        </tbody>
      </table>
      <div class=\"row text-right\">
        <div class=\"col-xs-2 col-xs-offset-8\">
          <p>
            <strong>
            Sous-Total : <br>
            TAXE : <br>
            Total : <br>
            </strong>
          </p>
        </div>
        <div class=\"col-xs-2\">
          <strong>
          ".$finalCost." € <br>
          N/A <br>
          ".$finalCost." € <br>
          </strong>
        </div>
      </div>
      <div class=\"row\">
        <div class=\"col-xs-5\">
          <div class=\"panel panel-info\">
            <div class=\"panel-heading\">
              <h4>Bank details</h4>
            </div>
            <div class=\"panel-body\">
              <p>Océanix</p>
              <p>Banque Maritime de France</p>
            </div>
          </div>
        </div>
        <div class=\"col-xs-7\">
          <div class=\"span7\">
            <div class=\"panel panel-info\">
              <div class=\"panel-heading\">
                <h4>Contact Details</h4>
              </div>
              <div class=\"panel-body\">
                <p>
                  Email : oceanix@example.com <br><br>
								<a href=\"http://oceanix.rf.gd\" target=\"_blank\">http://oceanix.rf.gd/</a>
                  Site web : http://oceanix.rf.gd/ <br><br><br>
                </p>
                <h4>Le payement peut se faire sur place, en liquide, par chèque ou par carte.</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      Ceci est un devis temporaire.
    </div>
  </body>
</html>";

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'view',
  "save_directory" => '',
	"ommit_images" => "no",
  "file_name" => 'pdf_invoice.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='pdf_invoice.pdf'>Download Your PDF</a>");
?>
