<?php
	function gravarCadastroAluno(array $dados){
		$indice = trim($dados["indice"]);
		$cadastro = array(
			"ra" => $dados["ra"],
			"nome" => $dados["nome"],
			"senha" => $dados["senha"]
		);		

		if ($indice == "-1"){
			$_SESSION["alunos"][] = $cadastro;
		}else{
			$_SESSION["alunos"][$indice] = $cadastro;
		}
	}

	function removeAluno($indice){
		unset($_SESSION["alunos"][$indice]);
	}

	function listaAlunos(){
		return $_SESSION["alunos"];
	}
?>