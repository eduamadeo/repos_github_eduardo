<?php

	require_once __DIR__ . '/vendor/autoload.php';
	require_once('db.class.php');

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

	$sql = " DELETE FROM repos";

	$resultado_id = mysqli_query($link,$sql);

			if($resultado_id){
				echo 'Deu certo';
			} else{
				echo 'Erro na consulta do banco de dados!';
			}

	$lang = 'php';
	update_lang($lang);

	$lang = 'c';
	update_lang($lang);

	$lang = 'c++';
	update_lang($lang);

	$lang = 'python';
	update_lang($lang);

	$lang = 'java';
	update_lang($lang);

	function update_lang($language){

		$client = new \Github\Client();

		$objDb = new db();
		$link = $objDb->connect_mysql();

		$language_choice = "github language:".$language;

		//echo $language_choice;

		$repos = $client->api('search')->repositories($language_choice,'stars','desc');

		foreach ($repos['items'] as $repo) {
			$name = $repo['name'];
			$full_name = $repo['full_name'];
			$owner = $repo['owner']['login'];
			$html_url = $repo['html_url'];
			$description = $repo['description'];
			$created_at = $repo['created_at'];
			$language = $repo['language'];
			$score = $repo['score'];

			$sql = " INSERT INTO repos (name, full_name, owner_login, html_url, description, created_at, repo_language, score)
					values ('$name', '$full_name', '$owner', '$html_url', '$description', '$created_at', '$language', $score) ";

			//echo $sql;

			$resultado_id = mysqli_query($link,$sql);

			if($resultado_id){
				
			} else{
				echo 'Erro na consulta do banco de dados!';
			}
		}

	}

?>