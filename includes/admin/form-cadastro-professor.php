<?php
  session_start();
  $modo = $_POST["modo"];
  $indice_editar = isset($_POST["id"]) ? (int) $_POST["id"] : -1;
    
  if ($indice_editar > -1){
    require_once "../../funcoes-professores.php";
    $professores = listaProfessores($indice_editar);    
    $codigo = $professores["codigo"];
    $nome = $professores["nome"];
    $senha = $professores["senha"];
  }

  if ($modo == "gravar-cadastro"){
    require_once "../../funcoes-professores.php";
    gravarCadastroProfessor($_POST);
    header("Location: ../../admin.php");
  }
?>  

<div id="cadastro-professor" style="display:visible">
 <div id="cadastro-professor-list"class="panel panel-default">
    <div class="panel-heading">Cadastrado de Professores</div>
    <div class="panel-body">
      <a href="javascript:carregaFormEditarProfessor(-1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
      <a href="javascript:carregaListaProfessores()"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
    </div>
    <form name="cadastro-professor-form" id="cadastro-professor-form" method="post" action="includes/admin/form-cadastro-professor.php">
      <input type="hidden" name="modo" value="gravar-cadastro">
      <input type="hidden" name="indice" value="<?= $indice_editar; ?>">
    
      <div class="input-group">
        <span class="input-group-addon glyphicon">Nome</span>
        <input id="" name="nome" type="text" class="form-control" placeholder="Nome" value="<?= $nome; ?>">
      </div>
      <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo Nome</div>
      <div class="input-group">
        <span class="input-group-addon glyphicon">Código</span>
        <input id="" name="codigo" type="text" class="form-control" placeholder="Código" value="<?= $codigo; ?>">
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