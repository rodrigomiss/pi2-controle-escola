<?php
  session_start();
  $modo = $_POST["modo"];
  $indice_editar = isset($_GET["id"]) ? (int) $_GET["id"] : -1;
    
  if ($indice_editar > -1){
    $nome = $_SESSION["alunos"][$indice_editar]["nome"];
    $ra = $_SESSION["alunos"][$indice_editar]["ra"];
    $senha = $_SESSION["alunos"][$indice_editar]["senha"];
  }


  if ($modo == "gravar-cadastro"){
    require_once "../../gerencia-alunos.php";
    gravarCadastroAluno($_POST);
    header("Location: ../../admin.php");
  }
?>  

<div id="cadastro-aluno" style="display:visible">
 <div id="cadastro-aluno-list"class="panel panel-default">
    <div class="panel-heading">Cadastrado de Alunos</div>
    <div class="panel-body">
      <a href="javascript:carregaFormEditarAluno(-1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
      <a href="javascript:carregaListaAlunos();"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
    </div>
    <form name="cadastro-aluno-form" id="cadastro-aluno-form" method="post" action="includes/admin/form-cadastro-aluno.php">
      <input type="hidden" name="modo" value="gravar-cadastro">
      <input type="hidden" name="indice" value="<?= $indice_editar; ?>">
    
      <div class="input-group">
        <span class="input-group-addon glyphicon">Nome</span>
        <input id="" name="nome" type="text" class="form-control" placeholder="Nome" value="<?= $nome; ?>">
      </div>
      <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo Nome</div>
      <div class="input-group">
        <span class="input-group-addon glyphicon">R.A</span>
        <input id="" name="ra" type="text" class="form-control" placeholder="RA" value="<?= $ra; ?>">
      </div>
      <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo RA</div>
      <div class="input-group">
        <span class="input-group-addon glyphicon">Senha</span>
        <input id="admin-senha" name="senha" type="password" class="form-control" placeholder="Senha" value="<?= $senha; ?>">
      </div>
      <div class="alert alert-danger danger-senha" style="display:none;">Preencha o campo Senha</div>
      <button type="submit" id="" class="btn btn-default btn-salvar">
        <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
      </button>
  </form>
</div>