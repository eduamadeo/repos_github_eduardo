<?php
	
	class db {

		//host
		private $host = 'us-cdbr-iron-east-03.cleardb.net';

		//usuario
		private $usuario = 'bda929a4e9dae2';

		//senha
		private $senha = '4e2dca46';

		//banco de dados
		private $database = 'heroku_34b0fc125a335fd';

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