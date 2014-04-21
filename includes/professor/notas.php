<?php
  $modo = $_POST["modo"];
  $idx_disciplina = isset($_POST["disciplina"]) ? $_POST["disciplina"] : -1;   

  if ($modo == "alterar_disciplina" || $modo == "gravar_alteracao_nota"){
    //ao carregar a pagina com ajax precisa incluir o arquivo funcoes.php
    require_once "../funcoes.php";
  }

  if ($modo == "gravar_alteracao_nota"){
    $idx_aluno = $_POST["aluno"];
    $trabalho = (float) $_POST["trabalho"]; 
    $prova1 = (float) $_POST["prova1"]; 
    $prova2 = (float) $_POST["prova2"]; 
    $alterou_nota = false;       
    $nova_nota = array(
      "aluno" => $idx_aluno,
      "disciplina" => $idx_disciplina,
      "trabalho" => $trabalho,
      "prova1" => $prova1,
      "prova2" => $prova2
    );

    $notas = listData(NOME_SESSAO_NOTAS);    
    //se estiver alterando a nota
    foreach ($notas as $indice => $nota) {
      if ($nota["aluno"] == $idx_aluno && $nota["disciplina"] == $idx_disciplina){
        postData($nova_nota, NOME_SESSAO_NOTAS, $indice);  
        $alterou_nota = true;
        addMsgFlash("<strong>Sucesso!</strong><br>Nota alterada com sucesso!", "sucess");
        break;
      }
    }

    //se estiver cadastrando uma nova nota
    if (!$alterou_nota){
      postData($nova_nota, NOME_SESSAO_NOTAS);  
      addMsgFlash("<strong>Sucesso!</strong><br>Nota cadastrada com sucesso!", "sucess");
    }
  }

  $msg = listMsgFlash();  
  foreach ($msg as $mensagem) {
    echo "<div class='alert flash $mensagem[type]'>$mensagem[msg]</div>";
  }
?>
<h3>Notas</h3>
<select id="professor-disciplinas-select" onchange="javascript:alterar_disciplina();"  class="form-control">
  <option selected disabled>Selecione a disciplina</option>
  <?php
    $idx_login_professor = $_SESSION[NOME_SESSAO_LOGIN_PROFESSORES];
    $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);
    $nome_disciplina_selecionada = ($idx_disciplina > -1) ? $disciplinas[$idx_disciplina]["disciplina"] : "Nenhuma disciplina selecionada";

    foreach ($disciplinas as $indice => $disciplina) {
      if ($disciplina["professor"] == $idx_login_professor){
        echo "<option " . ($idx_disciplina == $indice ? "selected" : "") . " value=$indice>$disciplina[disciplina]</option>";
      }
    }
  ?>
</select>
<br/>

<div id="professor-notas-list" class="panel panel-default">
  <div class="panel-heading">Lista de Alunos</div>
  <div class="panel-body">
    <p><?php echo $nome_disciplina_selecionada; ?></p>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>R.A.</th>
        <th>Nome</th>
        <th colspan="2">Trabalho <?= "(P. ".PESO_TRABALHO.")"?></th>
        <th colspan="2">Prova1 <?= "(P. ".PESO_PROVA1.")"?></th>
        <th colspan="2">Prova2 <?= "(P. ".PESO_PROVA2.")"?></th>
        <th>Média Final</th>
      </tr>
    </thead>
    <?php      
      if ($idx_disciplina > -1){
        $alunos = listData(NOME_SESSAO_ALUNOS);
        $matriculas = listRegistrationByDisciplines($idx_disciplina);
        $notas = listNotesByDisciplines($idx_disciplina);
    
        foreach ($matriculas as $matricula) {
          $idx_aluno = $matricula["aluno"];
          $notas_aluno = listNotesByStudent($idx_aluno, $notas);
          $nota_trabalho = (float) $notas_aluno[0]["trabalho"];
          $nota_prova1 = (float) $notas_aluno[0]["prova1"];
          $nota_prova2 = (float) $notas_aluno[0]["prova2"];
          $media = calcAverage($nota_trabalho, $nota_prova1, $nota_prova2);

          echo
          "<tr>
            <td>".$alunos[$idx_aluno]["ra"]."</td>
            <td align='left'>".$alunos[$idx_aluno]["nome"]."</td>
            <td>
              <div id='trabalho$idx_aluno'>".number_format($nota_trabalho, 2)."</div>
            </td>
            <td>
              <button class='btn btn-default btn-xs btn-set-nota' 
                onClick=\"javascript:mostra_campo_alterar_nota('trabalho$idx_aluno', '$idx_aluno', '$idx_disciplina');\">
                <span class='glyphicon glyphicon-edit'></span>
              </button>
            </td>
            <td>
              <div id='prova1$idx_aluno'>".number_format($nota_prova1, 2)."</div>
            </td>
            <td>
              <button class='btn btn-default btn-xs btn-set-nota' 
                onClick=\"javascript:mostra_campo_alterar_nota('prova1$idx_aluno', '$idx_aluno', '$idx_disciplina');\">
                <span class='glyphicon glyphicon-edit'></span>
              </button>
            </td>
            <td>
              <div id='prova2$idx_aluno'>".number_format($nota_prova2, 2)."</div>
            </td>
            <td>
              <button class='btn btn-default btn-xs btn-set-nota' 
                onClick=\"javascript:mostra_campo_alterar_nota('prova2$idx_aluno', '$idx_aluno', '$idx_disciplina');\">
                <span class='glyphicon glyphicon-edit'></span>
              </button>
            </td>
            <td>".number_format($media,2)."</td>
          </tr>"; 
        }
      }
    ?>
  </table>
</div>