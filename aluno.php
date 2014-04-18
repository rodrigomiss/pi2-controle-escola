<?php
  session_start();
  require_once "includes/funcoes.php";

  if (!isset($_SESSION[NOME_SESSAO_LOGIN_ALUNOS])){
    header("Location: index.html?modo=login-aluno-expirado");
    exit;
  }else{
    echo "logado"; exit;
  }
  
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : $_GET['modo'];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Área do Aluno</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS tema -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <li><a id="btn-aluno-notas" href="#">Notas</a></li>
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
<!--           <h3>Disciplinas</h3> -->
         <div id="aluno-disciplinas-list"class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Disciplinas</div>
            <div class="panel-body">
              <p>Lista das disciplinas matriculadas.</p>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Nota</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tr>
                <td>00001</td>
                <td>Disciplina 1</td>
                <td>7.5</td>
              </tr>
              <tr>
                <td>00005</td>
                <td>Disciplina 5</td>
                <td>8.0</td>
              </tr>
              <tr>
                <td>00007</td>
                <td>Disciplina 7</td>
                <td>6.5</td>
              </tr>
            </table>
          </div>
        </div>
        <div id="aluno-notas" style="display:none">
          <h3>Notas</h3>
          <select id="aluno-disciplinas-select" class="form-control">
            <option selected disabled>Selecione a disciplina</option>
            <option value="00001">Disciplina 1</option>
            <option value="00005">Disciplina 5</option>
            <option value="00007">Disciplina 7</option>
          </select>
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