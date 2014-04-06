<?php
  session_start();
  $modo = $_POST["modo"];
  $indice_editar = isset($_POST["id"]) ? (int) $_POST["id"] : -1;
    
  if ($indice_editar > -1){
    require_once "../../funcoes-disciplinas.php";
    $disciplinas = listaDisciplinas($indice_editar);    
    $codigo = $disciplinas["codigo"];
    $disciplina = $disciplinas["disciplina"];
  }

  if ($modo == "gravar-cadastro"){
    require_once "../../funcoes-disciplinas.php";
    gravarCadastroDisciplina($_POST);
    header("Location: ../../admin.php");
  }
?>  

<div id="cadastro-disciplina" style="display:visible">
 <div id="cadastro-disciplina-list"class="panel panel-default">
    <div class="panel-heading">Cadastro de Disciplinas</div>
    <div class="panel-body">
      <a href="javascript:carregaFormEditarDisciplina(-1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
      <a href="javascript:carregaListaDisciplinas();"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
    </div>
    <form name="cadastro-disciplina-form" id="cadastro-disciplina-form" method="post" action="includes/admin/form-cadastro-disciplina.php">
      <input type="hidden" name="modo" value="gravar-cadastro">
      <input type="hidden" name="indice" value="<?= $indice_editar; ?>">
    
      <div class="input-group">
        <span class="input-group-addon glyphicon">Código</span>
        <input id="" name="codigo" type="text" class="form-control" placeholder="Código" value="<?= $codigo; ?>">
      </div>
      <div class="alert alert-danger danger-disciplina" style="display:none">Preencha o campo Código</div>
      <div class="input-group">
        <span class="input-group-addon glyphicon">Disciplina</span>
        <input id="" name="disciplina" type="text" class="form-control" placeholder="Disciplina" value="<?= $disciplina; ?>">
      </div>
      <div class="alert alert-danger danger-disciplina" style="display:none">Preencha o campo Disciplina</div>
      <button type="submit" id="" class="btn btn-default btn-salvar">
        <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
      </button>
  </form>
</div>