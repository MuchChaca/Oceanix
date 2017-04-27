<?php

?>
<header>
	<div class="container" id="maincontent">
		<div class="row">
			<?php if(Passerelle::logged()): ?>
				<div class="second-menu">
					<ul>
						<li><div class="dropdown">
							<button class="dropbtn">Liaisons</button>
							<div class="dropdown-content">
								<a href="#">Lister les Liaisons</a>
								<a href="#">Nouvelle Liaison</a>
								<a href="#">Editer des Liaisons</a>
								<a href="#">Effacer des Liaisons</a>
							</div>
						</div></li>
						<li><div class="dropdown">
							<button class="dropbtn">Traversées</button>
							<div class="dropdown-content">
								<a href="#">Lister les Traversées</a>
								<a href="#">Nouvelle Traversée</a>
								<a href="#">Editer une Traversée</a>
								<a href="#">Effacer une Traversée</a>
							</div>
						</div></li>
						<li><div class="dropdown">
							<button class="dropbtn">Catégories</button>
							<div class="dropdown-content">
								<a href="#">Lister les  Categories</a>
								<a href="#">Nouvelle Categorie</a>
								<a href="#">Editer une Categorie</a>
								<a href="#">Effacer une Categorie</a>
							</div>
						</div></li>
					</ul>

				</div>

				<div class="third-menu">
						<ul>
							<li class="god-mod-title"><p>ADMINISTRATEUR</p></li>
						</ul>
				</div>
			<?php endif; ?>

		</div>
	</div>
</header>
