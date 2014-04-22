<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Sistema</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS tema -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body onload="load();">
    <div id="container" style="display:none">
      <div id="main">
        <h1 id="main-title">Sistema</h1>
        <div class="btn-group">
          <button id="btn-aluno" type="button" class="btn btn-default">Área do Aluno</button>
          <button id="btn-professor" type="button" class="btn btn-default">Área do Professor</button>
          <button id="btn-admin" type="button" class="btn btn-default">Área do Administrador</button>
        </div>
        <div id="login-aluno" class="login" style="display:none">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user"></span>
            <input id="aluno-usuario" type="text" class="form-control" placeholder="R.A.">
          </div>
          <div class="alert alert-danger danger-usuario" style="display:none"></div>
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
            <input id="aluno-senha" type="password" class="form-control" placeholder="Senha">
          </div>
          <div class="alert alert-danger danger-senha" style="display:none"></div>
          <button type="submit" id="btn-login-aluno" class="btn btn-default btn-lg btn-login">
            <span class="glyphicon glyphicon-log-in"></span> Entrar
          </button>
        </div>
        
        <div id="login-professor" class="login" style="display:none">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user"></span>
            <input id="professor-usuario" type="text" class="form-control" placeholder="Usuário">
          </div>
          <div class="alert alert-danger danger-usuario" style="display:none"></div>
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
            <input id="professor-senha" type="password" class="form-control" placeholder="Senha">
          </div>
          <div class="alert alert-danger danger-senha" style="display:none"></div>
          <button type="button" id="btn-login-professor" class="btn btn-default btn-lg btn-login">
            <span class="glyphicon glyphicon-log-in"></span> Entrar
          </button>
        </div>

        <div id="login-admin" class="login" style="display:none">          
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user"></span>
            <input id="admin-usuario" name="admin-usuario" type="text" class="form-control" placeholder="Usuário">
          </div>
          <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo Usuário</div>
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
            <input id="admin-senha" name="admin-senha" type="password" class="form-control" placeholder="Senha">
          </div>
          <div class="alert alert-danger danger-senha" style="display:none">Preencha o campo Senha</div>
          <button type="button" id="btn-login-admin" class="btn btn-default btn-lg btn-login">
            <span class="glyphicon glyphicon-log-in"></span> Entrar
          </button>
        </div>
      </div>
    </div>
    <?php
      require_once "includes/funcoes.php";
      
      $msg = listMsgFlash();  
      foreach ($msg as $mensagem) {
        echo "<div class='alert flash $mensagem[type]'>$mensagem[msg]</div>";
      }
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Javascript tema -->
    <script src="js/script.js"></script>
  </body>
</html>