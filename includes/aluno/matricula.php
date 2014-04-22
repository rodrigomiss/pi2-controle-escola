<?php
  session_start();
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
  $idx_disciplina = isset($_POST["disciplina"]) ? (int) $_POST["disciplina"] : -1;
  require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

  if ($modo == "fazer-matricula"){
    $matricula = array(
      "aluno" => $_POST["aluno"],
      "disciplina" => $idx_disciplina
    );  

    postData($matricula, NOME_SESSAO_MATRICULAS);
    addMsgFlash("<strong>Sucesso</strong><br>Sua matrícula foi realizada com sucesso!", "sucess");
  }

  $msg = listMsgFlash();  
  foreach ($msg as $mensagem) {
    echo "<div class='alert flash $mensagem[type]'>$mensagem[msg]</div>";
  }
?>

<h4>Página de matrícula</h4>
<br/>

<div id="aluno-matricula-list" class="panel panel-default">
  <div class="panel-heading">Disciplinas</div>
  <div class="panel-body">
    <p>Lista das disciplinas disponíveis para matrícula</p>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Professor</th>
        <th>Opção</th>
      </tr>
    </thead>
    <?php
      $idx_login_aluno = $_SESSION[NOME_SESSAO_LOGIN_ALUNOS];
      $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);
      $professores = listData(NOME_SESSAO_PROFESSORES);
      $matriculas = listData(NOME_SESSAO_MATRICULAS);
      $matriculas = listRegistrationByStudent($idx_login_aluno, $matriculas); //array com todas as disciplinas que o aluno esta matriculado
      
      foreach ($disciplinas as $idx_disciplina => $disciplina) {
        $matricula_disciplina = listRegistrationByDisciplines($idx_disciplina, $matriculas);
            
        if (count($matricula_disciplina) <= 0){
          echo 
          "<tr>
              <td>$disciplina[codigo]</td>
              <td class='align-left'>$disciplina[disciplina]</td>
              <td class='align-left'>".$professores[$disciplina["professor"]]["nome"]."</td>
              <td>
                <button class='btn btn-default btn-matricular' 
                  onClick=\"javascript:fazerMatricula('$idx_login_aluno', '$idx_disciplina');\" title='Fazer matrícula'> 
                  <span class=\"glyphicon glyphicon-hand-up\"></span> Matricular-se
                </button>
              </td>
          </tr>";
        }
      }
    ?>
  </table>
</div>