<?php
session_start();
define("NOME_SESSAO_MSG_FLASH", "msgFlash");
define("NOME_SESSAO_LOGIN_ADMINISTRADORES", "login_admin");
define("NOME_SESSAO_LOGIN_ALUNOS", "login_aluno");
define("NOME_SESSAO_LOGIN_PROFESSORES", "login_professor");
define("NOME_SESSAO_ALUNOS", "alunos");
define("NOME_SESSAO_PROFESSORES", "professores");
define("NOME_SESSAO_DISCIPLINAS", "disciplinas");
define("NOME_SESSAO_MATRICULAS", "matricula");
define("NOME_SESSAO_NOTAS", "notas");
define("PESO_TRABALHO", 1);
define("PESO_PROVA1", 2);
define("PESO_PROVA2", 3);

function postData($data, $session_name, $index_edit = -1){
	$record = array();

	foreach ($data as $key => $value) {
		$record[$key] = $value;
	}

	if ($index_edit > -1){
		$_SESSION[$session_name][$index_edit] = $record;
	}else{
		$_SESSION[$session_name][] = $record;
	}
}

function removeData($session_name, $index_remove = -1){
	if ($index_remove > -1){
		unset($_SESSION[$session_name][$index_remove]);
	}else{
		unset($_SESSION[$session_name]);
	}
}

function listData($session_name, $index_list = -1){
	return ($index_list > -1) ? $_SESSION[$session_name][$index_list] : $_SESSION[$session_name];
}

function studentExists($ra){
	$alunos = $_SESSION[NOME_SESSAO_ALUNOS];

	foreach ($alunos as $idx_aluno => $aluno) {
		if ($aluno["ra"] == $ra)
			return $idx_aluno;
	}

	return -1;
}

function teacherExists($codigo){
	$professores = $_SESSION[NOME_SESSAO_PROFESSORES];

	foreach ($professores as $idx_professor => $professor) {
		if ($professor["codigo"] == $codigo)
			return $idx_professor;
	}

	return -1;
}

function listNotesByDisciplines($index_discipline, $array_notes = null){
	$notes = is_null($array_notes) ? $_SESSION[NOME_SESSAO_NOTAS] : $array_notes;
	$return = array();

	foreach ($notes as $note) {
		if ($note["disciplina"] == $index_discipline)
			$return[] = $note;
	}
	
	return $return;	
}

function listNotesByStudent($index_student, $notes = null){
	$notes = is_null($notes) ? $_SESSION[NOME_SESSAO_NOTAS] : $notes;
	$return = array();

	foreach ($notes as $note) {
		if ($note["aluno"] == $index_student)
			$return[] = $note;
	}

	return $return;		
}

function listRegistrationByDisciplines($index_discipline, $array_registration = null){
	$registrations = is_null($array_registration) ? $_SESSION[NOME_SESSAO_MATRICULAS] : $array_registration;
	$return = array();

	foreach ($registrations as $registration) {
		if ($registration["disciplina"] == $index_discipline)
			$return[] = $registration;
	}
	
	return $return;	
}

function listRegistrationByStudent($index_student, $registrations = null){
	$registrations = is_null($registrations) ? $_SESSION[NOME_SESSAO_MATRICULAS] : $registrations;
	$return = array();

	foreach ($registrations as $registration) {
		if ($registration["aluno"] == $index_student)
			$return[] = $registration;
	}

	return $return;		
}

function calcAverage($trabalho, $prova1, $prova2){
	return ($trabalho*PESO_TRABALHO+$prova1*PESO_PROVA1+$prova2*PESO_PROVA2) / (PESO_TRABALHO+PESO_PROVA1+PESO_PROVA2);
}

function addMsgFlash($msg, $type){
	$types = array("error"=>"alert-danger", "sucess"=>"alert-success");
	$_SESSION[NOME_SESSAO_MSG_FLASH][] = array("type" => $types[$type], "msg" => $msg);
}

function listMsgFlash(){
	$return = $_SESSION[NOME_SESSAO_MSG_FLASH];
	unset($_SESSION[NOME_SESSAO_MSG_FLASH]);
	return $return;
}
?>