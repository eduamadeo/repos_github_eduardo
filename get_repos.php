<?php

	require_once('db.class.php');

	$language = $_POST['language'];

	$objDb = new db();
	$link = $objDb->connect_mysql();

	$sql = " SELECT * FROM repos WHERE repo_language = '$language'";

	$resultado_id = mysqli_query($link,$sql);

	if($resultado_id){

		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			$details = "details.php?id=".$registro['id'];
			echo '<a href="'.$details.'" class="list-group-item">';
				echo '<h4 class="list-group-item-heading">'.$registro['name'].'</h4>';
				echo '<p class="list-group-item-text">'.$registro['description'].'</p>';
			echo '</a>';
		}

	} else{
		echo 'Erro na consulta do banco de dados!';
	}

?>