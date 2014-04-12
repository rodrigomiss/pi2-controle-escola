<?php
  session_start();

  $modo = $_POST['modo'];
  $indice = $_POST['id'];

  if ($modo == "listar" || $modo == "remove"){
    require_once "../../funcoes-disciplinas.php";
  }else{
    require_once "funcoes-disciplinas.php";
  }

  if ($modo == "remove"){
    removeDisciplina($indice);
  }
?>

<div id="disciplinas-cadastradas" style="display:visible">
 <div id="disciplinas-cadastradas-list"class="panel panel-default">
    <div class="panel-heading">Disciplinas Cadastradas</div>
    <div class="panel-body">
      <a href="javascript:carregaFormEditarDisciplina(-1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
      <a href="javascript:carregaListaDisciplinas();"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th width="15%">Código</th>
          <th>Disciplina</th>
          <th width="20%">Opções</th>
        </tr>
      </thead>

      <?php 
        $disciplinas = listaDisciplinas();

        foreach ($disciplinas as $indice => $cadastro) {
          $codigo = $cadastro["codigo"];
          $disciplina = $cadastro["disciplina"];
          $link_editar = "<a href='javascript:carregaFormEditarDisciplina($indice);'><img src='img/icone-editar.png' width='22%'' title='Editar' caption='$ra'></a>";
          $link_remover = "<a href='javascript:removeDisciplina($indice);'><img src='img/icone-remover.png' width='22%' title='Remover'></a>";
          
          echo                    
          "<tr>
            <td>$codigo</td>
            <td align='left'>$disciplina</td>
            <td>$link_editar $link_remover</td>
          </tr>";     
        }
      ?>

    </table>
  </div>
</div>