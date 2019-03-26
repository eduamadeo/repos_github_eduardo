<?php

	require_once('db.class.php');

	$id = $_GET['id'];

	$name = '';
	$full_name = '';
	$owner = '';
	$html_url = '';
	$description = '';
	$created_at = 0;
	$language = '';
	$score = 0;

	$objDb = new db();
	$link = $objDb->connect_mysql();

	$sql = " SELECT * FROM repos WHERE id = $id";

	$resultado_id = mysqli_query($link,$sql);

	if($resultado_id){

		$repository = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$name = $repository['name'];
		$full_name = $repository['full_name'];
		$owner = $repository['owner_login'];
		$html_url = $repository['html_url'];
		$description = $repository['description'];
		$created_at = $repository['created_at'];
		$language = $repository['repo_language'];
		$score = $repository['score'];

	} else{
		echo 'Erro na consulta do banco de dados!';
	}

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Detalhes repositório</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Voltar</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	<div class="col-md-12">
	    		<h4>Nome</h4>
	    		<p><?= $name?></p>
	    		<br><br>
	    		<h4>Nome completo</h4>
	    		<p><?= $full_name?></p>
	    		<br><br>
	    		<h4>Dono</h4>
	    		<p><?= $owner?></p>
	    		<br><br>
	    		<h4>Link acesso</h4>
	    		<p><?= $html_url?></p>
	    		<br><br>
	    		<h4>Descrição</h4>
	    		<p><?= $description?></p>
	    		<br><br>
	    		<h4>Data de criação</h4>
	    		<p><?= $created_at?></p>
	    		<br><br>
	    		<h4>Linguagem</h4>
	    		<p><?= $language?></p>
	    		<br><br>
	    		<h4>Estrelas</h4>
	    		<p><?= $score?></p>
	    		<br><br>
	    	</div>
		</div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>