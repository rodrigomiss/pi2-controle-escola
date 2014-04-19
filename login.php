<?php
	session_start();

	require_once "includes/funcoes.php";
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
			$_SESSION[NOME_SESSAO_LOGIN_ADMINISTRADORES] = $usuario;
		}
	}elseif ($modo == "logout-admin"){
		unset($_SESSION[NOME_SESSAO_LOGIN_ADMINISTRADORES]);
	}elseif ($modo == "login-professor"){
		$usuario = $_POST["usuario"];
		$senha = $_POST["senha"];
		$professores = array();
		$professores = listData(NOME_SESSAO_PROFESSORES);	

		foreach ($professores as $indice => $professor) {
			if ($professor["nome"] == $usuario){
				if ($professor["senha"] == $senha){
					echo "OK";
					$_SESSION[NOME_SESSAO_LOGIN_PROFESSORES] = $usuario;
					exit;
				}else{
					echo "ERROSENHA";
					exit;
				}
			}
		}

		echo "ERROUSUARIO";
	}elseif ($modo == "logout-professor"){
		unset($_SESSION[NOME_SESSAO_LOGIN_PROFESSORES]);
	}elseif ($modo == "login-aluno"){		
		$ra = $_POST["ra"];
		$senha = $_POST["senha"];
		$alunos = array();
		$alunos = listData(NOME_SESSAO_ALUNOS);	

		foreach ($alunos as $aluno) {
			if ($aluno["ra"] == $ra){
				if ($aluno["senha"] == $senha){
					echo "OK";
					$_SESSION[NOME_SESSAO_LOGIN_ALUNOS] = $ra;
					exit;
				}else{
					echo "ERROSENHA";
					exit;
				}
			}
		}

		echo "ERROUSUARIO";
	}elseif ($modo == "logout-aluno"){
		unset($_SESSION[NOME_SESSAO_LOGIN_ALUNOS]);
	}
?>