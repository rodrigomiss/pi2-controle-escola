<?php
  session_start();
  require_once "includes/funcoes.php";

  if (!isset($_SESSION[NOME_SESSAO_LOGIN_ALUNOS])){
    header("Location: index.html?modo=login-aluno-expirado");
    exit;
  }else{
    $modo = isset($_POST["modo"]) ? $_POST["modo"] : $_GET['modo'];
    $idx_login_aluno = $_SESSION[NOME_SESSAO_LOGIN_ALUNOS];
    $nome_login_aluno = $_SESSION[NOME_SESSAO_ALUNOS][$idx_login_aluno]['nome'];
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Área do Aluno</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS tema -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body onload="loadaluno();">
    <div id="container-aluno" style="display:none">
      <div id="main">
        <div id="menu-aluno" class="navbar navbar-default" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a id="btn-aluno-inicial" class="navbar-brand" href="#">Área do Aluno</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a id="btn-aluno-disciplinas" href="#">Disciplinas</a></li>
                <li><a id="btn-aluno-matricula" href="#">Matrícula</a></li>
                <li><a id="btn-aluno-notas" href="#">Notas</a></li>
                <li><p class="navbar-text navbar-show-user">Logado como <strong><?= $nome_login_aluno; ?></strong></p></li>
                <li><a id="btn-aluno-sair" href="#"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div id="aluno-inicial" style="display:none">
          <h4>Bem vindo à área do aluno.</h4>
          <p>Aqui você pode acessar as disciplinas em que está matriculado, verificar suas notas e também calcular sua média.</p>
        </div>
        <div id="aluno-disciplinas" style="display:none">
          <?php require_once "includes/aluno/disciplinas.php"; ?>
        </div>
        <div id="aluno-matricula" style="display:none">
          <?php require_once "includes/aluno/matricula.php"; ?>
        </div>
        <div id="aluno-notas" style="display:none">
          <?php require_once "includes/aluno/notas.php"; ?>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Javascript tema -->
    <script src="js/script.js"></script>
  </body>
</html>