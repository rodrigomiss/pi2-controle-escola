<?php
	function gravarCadastroAluno(array $dados){
		$indice = trim($dados["indice"]);
		$cadastro = array(
			"ra" => $dados["ra"],
			"nome" => $dados["nome"],
			"senha" => $dados["senha"]
		);		

		if ($indice == "-1"){
			$_SESSION["alunos"][] = $cadastro;
		}else{
			$_SESSION["alunos"][$indice] = $cadastro;
		}
	}

	function removeAluno($indice){
		unset($_SESSION["alunos"][$indice]);
	}

	function gerarMenuControle($pagina_atual){
		$paginas = array(
			"Listar" => "?modo=listar-alunos&div=admin-alunos",
			"Cadastrar" => "?modo=cadastrar-aluno&div=admin-alunos"
		);

		echo 
		'<div style="margin-left:20px; width:200px; margin-bottom:10px;">
			<ul class="nav nav-pills">';

			foreach ($paginas as $nome_pagina => $link_pagina) {
				if ($pagina_atual == $nome_pagina){
					echo 
					"<li class=\"active\">
			 			<a href=\"#\">$nome_pagina</a>
					</li>";
				}else{
					echo 
					"<li><a href=\"$link_pagina\">$nome_pagina</a></li>";
				}
			}

		echo
			"</ul>
		</div>";
	}

	function gerarFormularioCadastro($indice_editar = -1){
		if ($indice_editar >= 0){
			$nome = $_SESSION["alunos"][$indice_editar]["nome"];
			$ra = $_SESSION["alunos"][$indice_editar]["ra"];
			$senha = $_SESSION["alunos"][$indice_editar]["senha"];
		}

		echo
		'<h3>Cadastro de Alunos</h3>

		<div class="cadastro-alunos">
		<form name="cadastro-alunos" method="post" action="">
		  <input type="hidden" name="modo" value="gravar-cadastro-aluno">
		  <input type="hidden" name="indice" value="'.$indice_editar.'">

		  <div class="input-group">
		    <span class="input-group-addon glyphicon glyphicon-user"></span>
		    <input id="" name="nome" type="text" class="form-control" placeholder="Nome" value="'.$nome.'">
		  </div>
		  <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo Nome</div>
		  <div class="input-group">
		    <span class="input-group-addon glyphicon glyphicon-user"></span>
		    <input id="" name="ra" type="text" class="form-control" placeholder="RA" value="'.$ra.'">
		  </div>
		  <div class="alert alert-danger danger-usuario" style="display:none">Preencha o campo RA</div>
		  <div class="input-group">
		    <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
		    <input id="admin-senha" name="senha" type="password" class="form-control" placeholder="Senha" value="'.$senha.'">

		  <div class="alert alert-danger danger-senha" style="display:none;">Preencha o campo Senha</div>
		  <button type="submit" id="" class="btn btn-default btn-lg btn-login" onClick="this.submit();">
		    <span class="glyphicon glyphicon-log-out"></span> Salvar
		  </button>
		</form>
		</div>';
	}

	function imprimeListaAlunos(){
		echo
		'<h3>Alunos Cadastrados</h3>
		<div id="lista-alunos">
		  <table class="ls-table">
		    <thead>
		      <tr>
		        <th>R.A</th>
		        <th width="300">Nome</th>
		        <th>Opções</th>
		      </tr>
		    </thead>
		    <tbody>';
				$alunos = $_SESSION["alunos"];

				foreach ($alunos as $indice => $cadastro) {
					$ra = $cadastro["ra"];
					$nome = $cadastro["nome"];
					$link_editar = "<a href='?modo=editar-aluno&id=$indice&div=admin-alunos'>Editar</a>";
					$link_remover = "<a href='?modo=remover-aluno&id=$indice'>Remover</a>";

					echo
					'<tr>
						<td>'.$ra.'</td>
						<td align="left">'.$nome.'</td>
						<td>						
							<div class="btn-group">
							  <button class="btn">Ação</button>
							  <button class="btn dropdown-toggle" data-toggle="dropdown">
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							  	<li>'.$link_remover.'</li>  
							  	<li>'.$link_editar.'</li>  
							  </ul>
							</div>
						</td>
					</tr>';			
				}

		    echo
		    '</tbody>
		  </table>
		</div>';

	}
?>