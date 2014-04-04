<?php
  session_start();

  if (!isset($_SESSION["administrador"])){
    header("Location: index.html?modo=login-admin-expirado");
    exit;
  }
  
  require_once "gerencia-alunos.php";
  require_once "layout.php";
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : $_GET['modo'];
  $divAtiva = $_GET['div'];


  if ($modo == "gravar-cadastro-aluno"){
    gravarCadastroAluno($_POST);
    header("Location: admin.php?modo=cadastrar-aluno&div=admin-alunos");
  }elseif ($modo == "remover-aluno"){
    removeAluno($_GET["id"]);
    header("Location: admin.php?div=admin-alunos");
  }

  gerarMenuTopo();
  gerarConteudo($modo, $divAtiva);
  gerarRodape();
?>
