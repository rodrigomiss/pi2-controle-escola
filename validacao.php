<?php
	require_once "includes/funcoes.php";
	$modo = $_POST["modo"];

	if ($modo == "cadastro-aluno"){
	 	$nome = $_POST['nome'];
	 	$ra = $_POST["ra"];
	 	$senha = $_POST["senha"];
	 	$alunos = array();
	 	$alunos = listData(NOME_SESSAO_ALUNOS);

	 	if(!preg_match('/^[0-9]*$/', $ra)){
	 	 	echo "RAINVALIDO";
	 	 	exit;
	 	}

	 	foreach ($alunos as $idx_aluno => $aluno) {
	 	 	if ($aluno["ra"] == $ra){
	 	 		echo "RAEXISTENTE";
	 	 		exit;
	 	 	}
	 	}
	 	if (strlen($senha) < 6){
	 		echo "SENHACURTA";
	 		exit;
	 	}

	 	echo "OK";
	}
	if ($modo == "cadastro-professor"){
	 	$nome = $_POST['nome'];
	 	$codigo = $_POST["codigo"];
	 	$senha = $_POST["senha"];
	 	$professores = array();
	 	$professores = listData(NOME_SESSAO_PROFESSORES);

	 	if(!preg_match('/^[0-9]*$/', $codigo)){
	 	 	echo "CODIGOINVALIDO";
	 	 	exit;
	 	}

	 	foreach ($professores as $idx_professor => $professor) {
	 	 	if ($professor["codigo"] == $codigo){
	 	 		echo "CODIGOEXISTENTE";
	 	 		exit;
	 	 	}
	 	}

	 	if (strlen($senha) < 6){
	 		echo "SENHACURTA";
	 		exit;
	 	}

	 	echo "OK";
	}
	if ($modo == "cadastro-disciplina"){
	 	$codigo = $_POST['codigo'];
	 	$nome = $_POST["nome"];
	 	$professor = $_POST["professor"];
	 	$disciplinas = array();
	 	$disciplinas = listData(NOME_SESSAO_DISCIPLINAS);

	 	if(!preg_match('/^[0-9]*$/', $codigo)){
	 	 	echo "CODIGOINVALIDO";
	 	 	exit;
	 	}

	 	foreach ($disciplinas as $idx_disciplina => $disciplina) {
	 	 	if ($disciplina["codigo"] == $codigo){
	 	 		echo "CODIGOEXISTENTE";
	 	 		exit;
	 	 	}
	 	}

	 	if (!strlen($professor) > 0){
	 		echo "PROFESSORNULO";
	 		exit;
	 	}

	 	echo "OK";
	}
?>