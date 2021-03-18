<?php

	session_start();

	$email = $_POST["email"];
	$senha = $_POST["senha"];
	if($email == "teste@teste" && $senha == "123") {
		$_SESSION["erro"] = false;
		header("Location: sucesso.html");
	} else {
		$_SESSION["erro"] = true;
		header("Location: teste.php");
	}

?>
