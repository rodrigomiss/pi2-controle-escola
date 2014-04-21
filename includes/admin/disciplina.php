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
    addMsgFlash("<strong>Sucesso</strong><br>O cadastro da disciplina foi ".($idx_disciplina>-1 ? "alterada" : "realizada")." com sucesso!", "sucess");
    $modo = "listar";
  }elseif ($modo == "remove"){
    removeData(NOME_SESSAO_DISCIPLINAS, $idx_disciplina);
    addMsgFlash("<strong>Sucesso</strong><br>O cadastro da disciplina foi removido com sucesso!", "sucess");
    $modo = "listar";
  }

  $msg = listMsgFlash();  
  foreach ($msg as $mensagem) {
    echo "<div class='alert flash $mensagem[type]'>$mensagem[msg]</div>";
  }
?>

<?php if ($modo == "listar" || $modo == "acessado-pelo-menu-principal"): ?>
  <div id="disciplinas-cadastradas" style="display:visible">
   <div id="disciplinas-cadastradas-list" class="panel panel-default">
      <div class="panel-heading">Disciplinas Cadastradas</div>
      <div class="panel-body">
        <button type="button" onClick="javascript:carregaFormDisciplina('cadastrar', -1);" class="btn btn-default btn-xs btn-novo-cadastro">
          <span class="glyphicon glyphicon glyphicon-plus"></span>
        </button>
        <button type="button" onClick="javascript:carregaFormDisciplina('listar', -1);" class="btn btn-default btn-xs btn-procurar-cadastro">
          <span class="glyphicon glyphicon glyphicon-search"></span>
        </button>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="codigo">Código</th>
            <th>Disciplina</th>
            <th class="opcoes">Opções</th>
          </tr>
        </thead>

        <?php 
          $disciplinas = array();
          $disciplinas = listData(NOME_SESSAO_DISCIPLINAS);

          foreach ($disciplinas as $idx_disciplina => $disciplina){
            $codigo = $disciplina["codigo"];
            $nome_disciplina = $disciplina["disciplina"];
            $link_editar = "<button type='button' onClick='javascript:carregaFormDisciplina(\"editar\", $idx_disciplina);' class='btn btn-default btn-xs btn-editar'><span class='glyphicon glyphicon glyphicon-edit'></span></button>";
            $link_remover = "<button type='button' onClick='javascript:carregaFormDisciplina(\"remove\", $idx_disciplina);' class='btn btn-default btn-xs btn-remover'><span class='glyphicon glyphicon glyphicon-remove'></span></button>";

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
   <div id="cadastro-disciplina-list" class="panel panel-default">
      <div class="panel-heading">Cadastro de Disciplinas</div>
      <div class="panel-body">
        <button type="button" onClick="javascript:carregaFormDisciplina('cadastrar', -1);" class="btn btn-default btn-xs btn-novo-cadastro">
          <span class="glyphicon glyphicon glyphicon-plus"></span>
        </button>
        <button type="button" onClick="javascript:carregaFormDisciplina('listar', -1);" class="btn btn-default btn-xs btn-procurar-cadastro">
          <span class="glyphicon glyphicon glyphicon-search"></span>
        </button>
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
      <button type="button" onclick="javascript:validaCadastro('disciplina');" class="btn btn-default btn-salvar">
        <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
      </button>
      <button type="button" onClick="javascript:carregaFormDisciplina('listar', -1);" class="btn btn-default btn-cancelar">
        <span class="glyphicon glyphicon-remove"></span> Cancelar
      </button>
  </div>
<?php endif; ?>