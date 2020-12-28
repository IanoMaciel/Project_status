<?php

	$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
	$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;


?>

<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Tela de login</title>

		<!-- css link -->
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- JavaScript -->
		<script type="text/javascript">

			$(document).ready( function(){
				$('#btn_cadastrar').click( function(){

					var campo_vazio = false;

					if($('#usuario').val() == '')
					{
						$('#usuario').css({'border-color' : '#A94442'});
						campo_vazio = true;
					} else {
						$('#usuario').css({'border-color' : '#CCC'});
					}

					if($('#email').val() == '')
					{
						$('#email').css({'border-color' : '#A94442'});
						campo_vazio = true;
					} else {
						$('#email').css({'border-color' : '#CCC'});
					}

					if($('#senha').val() == '')
					{
						$('#senha').css({'border-color' : '#A94442'});
						campo_vazio = true;
					} else {
						$('#senha').css({'border-color' : '#CCC'});
					}
					
					if(campo_vazio) return false;
				});
			});
			
		</script>
	</head>
	<body>
		<div class="container ajuste-tela">
			<div class="row">
				<!-- Info Status -->
				<div class="col-md-4"></div>
				<!-- login -->
				<div class="col-md-4">
					<div class="panel panel-default" style="border-radius: 15px;">
						<div class="panel-body">
							<h1 style="text-align: center;">Inscreva-se já</h1>
							<hr>
							<form method="post" action="registra_usuario.php" id="formCadastrarse">
								<div class="form-group">
									<input type="text" name="usuario" id="usuario" placeholder="Usuário" class="form-control">
									<?php
										if($erro_usuario)
										{
											echo '<p style="text-align: center; color: red;">Usuário existente!</p>';
										}
									?>
								</div>
								<div class="form-group">
									<input type="text" name="email" id="email" placeholder="E-mail" class="form-control">
									<?php
										if($erro_email)
										{
											echo '<p style="text-align: center; color: red;">E-mail existente!</p>';
										}
									?>
								</div>
								<div class="form-group">
									<input type="password" name="senha" id="senha" placeholder="senha" class="form-control">
								</div>
								
								<div class="form-group">
									<input type="submit" id="btn_cadastrar" name="Cadastrar" class="form-control btn btn-success">
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<!-- panel direito -->
				<div class="col-md-4"></div>
			</div>
		</div>

	</body>
</html>