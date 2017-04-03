
	<?php
		
		if(!empty($info)){		//il y a une info sur l'erreur
			switch($info){
				case "date":
					$typeErr = "sur la date";
					break;
				case "numTrav":
					$typeErr = "sur la traversée";
					break;
				case "404":
					$typeErr = "404 ERROR: PAGE NOT FOUND";
					break;
				default:
					$typeErr="";
					break;
			}
		}
		echo "<h1>ERROR:";
		//affichage du type d'erreur
		echo " ".$typeErr.".";
	?>
</h1>
