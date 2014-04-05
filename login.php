<?php
	session_start();

	$modo = $_POST["modo"];

	if ($modo == "login-admin"){
		$usuario = $_POST["usuario"];
		$senha = $_POST['senha'];

		if ($usuario != "admin"){					
			$_SESSION["administrador"] = $usuario;
			echo "ERROUSUARIO";
		}
		else if ($senha != "utfpr1234"){
			$_SESSION["administrador"] = $usuario;
			echo "ERROSENHA";
		}else{
			echo "OK";
		}
	}elseif ($modo == "logout-admin"){
		unset($_SESSION["administrador"]);
	}
?>