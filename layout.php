<?php
	function gerarMenuTopo(){
		echo 
		'<!DOCTYPE html>
		<html lang="pt-br">
		  <head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>Área do Administrador</title>

		    <!-- Bootstrap -->
		    <link href="css/bootstrap.min.css" rel="stylesheet">

		    <!-- CSS tema -->
		    <link href="css/style.css" rel="stylesheet">

		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->
		  </head>
		  <body onload="loadadmin();">
		    <div id="container-admin" style="display:none">
		      <div id="main">
		        <div id="menu-admin" class="navbar navbar-default" role="navigation">
		          <div class="container">
		            <div class="navbar-header">
		              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		              </button>
		              <a id="btn-admin-inicial" class="navbar-brand" href="#">Área do Administrador</a>
		            </div>
		            <div class="collapse navbar-collapse">
		              <ul class="nav navbar-nav">
		                <li><a id="btn-admin-alunos" href="#">Alunos</a></li>
		                <li><a id="btn-admin-professores" href="#">Professores</a></li>
		                <li><a id="btn-admin-disciplinas" href="#">Disciplinas</a></li>
		                <li><a id="btn-admin-notas" href="#">Notas</a></li>
		                <li><a id="btn-admin-sair" href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>';
	}

	function gerarConteudo($modo, $divAtiva){
		echo 
		'<div id="admin-inicial" style="display:'.($divAtiva == "admin-inicial" ? "visible" : "none").'">
          <h4>Bem vindo à área do administrador.</h4>
          <p>Aqui você pode cadastrar, modificar ou excluir dados de alunos, professores, disciplinas e notas.</p>
        </div>

        <div id="admin-alunos" style="display:'.($divAtiva == "admin-alunos" ? "visible" : "none").'">';
      
            if ($modo == "cadastrar-aluno" || $modo == "editar-aluno"){
              $indice = isset($_GET["id"]) ? (int) $_GET["id"] : -1;
              gerarMenuControle("Cadastrar");   
              gerarFormularioCadastro($indice);
            }else{
              gerarMenuControle("Listar"); 
              imprimeListaAlunos();
            }
		
		echo      
        '</div>
        <div id="admin-professores" style="display:none">
          <h3>Professores</h3>
        </div>
        <div id="admin-disciplinas" style="display:none">
          <h3>Disciplinas</h3>
        </div>
        <div id="admin-notas" style="display:none">
          <h3>Notas</h3>
        </div>
      </div>
    </div>';
	}

	function gerarRodape(){
		echo
		'<!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>

	    <!-- Javascript tema -->
	    <script src="js/script.js"></script>
	  </body>
	</html>';
	}
?>