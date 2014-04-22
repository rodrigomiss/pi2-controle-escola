<?php
  session_start();
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
  $idx_aluno = isset($_POST["id"]) ? (int) $_POST["id"] : -1;

  require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

  if ($modo == "editar"){
    $alunos = listData(NOME_SESSAO_ALUNOS, $idx_aluno);    
    $ra = $alunos["ra"];
    $nome = $alunos["nome"];
    $senha = $alunos["senha"];
  }elseif ($modo == "gravar-cadastro"){
    $alunos = array(
      "ra" => $_POST["ra"],
      "nome" => $_POST["nome"],
      "senha" => $_POST["senha"]
    );  
    $erro = false;
    $idx_aluno_cadastrado = studentExists($_POST["ra"]);
    if($alunos["nome"] == "" || $alunos["ra"] == "" || $alunos["senha"] == ""){
      addMsgFlash("<strong>ERRO</strong><br>Nenhum campo pode ficar vazio", "error");
      $erro = true;
    }
    if(!preg_match('/^[0-9]*$/', $alunos["ra"])){
      addMsgFlash("<strong>ERRO</strong><br>O R.A. deve conter apenas números", "error");
      $erro = true;      
    }
    if ($idx_aluno_cadastrado > -1 && $idx_aluno_cadastrado != $idx_aluno){
      addMsgFlash("<strong>ERRO</strong><br>Já existe outro aluno cadastrado com este R.A", "error");
      $erro = true;
    }
    if (strlen($alunos["senha"]) < 8){
      addMsgFlash("A senha cadastrada é curta. Recomenda-se utilizar pelo menos 8 caracteres na senha.", "warning");
    }
    if ($erro){
      $modo = "editar"; //carrega dos novamente para editar corretamente
      $alunos = listData(NOME_SESSAO_ALUNOS, $idx_aluno);    
      $ra = $alunos["ra"];
      $nome = $alunos["nome"];
      $senha = $alunos["senha"];
    }else{
      postData($alunos, NOME_SESSAO_ALUNOS, $idx_aluno);    
      addMsgFlash("<strong>Sucesso</strong><br>O cadastro do aluno foi ".($idx_aluno>-1 ? "<strong>alterado</strong>" : "realizado")." com sucesso!", "sucess");
      $modo = "listar";
    }
  }elseif ($modo == "remove"){
    removeData(NOME_SESSAO_ALUNOS, $idx_aluno);
    addMsgFlash("<strong>Sucesso</strong><br>O cadastro do aluno foi <strong>removido</strong> com sucesso", "sucess");     
    $modo = "listar";
  }

  $msg = listMsgFlash();  
  foreach ($msg as $mensagem) {
    echo "<div class='alert flash $mensagem[type]'>$mensagem[msg]</div>";
  }
?>

<?php if ($modo == "listar" || $modo == "acessado-pelo-menu-principal"): ?>
  <div id="alunos-cadastrados" style="display:visible">
   <div id="alunos-cadastrados-list" class="panel panel-default">
      <div class="panel-heading">Alunos Cadastrados</div>
      <div class="panel-body">
        <button type="button" onClick="javascript:carregaFormAluno('cadastrar', -1);" class="btn btn-default btn-xs btn-novo-cadastro">
          <span class="glyphicon glyphicon glyphicon-plus"></span>
        </button>
        <button type="button" onClick="javascript:carregaFormAluno('listar', -1);" class="btn btn-default btn-xs btn-procurar-cadastro">
          <span class="glyphicon glyphicon glyphicon-search"></span>
        </button>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="codigo">R.A</th>
            <th>Nome</th>
            <th class="opcoes">Opções</th>
          </tr>
        </thead>

        <?php 
          $alunos = array();
          $alunos = listData(NOME_SESSAO_ALUNOS);

          foreach ($alunos as $idx_aluno => $aluno) {
            $ra = $aluno["ra"];
            $nome = $aluno["nome"];
            $link_editar = "<button type='button' onClick='javascript:carregaFormAluno(\"editar\", $idx_aluno);' class='btn btn-default btn-xs btn-editar'><span class='glyphicon glyphicon glyphicon-edit'></span></button>";
            $link_remover = "<button type='button' onClick='javascript:carregaFormAluno(\"remove\", $idx_aluno);' class='btn btn-default btn-xs btn-remover'><span class='glyphicon glyphicon glyphicon-remove'></span></button>";
            
            echo                    
            "<tr>
              <td>$ra</td>
              <td class='align-left'>$nome</td>
              <td>$link_editar $link_remover</td>
            </tr>";     
          }
        ?>

      </table>
    </div>
  </div>
<?php else:?>
  <div id="cadastro-aluno" style="display:visible">
   <div id="cadastro-aluno-list" class="panel panel-default">
    <div class="panel-heading">Cadastro de Alunos</div>
    <div class="panel-body">
      <button type="button" onClick="javascript:carregaFormAluno('cadastrar', -1);" class="btn btn-default btn-xs btn-novo-cadastro">
          <span class="glyphicon glyphicon glyphicon-plus"></span>
      </button>
      <button type="button" onClick="javascript:carregaFormAluno('listar', -1);" class="btn btn-default btn-xs btn-procurar-cadastro">
          <span class="glyphicon glyphicon glyphicon-search"></span>
      </button>
    </div>
    <input type="hidden" id="id" value="<?= $idx_aluno; ?>">
  
    <div class="input-group">
      <span class="input-group-addon glyphicon">Nome</span>
      <input id="nome" type="text" class="form-control" placeholder="Nome" value="<?= $nome; ?>">
    </div>
    <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo Nome</div>
    <div class="input-group">
      <span class="input-group-addon glyphicon">R.A</span>
      <input id="ra" type="text" class="form-control" placeholder="RA" value="<?= $ra; ?>">
    </div>
    <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo RA</div>
    <div class="input-group">
      <span class="input-group-addon glyphicon">Senha</span>
      <input id="senha" type="password" class="form-control" placeholder="Senha" value="<?= $senha; ?>">
    </div>
    <div class="alert alert-danger danger-senha" style="display:none;">Preencha o campo Senha</div>
    <button type="button" onClick="salvarCadastroAluno();" class="btn btn-default btn-salvar">
      <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
    </button>
    <button type="button" onClick="javascript:carregaFormAluno('listar', -1);" class="btn btn-default btn-cancelar">
      <span class="glyphicon glyphicon-remove"></span> Cancelar
    </button>
  </div>
<?php endif; ?>