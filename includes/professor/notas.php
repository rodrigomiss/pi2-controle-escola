<h3>Notas</h3>
<select id="professor-disciplinas-select" onchange="javascript:alterar_disciplina();"  class="form-control">
  <option selected disabled>Selecione a disciplina</option>
  <?php
    $idx_disciplina = isset($_POST["disciplina"]) ? $_POST["disciplina"] : -1;

    if (isset($_POST["disciplina"])){
      require_once "../funcoes.php";
    }

    $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);

    foreach ($disciplinas as $indice => $disciplina) {
      echo "<option " . ($idx_disciplina == $indice ? "selected" : "") . " value=$indice>$disciplina[disciplina]</option>";
    }
  ?>
</select>
<br/>

<div id="professor-notas-list"class="panel panel-default">
  <div class="panel-heading">Lista de Alunos</div>
  <div class="panel-body">
    <p>Nenhuma disciplina selecionada</p>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>R.A.</th>
      <th>Nome</th>
      <th colspan="2">Nota</th>
      </tr>
    </thead>
    <?php
      $alunos = listData(NOME_SESSAO_ALUNOS);
      $notas = listNotesByDisciplines($idx_disciplina);  

      foreach ($alunos as $indice => $aluno) {
        $notas_aluno = listNotesByStudent($indice, $notas);
    
        echo
        "<tr>
          <td>$aluno[ra]</td>
          <td align=\"left\">$aluno[nome]</td>
          <td>" . number_format($notas_aluno[0]["nota"], 2) . "</td>
          <td><button class=\"btn btn-default btn-xs btn-set-nota\"><span class=\"glyphicon glyphicon-edit\"></span></button></td>
        </tr>";      
      }
    ?>
  </table>
</div>