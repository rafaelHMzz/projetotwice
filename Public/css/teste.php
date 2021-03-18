<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="viewport=device-viewport">
	<style type="text/css">
		
		body, html {
			height: 100vh;
			padding: 0;
			margin: 0;
			font-family: sans-serif;
			background-color: #1a1a1d;
		}

		label, input {
			display: block;
		}
		
		form {
			color: white;
			width: 30%;
			padding: 15px;
			display: flex;
			flex-direction: column;
		}

		#email, #senha {
			margin: 10px 0 10px 0;
			padding: 0;
			width: 100%;
		}

		#btn {
			margin-top: 20px;
			width: 50%;
			align-self: center;
			padding: 5px;
			font-size: 16px;
			background-color: white;
			border: none;
			transition: all 0.5s ease-in-out;
		}

		#btn:hover {
			background-color: #ccc;
		}

		.container {
			height: 100%;
			display: flex;
			justify-content: space-around;
			align-items: center;
		}

		.erro {
			color: red;
			text-align: center;
		}

	</style>
</head>
<body>

	<div class="container">
		<form action="valida.php" method="post">
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" autofocus>
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha">
			<input type="submit" name="btn" id="btn" value="logar">
			<?php if($_SESSION["erro"]) { ?>
				<p class="erro">Erro na validação</p>
			<?php } ?>
		</form>
	</div>

</body>
</html>