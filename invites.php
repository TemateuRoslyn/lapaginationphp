<?php include('fichier pagination.php') ?>


<!DOCTYPE html>
<html>
<head>
	<title>Réunion Familiale</title>
	<style type="text/css">
	body
	{
		background-color: black;
	}
		#data, section
		{
		width: 98%;
		border-radius: 10px;
		background-color: deepskyblue;
		padding: 10px;
		margin: 0 auto;
		}
		section
		{
		background-color: #f1f1f1;
		text-align: center;
		font-size: 30px;
		font-style: italic;
		}
		#precedent, #suivant, #numero
		{
		background-color: #f1f1f1;
		text-align: center;
		width: 15%;
		float: left;
		padding: 10px;
		border-radius: 5px;
		}
		#precedent{
		margin-left: 27%;
		}
		#numero
		{
		width: 8%;
		background-color: white;	
		}
		table
		{
			width: 100%;
			background-color: white;
			border-radius: 7px;
		}
		td, th
		{
		  border-radius: 5px;	
		}
		td:hover, th:hover{
			background-color: deepskyblue;
		}
		{
			background-color: deepskyblue;
		}

	</style>
</head>
<body>
	<section>
		Sont invit&eacute;s &agrave; la r&eacute;union Familiale
	</section>
	<div id="data">
	<?php

	$nombrePage = ceil(getTotalPages()/10);//Nombre de pages a afficher
	$get_page = NULL; //numero de la page a afficher
	if(array_key_exists('page', $_GET))
	{
	 $get_page = $_GET['page'];
	}else{
		$get_page = 4;
	}
	if(!is_int($get_page)){
		$get_page = (int)$get_page;
    }
		if($get_page < 1){
			$get_page = 1;
		}else if($get_page > $nombrePage){
			$get_page = $nombrePage;
		}
		$family_table = getData($get_page);
        echo layData($family_table);
     
	
	$precedente = $get_page-1; 
    if($precedente == 0){$precedente = 1;}
	$suivant = $get_page+1; 
    if($suivant == ($nombrePage+1)){$suivant = $nombrePage;}

?>
</div>
<br>
<br>
<div id="precedent">
	<?php echo'<a href="invites.php?page='.$precedente.'">page pr&eacute;c&eacute;dente</a>'; ?>
</div>
<div id="numero">
	<?php echo "Page $get_page/$nombrePage"; ?>
</div>

<div id="suivant">
	<?php echo'<a href="invites.php?page='.$suivant.'">page suivante</a>'; ?>
</div>
<?php


 ?>

</body>
</html>
