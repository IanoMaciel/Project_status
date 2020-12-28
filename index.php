<?php

	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
	$registra = isset($_GET['registra']) ? $_GET['registra'] : 0;
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
		<script>
			$(document).ready( function(){
				//verifico se os campos (User e senha) foram preenchidos

				$('#btn_entrar').click( function(){
					
					var campo_vazio = false;

					if($('#campo_usuario').val() == '') {
						$('#campo_usuario').css({'border-color' : '#A94442'});
						campo_vazio = true;
					} else {
						$('#campo_usuario').css({'border-color' : '#CCC'});
					}

					if($('#campo_senha').val() == '') {
						$('#campo_senha').css({'border-color' : '#A94442'});
						campo_vazio = true;
					} else {
						$('#campo_senha').css({'border-color' : '#CCC'});
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
				<div class="col-md-5">
					<strong><h1 style="color: white; font-size: 60px;">Status</h1></strong>
					<h3>Veja o que esta acontecendo agora...</h3>
				</div>
				<!-- login -->
				<div class="col-md-5">
					<?php 
					echo '<div>';	
						if($erro == 1) {
							echo '<p style="text-align: center; color: red;">Usuário ou senha inválido!</p>';
						}	
						if($registra == 1) {
							echo '<p style="text-align: center; color: #045FB4;">Usuário cadastrado com sucesso!</p>'; 
						}
					echo'</div>';
					?>
					<div class="panel panel-default" style="border-radius: 15px;">
						<div class="panel-body">
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" name="usuario" id="campo_usuario" placeholder="Usuário" class="form-control">
								</div>
								<div class="form-group">
									<input type="password" name="senha" id="campo_senha" placeholder="Senha" class="form-control">
								</div>
								
								<button type="submit" class="form-control btn btn-primary" id="btn_entrar">Entrar</button>
								
								<hr>
							</from>
							<div class="form-group">
									<button type="buttom" class="form-control btn btn-success center-block" style="width:150px;"><a href="inscrevase.php">Cadastrar</a></button>
							</div>
						</form>
						</div>
					</div>
				</div>
				
				<!-- panel direito -->
				<div class="col-md-2"></div>
			</div>
		</div>

	</body>
</html>
