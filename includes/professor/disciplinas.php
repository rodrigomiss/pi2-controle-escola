<div id="aluno-disciplinas-list" class="panel panel-default">
  <div class="panel-heading">Disciplinas</div>
  <div class="panel-body">
    <p>Lista das disciplinas.</p>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>Código</th>
      <th>Nome</th>
      </tr>
    </thead>
    <?php
      $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);

      foreach ($disciplinas as $disciplina) {
        echo 
        "<tr>
            <td>$disciplina[codigo]</td>
            <td align=left>$disciplina[disciplina]</td>
        </tr>";
      }
    ?>
  </table>
</div>