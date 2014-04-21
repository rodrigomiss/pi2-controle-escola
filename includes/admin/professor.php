<?php
  session_start();
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
  $idx_professor = isset($_POST["id"]) ? (int) $_POST["id"] : -1;

  require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

  if ($modo == "editar"){
    $professores = listData(NOME_SESSAO_PROFESSORES, $idx_professor);    
    $codigo = $professores["codigo"];
    $nome = $professores["nome"];
    $senha = $professores["senha"];
  }elseif ($modo == "gravar-cadastro"){
    $professores = array(
      "codigo" => $_POST["codigo"],
      "nome" => $_POST["nome"],
      "senha" => $_POST["senha"]
    );  

    $idx_professor_cadastrado = teacherExists($_POST["codigo"]);
    if ($idx_professor_cadastrado > -1 && $idx_professor_cadastrado != $idx_professor){
      addMsgFlash("<strong>ERRO</strong><br>Já existe outro professor cadastrado com este código!", "error");
      $modo = "editar"; //carrega dados novamente para editar corretamente
      $professores = listData(NOME_SESSAO_PROFESSORES, $idx_professor);    
      $codigo = $professores["codigo"];
      $nome = $professores["nome"];
      $senha = $professores["senha"];
    }else{
      postData($professores, NOME_SESSAO_PROFESSORES, $idx_professor);  
      addMsgFlash("<strong>Sucesso</strong><br>O cadastro do professor foi ".($idx_professor>-1 ? "alterado" : "realizado")." com sucesso!", "sucess");
      $modo = "listar"; //muda modo para lista após salvar
    }
  }elseif ($modo == "remove"){
    removeData(NOME_SESSAO_PROFESSORES, $idx_professor);
    addMsgFlash("<strong>Removido!</strong><br>O cadastro do professor foi removido com sucesso!", "sucess");
    $modo = "listar";
  }

  $msg = listMsgFlash();  
  foreach ($msg as $mensagem) {
    echo "<div class='alert flash $mensagem[type]'>$mensagem[msg]</div>";
  }
?>

<?php if ($modo == "listar" || $modo == "acessado-pelo-menu-principal"): ?>
  <div id="professores-cadastrados" style="display:visible">
   <div id="professores-cadastrados-list" class="panel panel-default">
      <div class="panel-heading">Professores Cadastrados</div>
      <div class="panel-body">
        <button type="button" onClick="javascript:carregaFormProfessor('cadastrar', -1);" class="btn btn-default btn-xs btn-novo-cadastro">
          <span class="glyphicon glyphicon glyphicon-plus"></span>
        </button>
        <button type="button" onClick="javascript:carregaFormProfessor('listar', -1);" class="btn btn-default btn-xs btn-procurar-cadastro">
          <span class="glyphicon glyphicon glyphicon-search"></span>
        </button>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class"codigo">Código</th>
            <th>Nome</th>
            <th class="opcoes">Opções</th>
          </tr>
        </thead>

        <?php           
          $professores = array(); 
          $professores = listData(NOME_SESSAO_PROFESSORES);

          foreach ($professores as $idx_professor => $cadastro) {
            $codigo = $cadastro["codigo"];
            $nome = $cadastro["nome"];
            $link_editar = "<button type='button' onClick='javascript:carregaFormProfessor(\"editar\", $idx_professor);' class='btn btn-default btn-xs btn-editar'><span class='glyphicon glyphicon glyphicon-edit'></span></button>";
            $link_remover = "<button type='button' onClick='javascript:carregaFormProfessor(\"remove\", $idx_professor);' class='btn btn-default btn-xs btn-remover'><span class='glyphicon glyphicon glyphicon-remove'></span></button>";            
            echo                    
            "<tr>
              <td>$codigo</td>
              <td align='left'>$nome</td>
              <td>$link_editar $link_remover</td>
            </tr>";     
          }
        ?>

      </table>
    </div>
  </div>
<?php else:?>
  <div id="cadastro-professor" style="display:visible">
   <div id="cadastro-professor-list" class="panel panel-default">
      <div class="panel-heading">Cadastrado de Professores</div>
      <div class="panel-body">
        <button type="button" onClick="javascript:carregaFormProfessor('cadastrar', -1);" class="btn btn-default btn-xs btn-novo-cadastro">
          <span class="glyphicon glyphicon glyphicon-plus"></span>
        </button>
        <button type="button" onClick="javascript:carregaFormProfessor('listar', -1);" class="btn btn-default btn-xs btn-procurar-cadastro">
          <span class="glyphicon glyphicon glyphicon-search"></span>
        </button>
      </div>
      <form name="cadastro-professor-form" id="cadastro-professor-form" method="post">
        <input type="hidden" id="indice" value="<?= $idx_professor; ?>">
      
        <div class="input-group">
          <span class="input-group-addon glyphicon">Nome</span>
          <input id="nome" type="text" class="form-control" placeholder="Nome" value="<?= $nome; ?>">
        </div>
        <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo Nome</div>
        <div class="input-group">
          <span class="input-group-addon glyphicon">Código</span>
          <input id="codigo" type="text" class="form-control" placeholder="Código" value="<?= $codigo; ?>">
        </div>
        <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo Código</div>
        <div class="input-group">
          <span class="input-group-addon glyphicon">Senha</span>
          <input id="senha" type="password" class="form-control" placeholder="Senha" value="<?= $senha; ?>">
        </div>
        <div class="alert alert-danger danger-senha" style="display:none;">Preencha o campo Senha</div>
        <button type="button" onclick="javascript:validaCadastro('professor');" class="btn btn-default btn-salvar">
          <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
        </button>
      <button type="button" onClick="javascript:carregaFormProfessor('listar', -1);" class="btn btn-default btn-cancelar">
        <span class="glyphicon glyphicon-remove"></span> Cancelar
      </button>
    </form>
  </div>
<?php endif; ?>