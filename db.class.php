<?php
	
	class db {

		//host
		private $host = 'heroku-php-apache2';

		//usuario
		private $usuario = 'root';

		//senha
		private $senha = '';

		//banco de dados
		private $database = 'trend_repos';

		public function connect_mysql(){

			//criar a conexão
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

			//ajustar o charset de comunicação entre a aplicação e o banco de dados
			mysqli_set_charset($con, 'utf8');

			//verificar se houve erro de conexão
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();
			}

			return $con;

		}

	}

?>