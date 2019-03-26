<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Destaques github</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script type="text/javascript">
			
			$(document).ready( function(){

				//carrega os repositórios do banco para o front
				$('.btn_load_repos').click( function(){

					var language = this.id;

					$.ajax({
						url: 'get_repos.php',
						method: 'post',
						data: {language: language},
						success: function(data){
							$('#repos').html(data);
						}
					});

				});

				$('#btn_update').click( function(){

					$.ajax({
						url: 'update_repos.php',
						success: function(data){
							alert('Atualização realizada com sucesso')
						},

						beforeSend : function(){
							$('#loader').css({display:"block"});
						},

						complete: function(){
							$('#loader').css({display:"none"});
						}
					});

				});

			});

		</script>

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
	      </div>
	    </nav>


	    <div class="container">
	    	<div class="col-md-12">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    				<button type="button" class="btn btn-primary" id="btn_update">Atualizar destaques</button>
	    				<center><img src="loader.gif" style="display: none" id="loader"></center>
	    			</div>
	    		</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-md-2"></div>
	    		<div class="col-md-8 center">
	    			<a href="#" class="btn btn-default btn_load_repos" id="Java">Java</a>
	    			<a href="#" class="btn btn-default btn_load_repos" id="C++">C++</a>
	    			<a href="#" class="btn btn-default btn_load_repos" id="PHP">PHP</a>
	    			<a href="#" class="btn btn-default btn_load_repos" id="C">C</a>
	    			<a href="#" class="btn btn-default btn_load_repos" id="Python">Python</a>
	    		</div>
	    		<div class="col-md-2"></div>
	    	</div>
	    	
	    	<br />

	    	<div id="repos" class="list-group">
	    				
	    	</div>
		</div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>