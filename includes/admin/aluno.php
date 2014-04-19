<?php
  session_start();
  $modo = isset($_POST["modo"]) ? $_POST["modo"] : "acessado-pelo-menu-principal";
  $idx_aluno = isset($_POST["id"]) ? (int) $_POST["id"] : -1;

  require_once ($modo == "acessado-pelo-menu-principal") ? "includes/funcoes.php" : "../funcoes.php";

  if ($modo == "editar"){
    $alunos = array();
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

    postData($alunos, NOME_SESSAO_ALUNOS, $idx_aluno);    
    $modo = "listar";
  }elseif ($modo == "remove"){
    removeData(NOME_SESSAO_ALUNOS, $idx_aluno);
    $modo = "listar";
  }
?>

<?php if ($modo == "listar" || $modo == "acessado-pelo-menu-principal"): ?>
  <div id="alunos-cadastrados" style="display:visible">
   <div id="alunos-cadastrados-list" class="panel panel-default">
      <div class="panel-heading">Alunos Cadastrados</div>
      <div class="panel-body">
        <a href="javascript:carregaFormAluno('cadastrar', -1);"><img src="img/icone-adicionar" alt="Novo" title="Novo Cadastro"></a>
        <a href="javascript:carregaFormAluno('listar', -1);"><img src="img/icone-procurar" alt="Procurar" title="Listar/Procurar Cadastro"></a>
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
            //$link_editar = "<a href='?modo=editar-aluno&id=$indice&div=admin-alunos'><img src='img/icone-editar.png' width='22%'' title='Editar'></a>";
            //$link_remover = "<a href='?modo=remover-aluno&id=$indice'><img src='img/icone-remover.png' width='22%' title='Remover'></a>";
            $link_editar = "<a href='javascript:carregaFormAluno(\"editar\", $idx_aluno);'><img src='img/icone-editar.png' width='22%'' alt='Editar' title='Editar' caption='$ra'></a>";
            $link_remover = "<a href='javascript:carregaFormAluno(\"remove\", $idx_aluno);'><img src='img/icone-remover.png' width='22%' alt='Remover' title='Remover'></a>";
            
            echo                    
            "<tr>
              <td>$ra</td>
              <td align='left'>$nome</td>
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
    <div class="panel-heading">Cadastrado de Alunos</div>
    <div class="panel-body">
      <a href="javascript:carregaFormAluno('cadastrar', -1);"><img src="img/icone-adicionar" alt="Novo" title="Novo Cadastro"></a>
      <a href="javascript:carregaFormAluno('listar', -1);"><img src="img/icone-procurar" alt="Procurar" title="Listar/Procurar Cadastro"></a>
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
    <button type="button" onClick="javascript:salvarCadastroAluno();" class="btn btn-default btn-salvar">
      <span class="glyphicon glyphicon-floppy-disk"></span> Salvar
    </button>
    <button type="button" onClick="javascript:carregaFormAluno('listar', -1);" class="btn btn-default btn-cancelar">
      <span class="glyphicon glyphicon-remove"></span> Cancelar
    </button>
  </div>
<?php endif; ?>