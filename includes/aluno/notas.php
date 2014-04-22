<?php
  session_start();
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
  require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

  $idx_login_aluno = $_SESSION[NOME_SESSAO_LOGIN_ALUNOS];
  $idx_disciplina = isset($_POST["disciplina"]) ? (int) $_POST["disciplina"] : -1;
?>

<h3>Notas</h3>
<select id="aluno-disciplinas-select" onchange="javascript:alterar_disciplina_aluno();"  class="form-control">
  <option selected disabled>Selecione a disciplina</option>
  <?php
    $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);
    $matriculas = listRegistrationByStudent($idx_login_aluno);
    $nome_disciplina_selecionada = ($idx_disciplina > -1) ? $disciplinas[$idx_disciplina]["disciplina"] : "Nenhuma disciplina selecionada";

    foreach ($matriculas as $matricula){
      echo "<option " . ($idx_disciplina == $matricula["disciplina"] ? "selected" : "") . " value=".$matricula["disciplina"].">".$disciplinas[$matricula["disciplina"]]["disciplina"]."</option>";
    }
  ?>
</select>
<br/>
<button class="btn btn-default btn-xs btn-refresh">
  <span class="glyphicon glyphicon-refresh"></span> Atualizar
</button>
<br/>
<span class="info-gray">*Caso alguma disciplina não apareça, atualize a página.</span>
<br/><br/>

<div id="aluno-notas-list" class="panel panel-default">
  <div class="panel-heading">Lista das Notas</div>
  <div class="panel-body">
    <p><?php echo $nome_disciplina_selecionada; ?></p>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Trabalho <?= "(Peso ".PESO_TRABALHO.")"?></th> 
        <th>Prova1 <?= "(Peso ".PESO_PROVA1.")"?></th>
        <th>Prova2 <?= "(Peso ".PESO_PROVA2.")"?></th>
        <th>Média Final</th>
      </tr>
    </thead>
    <?php   
      if ($idx_disciplina > -1){
        $notas = listNotesByDisciplines($idx_disciplina);
        $notas = listNotesByStudent($idx_login_aluno, $notas);    
      
        $nota_trabalho = (float) $notas[0]["trabalho"];
        $nota_prova1 = (float) $notas[0]["prova1"];
        $nota_prova2 = (float) $notas[0]["prova2"];
        $media = calcAverage($nota_trabalho, $nota_prova1, $nota_prova2);

        echo
        "<tr>
          <td>".number_format($nota_trabalho, 2)."</td>
          <td>".number_format($nota_prova1, 2)."</td>
          <td>".number_format($nota_prova2, 2)."</td>
          <td>".number_format($media,2)."</td>
        </tr>"; 
      }
    ?>
  </table>
</div>