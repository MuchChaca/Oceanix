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
								<a href="?action=liaisons">Lister les Liaisons</a>
								<a href="?adm=true&action=new&obj=liai">Nouvelle Liaison</a>
							</div>
						</div></li>
						<li><div class="dropdown">
							<button class="dropbtn">Traversées</button>
							<div class="dropdown-content">
								<a href="?adm=true&action=list&obj=trav">Lister les Traversées</a>
								<a href="?adm=true&action=new&obj=trav">Nouvelle Traversée</a>
							</div>
						</div></li>
						<li><div class="dropdown">
							<button class="dropbtn">Catégories</button>
							<div class="dropdown-content">
								<a href="?adm=true&action=list&obj=tycat">Lister les  Categories</a>
								<a href="?adm=true&action=new&obj=tycat">Nouvelle Categorie</a>
							</div>
						</div></li>
						<li><div class="dropdown">
							<button class="dropbtn">Bateaux</button>
							<div class="dropdown-content">
								<a href="?adm=true&action=list&obj=boat">Lister les Bateaux</a>
								<a href="?adm=true&action=new&obj=boat">Nouveau Bateau</a>
							</div>
						</div></li>
						<li><div class="dropdown">
							<button class="dropbtn">Ports</button>
							<div class="dropdown-content">
								<a href="?adm=true&action=list&obj=port">Lister les Ports</a>
								<a href="?adm=true&action=new&obj=port">Nouveau Port</a>
							</div>
						</div></li>
						<li><div class="dropdown">
							<button class="dropbtn">Tarifs</button>
							<div class="dropdown-content">
								<a href="?adm=true&action=list&obj=tari">Lister les Tarifs</a>
								<a href="?adm=true&action=new&obj=tari">Nouveau Tarif</a>
							</div>
						</div></li>

						<li><div class="dropdown">
							<button class="dropbtn">Réservations</button>
							<div class="dropdown-content">
								<a href="?adm=true&action=list&obj=rese">Lister les Réservations</a>
								<a href="?adm=true&action=new&obj=rese">Nouvelle Réservation</a>
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
