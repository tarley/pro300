<?php
	session_start();

	if (!isset($_SESSION['cod_usuario']))
		header("location:login.php");
	else if($_SESSION['perfil'] == "A")
		header("location:homeAluno.php");
	else if($_SESSION['perfil'] == "P")
		header("location:administrarAtividades.php");
?>