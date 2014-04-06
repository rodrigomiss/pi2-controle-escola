<?php
  session_start();

  $modo = $_POST['modo'];
  $indice = $_POST['id'];

  if ($modo == "listar" || $modo == "remove"){
    require_once "../../funcoes-professores.php";
  }else{
    require_once "funcoes-professores.php";
  }

  if ($modo == "remove"){
    removeProfessor($indice);
  }
?>

<div id="professores-cadastrados" style="display:visible">
 <div id="professores-cadastrados-list"class="panel panel-default">
    <div class="panel-heading">Professores Cadastrados</div>
    <div class="panel-body">
      <a href="javascript:carregaFormEditarProfessor(-1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
      <a href="javascript:carregaListaProfessores()"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th width="15%">Código</th>
          <th>Nome</th>
          <th width="20%">Opções</th>
        </tr>
      </thead>

      <?php 
        $professores = listaProfessores();

        foreach ($professores as $indice => $cadastro) {
          $codigo = $cadastro["codigo"];
          $nome = $cadastro["nome"];
          $link_editar = "<a href='javascript:carregaFormEditarProfessor($indice);'><img src='img/icone-editar.png' width='22%'' title='Editar' caption='$ra'></a>";
          $link_remover = "<a href='javascript:removeProfessor($indice);'><img src='img/icone-remover.png' width='22%' title='Remover'></a>";
          
          echo                    
          "<tr>
            <td>$codigo</td>
            <td align='left'>$nome</td>
            <td>$link_editar $link_remover</td>
          </tr>";     
        }
      ?>

    </table>
  </div>
</div>