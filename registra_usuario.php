<?php
	
	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$usuario_existe = false;
	$email_existe = false;


	//Verificar se o usuário já existe
	$sql = " SELECT * FROM usuarios WHERE usuario = '$usuario' ";
	if($resultado_id = mysqli_query($link, $sql))
	{
		$dados_usuarios = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuarios['usuario']))
		{
			$usuario_existe = true;
		}
	} else {
		echo 'Erro ao localizar o registtro de usuários!';
	}

	//Verficar se o e-mail já existe
	$sql = " SELECT * FROM usuarios WHERE email = '$email' ";
	if($resultado_id = mysqli_query($link, $sql))
	{
		$dados_usuarios = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuarios['email']))
		{
			$email_existe = true;
		}
	} else {
		echo 'Erro ao localizar o registtro de email!';
	}

	if($usuario_existe || $email_existe)
	{
		$retorno_get = '';

		if($usuario_existe)
		{
			$retorno_get .='erro_usuario=1&';
		}

		if($email_existe)
		{
			$retorno_get .='erro_email=1&';
		}

		header('Location: inscrevase.php?'.$retorno_get);
		die();
	}

	$sql = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha') ";

	if(mysqli_query($link, $sql))
	{
		header('Location: index.php?registra=1');
	} else {
		echo 'Erro ao registrar usuário!';
	}

?>