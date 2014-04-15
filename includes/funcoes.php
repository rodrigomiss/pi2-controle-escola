<?php
session_start();
define("NOME_SESSAO_ADMINISTRADORES", "administrador");
define("NOME_SESSAO_ALUNOS", "alunos");
define("NOME_SESSAO_PROFESSORES", "professores");
define("NOME_SESSAO_DISCIPLINAS", "disciplinas");
define("NOME_SESSAO_NOTAS", "notas");

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
?>