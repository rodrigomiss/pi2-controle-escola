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
      <th>Professor</th>
      <th>Nota</th>
      </tr>
    </thead>
    <?php
      $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
      require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

      $idx_login_aluno = $_SESSION[NOME_SESSAO_LOGIN_ALUNOS];      
      $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);
      $professores = listData(NOME_SESSAO_PROFESSORES);
      $matriculas = listData(NOME_SESSAO_MATRICULAS);
      $matriculas = listRegistrationByStudent($idx_login_aluno, $matriculas);

      foreach ($matriculas as $matricula) {
        $codigo_disciplina = $disciplinas[$matricula["disciplina"]]["codigo"];;
        $nome_disciplina = $disciplinas[$matricula["disciplina"]]["disciplina"];
        $professor = $professores[$disciplinas[$matricula["disciplina"]]["professor"]]["nome"];

        $notas = listNotesByDisciplines($matricula["disciplina"]);
        $notas = listNotesByStudent($idx_login_aluno, $notas);
        $nota_trabalho = (float) $notas[0]["trabalho"];
        $nota_prova1 = (float) $notas[0]["prova1"];
        $nota_prova2 = (float) $notas[0]["prova2"];
        $media = calcAverage($nota_trabalho, $nota_prova1, $nota_prova2);

        echo 
        "<tr>
          <td>$codigo_disciplina</td>
          <td>$nome_disciplina</td>
          <td>$professor</td>
          <td>".number_format($media,2)."</td>
        </tr>";
      }
    ?>
  </table>
</div>