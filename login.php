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
	}elseif ($modo == "login-professor"){
		require_once "funcoes-professores.php";
		$usuario = $_POST["usuario"];
		$senha = $_POST["senha"];
		$professores = array();
		$professores = listaProfessores();
	

		foreach ($professores as $indice => $professor) {
			if ($professor["nome"] == $usuario){
				if ($professor["senha"] == $senha){
					echo "OK";
					$_SESSION["professor"] = $usuario;
					exit;
				}else{
					echo "ERROSENHA";
					exit;
				}
			}
		}

		echo "ERROUSUARIO";
	}elseif ($modo == "logout-professor"){
		unset($_SESSION["professor"]);
	}elseif ($modo == "login-aluno"){
		require_once "funcoes-alunos.php";
		$ra = $_POST["ra"];
		$senha = $_POST["senha"];
		$alunos = array();
		$alunos = listaAlunos();
	

		foreach ($alunos as $aluno) {
			if ($aluno["ra"] == $ra){
				if ($aluno["senha"] == $senha){
					echo "OK";
					$_SESSION["aluno"] = $ra;
					exit;
				}else{
					echo "ERROSENHA";
					exit;
				}
			}
		}

		echo "ERROUSUARIO";
	}elseif ($modo == "logout-aluno"){
		unset($_SESSION["aluno"]);
	}
?>