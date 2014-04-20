<div id="aluno-disciplinas-list" class="panel panel-default">
  <div class="panel-heading">Disciplinas</div>
  <div class="panel-body">
    <p>Lista das disciplinas matriculadas.</p>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>Código</th>
      <th>Nome</th>
      <th>Nota</th>
      </tr>
    </thead>
    <?php
      $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
      require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

      $idx_login_aluno = $_SESSION[NOME_SESSAO_LOGIN_ALUNOS];
      $matriculas = array();
      $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);
      $matriculas = listData(NOME_SESSAO_MATRICULAS);
      $matriculas = listRegistrationByStudent($idx_login_aluno, $matriculas);

      foreach ($matriculas as $matricula) {
        $codigo_disciplina = $disciplinas[$matricula["disciplina"]]["codigo"];;
        $nome_disciplina = $disciplinas[$matricula["disciplina"]]["disciplina"];
        echo 
        "<tr>
          <td>$codigo_disciplina</td>
          <td>$nome_disciplina</td>
          <td>0.00</td>
        </tr>";
      }
    ?>
  </table>
</div>