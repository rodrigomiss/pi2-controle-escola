<div id="aluno-disciplinas-list" class="panel panel-default">
  <div class="panel-heading">Disciplinas</div>
  <div class="panel-body">
    <p><?= "Lista das disciplinas do professor <strong>".$_SESSION[NOME_SESSAO_PROFESSORES][$_SESSION[NOME_SESSAO_LOGIN_PROFESSORES]]["nome"].".</strong>"; ?></p>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>Código</th>
      <th>Nome</th>
      </tr>
    </thead>
    <?php
      $idx_login_professor = $_SESSION[NOME_SESSAO_LOGIN_PROFESSORES];
      $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);

      foreach ($disciplinas as $disciplina) {
        if ($disciplina["professor"] == $idx_login_professor){ //lista apenas disciplinas que o professor dá aula
          echo 
          "<tr>
              <td>$disciplina[codigo]</td>
              <td align=left>$disciplina[disciplina]</td>
          </tr>";
        }
      }
    ?>
  </table>
</div>