<?php
  session_start();
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
  $idx_disciplina = isset($_POST["id"]) ? (int) $_POST["id"] : -1;

  require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

  if ($modo == "editar"){
    $disciplinas = array();
    $disciplinas = listData(NOME_SESSAO_DISCIPLINAS, $idx_disciplina);    
    $codigo = $disciplinas["codigo"];
    $nome_disciplina = $disciplinas["disciplina"];
    $professor_disciplina = $disciplinas["professor"];
  }elseif ($modo == "gravar-cadastro"){
    $disciplinas = array(
      "codigo" => $_POST["codigo"],
      "disciplina" => $_POST["disciplina"],
      "professor" => $_POST["professor"]
    );  

    postData($disciplinas, NOME_SESSAO_DISCIPLINAS, $idx_disciplina);    
    $modo = "listar";
  }elseif ($modo == "remove"){
    removeData(NOME_SESSAO_DISCIPLINAS, $idx_disciplina);
    $modo = "listar";
  }
?>

<?php if ($modo == "listar" || $modo == "acessado-pelo-menu-principal"): ?>
  <div id="disciplinas-cadastradas" style="display:visible">
   <div id="disciplinas-cadastradas-list"class="panel panel-default">
      <div class="panel-heading">Disciplinas Cadastradas</div>
      <div class="panel-body">
        <a href="javascript:carregaFormDisciplina('cadastrar', -1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
        <a href="javascript:carregaFormDisciplina('listar', -1);"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="15%">Código</th>
            <th>Disciplina</th>
            <th width="20%">Opções</th>
          </tr>
        </thead>

        <?php 
          $disciplinas = array();
          $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);

          foreach ($disciplinas as $idx_disciplina => $disciplina){
            $codigo = $disciplina["codigo"];
            $nome_disciplina = $disciplina["disciplina"];
            $link_editar = "<a href='javascript:carregaFormDisciplina(\"editar\", $idx_disciplina);'><img src='img/icone-editar.png' width='22%'' title='Editar'></a>";
            $link_remover = "<a href='javascript:carregaFormDisciplina(\"remove\", $idx_disciplina);'><img src='img/icone-remover.png' width='22%' title='Remover'></a>";
            
            echo                    
            "<tr>
              <td>$codigo</td>
              <td align='left'>$nome_disciplina</td>
              <td>$link_editar $link_remover</td>
            </tr>";     
          }
        ?>

      </table>
    </div>
  </div>
<?php else: ?>
  <div id="cadastro-disciplina" style="display:visible">
   <div id="cadastro-disciplina-list"class="panel panel-default">
      <div class="panel-heading">Cadastro de Disciplinas</div>
      <div class="panel-body">
        <a href="javascript:carregaFormDisciplina('cadastrar', -1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
        <a href="javascript:carregaFormDisciplina('listar', -1);"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
      </div>
      
      <input type="hidden" id="id" value="<?= $idx_disciplina; ?>">    
      <div class="input-group">
        <span class="input-group-addon glyphicon">Código</span>
        <input id="codigo" type="text" class="form-control" placeholder="Código" value="<?= $codigo; ?>">
      </div>
      <div class="alert alert-danger danger-disciplina" style="display:none">Preencha o campo Código</div>
      <div class="input-group">
        <span class="input-group-addon glyphicon">Disciplina</span>
        <input id="disciplina" type="text" class="form-control" placeholder="Disciplina" value="<?= $nome_disciplina; ?>">
      </div>
      <div class="alert alert-danger danger-disciplina" style="display:none">Preencha o campo Disciplina</div>
      <div class="input-group">
        <span class="input-group-addon glyphicon">Professor</span>
        <select id="professor" class="form-control">
          <option selected disabled>Selecione um professor</option>
          <?php
            $professores = array();
            $professores = listData(NOME_SESSAO_PROFESSORES);


            foreach ($professores as $idx_professor => $professor) {
              echo 
              "<option " .
                ($modo == "editar" && $professor_disciplina == $idx_professor ? "selected" : "") . 
                " value='$idx_professor'>$professor[nome]
              </option>";
            }
          ?>
        </select>
      </div>
      <div class="alert alert-danger danger-professor" style="display:none">Preencha o campo Professor</div>      
      <button type="button" onclick="javascript:salvarCadastroDisciplina();" class="btn btn-default btn-salvar">
        <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
      </button>
  </div>
<?php endif; ?>