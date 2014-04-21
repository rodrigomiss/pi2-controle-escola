<?php
  session_start();
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
  require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

  $idx_disciplina = isset($_POST["disciplina"]) ? (int) $_POST["disciplina"] : -1;
?>

<h3>Notas</h3>
<select id="admin-disciplinas-select" onchange="javascript:alterar_disciplina_admin();"  class="form-control">
  <option selected disabled>Selecione a disciplina</option>
  <?php
    $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);
    $nome_disciplina_selecionada = ($idx_disciplina > -1) ? $disciplinas[$idx_disciplina]["disciplina"] : "Nenhuma disciplina selecionada";

    foreach ($disciplinas as $indice => $disciplina){
      echo "<option " . ($idx_disciplina == $indice ? "selected" : "") . " value=$indice>".$disciplina["disciplina"]."</option>";
    }
  ?>
</select>
<br/>

<div id="admin-notas-list" class="panel panel-default">
  <div class="panel-heading">Lista das Notas</div>
  <div class="panel-body">
    <p><?php echo $nome_disciplina_selecionada; ?></p>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>R.A</th>
        <th>Aluno</th>
        <th>Trabalho <?= "(Peso ".PESO_TRABALHO.")"?></th> 
        <th>Prova1 <?= "(Peso ".PESO_PROVA1.")"?></th>
        <th>Prova2 <?= "(Peso ".PESO_PROVA2.")"?></th>
        <th>Média Final</th>
      </tr>
    </thead>
    <?php   
      if ($idx_disciplina > -1){ 
        $alunos = listData(NOME_SESSAO_ALUNOS);
        $matriculas = listRegistrationByDisciplines($idx_disciplina);
        $notas = listNotesByDisciplines($idx_disciplina);
      
        foreach ($matriculas as $matricula){
          $notas_aluno = listNotesByStudent($matricula["aluno"], $notas);
          $nota_trabalho = (float) $notas_aluno[0]["trabalho"];
          $nota_prova1 = (float) $notas_aluno[0]["prova1"];
          $nota_prova2 = (float) $notas_aluno[0]["prova2"];
          $media = calcAverage($nota_trabalho, $nota_prova1, $nota_prova2);

          echo
          "<tr>
            <td>".$alunos[$matricula["aluno"]]["ra"]."</td>
            <td>".$alunos[$matricula["aluno"]]["nome"]."</td>
            <td>".number_format($nota_trabalho, 2)."</td>
            <td>".number_format($nota_prova1, 2)."</td>
            <td>".number_format($nota_prova2, 2)."</td>
            <td>".number_format($media,2)."</td>
          </tr>"; 
        }
      }
    ?>
  </table>
</div>