<h3>Notas</h3>
<select id="professor-disciplinas-select" onchange="javascript:alterar_disciplina();"  class="form-control">
  <option selected disabled>Selecione a disciplina</option>
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

      $notas = array();
      $notas = listData(NOME_SESSAO_NOTAS);
      
      //se estiver alterando a nota
      foreach ($notas as $indice => $nota) {
        if ($nota["aluno"] == $idx_aluno && $nota["disciplina"] == $idx_disciplina){
          postData($nova_nota, NOME_SESSAO_NOTAS, $indice);  
          $alterou_nota = true;
          break;
        }
      }

      //se estiver cadastrando uma nova nota
      if (!$alterou_nota) postData($nova_nota, NOME_SESSAO_NOTAS);  
    }

    $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);
    $nome_disciplina_selecionada = ($idx_disciplina > -1) ? $disciplinas[$idx_disciplina]["disciplina"] : "Nenhuma disciplina selecionada";

    foreach ($disciplinas as $indice => $disciplina) {
      echo "<option " . ($idx_disciplina == $indice ? "selected" : "") . " value=$indice>$disciplina[disciplina]</option>";
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
        <th colspan="2">Trabalho</th>
        <th colspan="2">Prova1</th>
        <th colspan="2">Prova2</th>
      </tr>
    </thead>
    <?php      
      if ($idx_disciplina > -1){
        $alunos = listData(NOME_SESSAO_ALUNOS);
        $notas = listNotesByDisciplines($idx_disciplina);  

        foreach ($alunos as $idx_aluno => $aluno) {
          $notas_aluno = listNotesByStudent($idx_aluno, $notas);
          echo
          "<tr>
            <td>$aluno[ra]</td>
            <td align='left'>$aluno[nome]</td>
            <td>
              <div id='trabalho" . $idx_aluno . "'>" . number_format($notas_aluno[0]["trabalho"], 2) . "</div>
            </td>
            <td>
              <button class=\"btn btn-default btn-xs btn-set-nota\" 
                onClick=\"javascript:mostra_campo_alterar_nota('trabalho$idx_aluno', '$idx_aluno', '$idx_disciplina');\">
                <span class=\"glyphicon glyphicon-edit\"></span>
              </button>
            </td>
            <td>
              <div id='prova1" . $idx_aluno . "'>" . number_format($notas_aluno[0]["prova1"], 2) . "</div>
            </td>
            <td>
              <button class=\"btn btn-default btn-xs btn-set-nota\" 
                onClick=\"javascript:mostra_campo_alterar_nota('prova1$idx_aluno', '$idx_aluno', '$idx_disciplina');\">
                <span class=\"glyphicon glyphicon-edit\"></span>
              </button>
            </td>
            <td>
              <div id='prova2" . $idx_aluno . "'>" . number_format($notas_aluno[0]["prova2"], 2) . "</div>
            </td>
            <td>
              <button class=\"btn btn-default btn-xs btn-set-nota\" 
                onClick=\"javascript:mostra_campo_alterar_nota('prova2$idx_aluno', '$idx_aluno', '$idx_disciplina');\">
                <span class=\"glyphicon glyphicon-edit\"></span>
              </button>
            </td>
          </tr>";  
        }
      }
    ?>
  </table>
</div>