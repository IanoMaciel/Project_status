<?php

	session_start();

	unset($_SESSION['usuario']);
	unset($_SESSION['email']);

	echo 'Voce sai da página, esperamos que volte :(';
?>