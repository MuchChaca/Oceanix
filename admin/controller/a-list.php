<?php
if(!empty($_GET['adm']) && !empty($_GET['adm'])==true && !empty($_GET['obj']) && Passerelle::logged()){
	switch ($_GET['obj']){
		//=> TypeCategory
		case 'tycat':
			$listTypCateg= TypeCateg::findAll();
			$status= "list";
			break;

		//=> For a Bateaux
		case 'boat':
			if(!empty($_GET['page'])){
				$page=$_GET['page'];
			}else{
				$page=0;
			}
			$list = Passerelle::splitTable(Bateau::findAll(), 10);
			$listBat = $list[$page];

			if(!empty($list[$page+1])){
				$nextPage=$page + 1;
			}else{
				$nextPage=-1;
			}
			if($page-1 >= 0){
				$prevPage=$page - 1;
			}else{
				$prevPage=-1;
			}
			$status="list";
			break;

		//=> For a Port
		case 'port':
			$listPort= Port::findAll();
			$status= "list";
			break;

		//=> For Traversées
		case 'trav':
			if(!empty($_GET['page'])){
				$page=$_GET['page'];
			}else{
				$page=0;
			}
			$list = Passerelle::splitTable(Traversee::findAll(), 10);
			$listTrav = $list[$page];

			if(!empty($list[$page+1])){
				$nextPage=$page + 1;
			}else{
				$nextPage=-1;
			}
			if($page-1 >= 0){
				$prevPage=$page - 1;
			}else{
				$prevPage=-1;
			}
			$status="list";
			break;

		default:
			$status="404";
	}

}else{
	$status="404";
}
?>
