<?php
	session_start();

	$modo = $_POST["modo"];

	if ($modo == "login-admin"){
		$usuario = $_POST["usuario"];
		$senha = $_POST['senha'];

		if ($usuario == "admin" && $senha == "utfpr1234"){
					
			$_SESSION["administrador"] = $usuario;
			echo "OK";
		}else{
			echo "ERRO";
		}
	}elseif ($modo == "logout-admin"){
		unset($_SESSION["administrador"]);
	}
?>