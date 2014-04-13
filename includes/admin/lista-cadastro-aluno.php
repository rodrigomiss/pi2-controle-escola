<?php
  session_start();

  $modo = $_POST['modo'];
  $indice = $_POST['id'];

  if ($modo == "listar" || $modo == "remove"){
    require_once "../../funcoes-alunos.php";
  }else{
    require_once "funcoes-alunos.php";
  }

  if ($modo == "remove"){
    removeAluno($indice);
  }
?>

<div id="alunos-cadastrados" style="display:visible">
 <div id="alunos-cadastrados-list"class="panel panel-default">
    <div class="panel-heading">Alunos Cadastrados</div>
    <div class="panel-body">
      <a href="javascript:carregaFormEditarAluno(-1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
      <a href="javascript:carregaListaAlunos();"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th width="15%">R.A</th>
          <th>Nome</th>
          <th width="20%">Opções</th>
        </tr>
      </thead>

      <?php 
        $alunos = listaAlunos();

        foreach ($alunos as $indice => $cadastro) {
          $ra = $cadastro["ra"];
          $nome = $cadastro["nome"];
          //$link_editar = "<a href='?modo=editar-aluno&id=$indice&div=admin-alunos'><img src='img/icone-editar.png' width='22%'' title='Editar'></a>";
          //$link_remover = "<a href='?modo=remover-aluno&id=$indice'><img src='img/icone-remover.png' width='22%' title='Remover'></a>";
          $link_editar = "<a href='javascript:carregaFormEditarAluno($indice);'><img src='img/icone-editar.png' width='22%'' title='Editar' caption='$ra'></a>";
          $link_remover = "<a href='javascript:removeAluno($indice);'><img src='img/icone-remover.png' width='22%' title='Remover'></a>";
          
          echo                    
          "<tr>
            <td>$ra</td>
            <td align='left'>$nome</td>
            <td>$link_editar $link_remover</td>
          </tr>";     
        }
      ?>

    </table>
  </div>
</div>