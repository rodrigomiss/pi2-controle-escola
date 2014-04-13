<?php
	session_start();

	$modo = $_POST["modo"];

	if ($modo == "login-admin"){
		$usuario = $_POST["usuario"];
		$senha = $_POST['senha'];

		if ($usuario != "admin"){					
			echo "ERROUSUARIO";
		}
		else if ($senha != "utfpr1234"){
			echo "ERROSENHA";
		}else{
			echo "OK";
			$_SESSION["administrador"] = $usuario;
		}
	}elseif ($modo == "logout-admin"){
		unset($_SESSION["administrador"]);
	}elseif ($modo == "login-aluno"){
		require_once "funcoes-alunos.php";
		$ra = $_POST["aluno-ra"];
		$senha = $_POST["aluno-senha"];
		$alunos = listaAlunos();
	}
?>