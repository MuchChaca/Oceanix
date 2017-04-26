<section id="porfolio">
<div class="container">
	<div class="col-lg-12 text-center">
		<?php
		echo "<div class=\"row\">
			<div class=\"col-lg-12 text-center\">
				<h1><u>Liaison</u> : ".strtoupper($_SESSION['laLiaison']->getLePortDep()->getNom())." -".
				strtoupper($_SESSION['laLiaison']->getLePortArr()->getNom())."</h1>
			</div>
		</div>";
// echo "<h1><u>Liaison</u> : ".strtoupper($_SESSION['laLiaison']->getLePortDep()->getNom())." -
// ".strtoupper($_SESSION['laLiaison']->getLePortArr()->getNom())."</h1>";
?>
<div class="row">
	<!-- <div class="col-sm-4"> -->
		<form action="?action=listetraversees" method="POST">
			<div class="form-area">
				<div class="simple-form">
					<div class="simple-form-legend"><h5>Date souhaitée : </h5></div>
					<div  class="simple-form-field"><input type="date" name="dateVoulue" required placeholder="jj/mm/aaa" /></div>
				</div>
				<div class="simple-form">
					<div class="simple-form-submit"><input type="submit" name="validerTraversees" value="Liste des traversées" colspan="3"/></div>
				</div>
			</div>
		</form>
	<!-- </div> -->
</div>

	</div>
</div>
</section>
