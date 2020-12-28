<?php
	
	session_start();

	if(!isset($_SESSION['usuario']))
		header('Location: index.php?erro=1');

	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$id_usuario = $_SESSION['id_usuario'];

	//qtd de status
	$sql = " SELECT COUNT(*) AS qtd_status FROM tweet WHERE id_usuario = $id_usuario ";
	$resultado_id = mysqli_query($link, $sql);
	$qtd_status = 0;
	if($resultado_id)
	{
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtd_status = $registro['qtd_status'];
	} else {
		echo 'Erro na consulta da query no banco de dados';
	}
	//qtd de seguidores
	$sql = " SELECT COUNT(*) AS qtd_seguidores FROM usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario ";
	$resultado_id = mysqli_query($link, $sql);
	$qtd_seguidores = 0;
	if($resultado_id)
	{
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtd_seguidores = $registro['qtd_seguidores'];
	} else {
		echo 'Erro na consulta da query no banco de dados';
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	
	<head>

		<meta charset="utf-8">

		<title>Tela de login</title>
		<link rel="icon" href="icons/chat-dots.svg">

		<!-- css link -->
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
		<!-- JavaScrip -->
		<script type="text/javascript">
			$(document).ready( function(){
				$('#btb_tweet').click( function(){
					if($('#texto_tweet').val().length > 0)
					{
						//pulo do gato
						$.ajax({
							url: 'inclui_tweet.php',
							method: 'post',
							data: {texto_tweet : $('#texto_tweet').val()},
							success: function(data) {
								$('#texto_tweet').val('');
								atualizaTweet();
							}

						});
					}
				});
				
				function atualizaTweet()
				{
					$.ajax({
						url: 'get_tweet.php',
						success: function(data) {
							$('#tweets').html(data);
						}
					});
				}

				atualizaTweet();

			});
		</script>

	</head>

	<body>
		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top" style="border: none; background-image: linear-gradient(to right, #80FF00, #00FFFF); padding: 15px;">
	      	<div class="container">
	        	<div class="navbar-header">
		          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		          	</button>
		         	<div>
		         		<a href="home.php"><img style="width: 40px; height: 40px;" src="icons/chat-dots.svg" /></a>
		         	</div>
	        	</div>
	        
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="sair.php">Sair</a></li>
		          </ul>
		        </div><!--/.nav-collapse -->
	      	</div>
	    </nav>

		<div class="container">
			<div class="row">
				<!-- panel left -->
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body" style="text-align: center;">
							<h4><?= $_SESSION['usuario'] ?></h4>
							<hr>
							<div class="col-md-6">
								STATUS <br> <?= $qtd_status ?>
							</div>
							<div class="col-md-6">
								SEGUIDORES <br><?= $qtd_seguidores ?>
							</div>
						</div>
					</div>
				</div>

				<!-- panel center -->
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="input-group">
								<input type="text" id="texto_tweet" class="form-control" placeholder="Insira novo status" maxlength="140">
								<span class="input-group-btn">
									<button class="btn btn-success" id="btb_tweet" type="button">Enviar</button>
								</span> 
							</div>
						</div>
					</div>
					<div id="tweets" class="list-group"></div>
				</div>
				
				<!-- panel right -->
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body" style="text-align: center;">
							<h4><a href="procurar_pessoas.php">Procurar pessoas</a></h4>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</body>
</html>