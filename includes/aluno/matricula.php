<div id="aluno-matricula-list" class="panel panel-default">
  <div class="panel-heading">Disciplinas</div>
  <div class="panel-body">
    <p>Lista das disciplinas disponíveis para matrícula</p>
  </div>
  <ul class="list-group">
  <?php
      $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);
      foreach ($disciplinas as $disciplina) {
        echo "
        <li class='list-group-item'>
          <h4 class='list-group-item-heading'>$disciplina[disciplina]</h4>
          <p class='list-group-item-text'>Código: $disciplina[codigo]</p>
          <p class='list-group-item-text'>Professor: $disciplina[professor]</p>
          <p class='list-group-item-text'><button class=\"btn btn-default btn-matricular\" onClick=\"\"><span class=\"glyphicon glyphicon-hand-up\"></span> Matricular-se</button></p>
        </li>";
      }
    ?>

  </ul>
</div>