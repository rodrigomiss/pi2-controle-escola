<?php
  session_start();
  require_once "includes/funcoes.php";

  if (!isset($_SESSION[NOME_SESSAO_LOGIN_PROFESSORES])){
    header("Location: index.html?modo=login-professor-expirado");
    exit;
  }
  
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : $_GET['modo'];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Área do Professor</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS tema -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body onload="loadprofessor();">
    <div id="container-professor" style="display:none">
      <div id="main">
        <div id="menu-professor" class="navbar navbar-default" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a id="btn-professor-inicial" class="navbar-brand" href="#">Área do Professor</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a id="btn-professor-disciplinas" href="#">Disciplinas</a></li>
                <li><a id="btn-professor-notas" href="#">Notas</a></li>
                <li><p class="navbar-text navbar-show-user">Logado como <strong><?= $_SESSION["login_professor"] ?></strong></p></li>
                <li><a id="btn-professor-sair" href="#"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div id="professor-inicial" style="display:none">
          <h4>Bem vindo à área do professor.</h4>
          <p>Aqui você pode acessar as disciplinas que ministra aulas e modificar notas dos alunos.</p>
        </div>
        <div id="professor-disciplinas" style="display:none">
          <?php require_once "includes/professor/disciplinas.php"; ?>
        </div>
        <div id="professor-notas" style="display:none">
          <?php require_once "includes/professor/notas.php"; ?>          
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

      <!-- Javascript tema -->
      <script src="js/script.js"></script>
  </body>
</html>