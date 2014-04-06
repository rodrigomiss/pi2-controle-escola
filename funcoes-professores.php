<?php
	function gravarCadastroProfessor(array $dados){
		$indice = trim($dados["indice"]);
		$cadastro = array(
			"codigo" => $dados["codigo"],
			"nome" => $dados["nome"],
			"senha" => $dados["senha"]
		);		

		if ($indice == "-1"){
			$_SESSION["professores"][] = $cadastro;
		}else{
			$_SESSION["professores"][$indice] = $cadastro;
		}
	}

	function removeProfessor($indice){
		unset($_SESSION["professores"][$indice]);
	}

	function listaProfessores($indice){
		return isset($indice) ? $_SESSION["professores"][$indice] : $_SESSION["professores"];
	}
?>