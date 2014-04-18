<?php
  session_start();
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
  $idx_professor = isset($_POST["id"]) ? (int) $_POST["id"] : -1;

  require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

  if ($modo == "editar"){
    $professores = array();
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

    postData($professores, NOME_SESSAO_PROFESSORES, $idx_professor);    
    $modo = "listar";
  }elseif ($modo == "remove"){
    removeData(NOME_SESSAO_PROFESSORES, $idx_professor);
    $modo = "listar";
  }
?>

<?php if ($modo == "listar" || $modo == "acessado-pelo-menu-principal"): ?>
  <div id="professores-cadastrados" style="display:visible">
   <div id="professores-cadastrados-list"class="panel panel-default">
      <div class="panel-heading">Professores Cadastrados</div>
      <div class="panel-body">
        <a href="javascript:carregaFormProfessor('cadastrar', -1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
        <a href="javascript:carregaFormProfessor('listar', -1);"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="15%">Código</th>
            <th>Nome</th>
            <th width="20%">Opções</th>
          </tr>
        </thead>

        <?php           
          $professores = array(); 
          $professores = listData(NOME_SESSAO_PROFESSORES);

          foreach ($professores as $idx_professor => $cadastro) {
            $codigo = $cadastro["codigo"];
            $nome = $cadastro["nome"];
            $link_editar = "<a href='javascript:carregaFormProfessor(\"editar\", $idx_professor);'><img src='img/icone-editar.png' width='22%'' title='Editar' caption='$ra'></a>";
            $link_remover = "<a href='javascript:carregaFormProfessor(\"remove\", $idx_professor);'><img src='img/icone-remover.png' width='22%' title='Remover'></a>";
            
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
   <div id="cadastro-professor-list"class="panel panel-default">
      <div class="panel-heading">Cadastrado de Professores</div>
      <div class="panel-body">
        <a href="javascript:carregaFormProfessor('cadastrar', -1);"><img src="img/icone-adicionar" title="Novo Cadastro"></a>
        <a href="javascript:carregaFormProfessor('listar', -1);"><img src="img/icone-procurar" title="Listar/Procurar Cadastro"></a>
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
        <button type="button" onclick="javascript:salvarCadastroProfessor();" class="btn btn-default btn-salvar">
          <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
        </button>
    </form>
  </div>
<?php endif; ?>