<?php
	function gravarCadastroDisciplina(array $dados){
		$indice = trim($dados["indice"]);
		$cadastro = array(
			"codigo" => $dados["codigo"],
			"disciplina" => $dados["disciplina"]
		);		

		if ($indice == "-1"){
			$_SESSION["disciplinas"][] = $cadastro;
		}else{
			$_SESSION["disciplinas"][$indice] = $cadastro;
		}
	}

	function removeDisciplina($indice){
		unset($_SESSION["disciplinas"][$indice]);
	}

	function listaDisciplinas($indice){
		return isset($indice) ? $_SESSION["disciplinas"][$indice] : $_SESSION["disciplinas"];
	}
?>