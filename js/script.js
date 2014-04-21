
$("#btn-aluno").click(function(event){
 	event.preventDefault();
 	hideLogins();
 	$("#login-aluno").show("fast");
 	$("#main-title").text("Área do Aluno");
 	cleanCss();
 });

$("#btn-professor").click(function(event){
 	event.preventDefault();
 	hideLogins();
 	$("#login-professor").show("fast");
  	$("#main-title").text("Área do Professor");
 	cleanCss();
 });

$("#btn-admin").click(function(event){
 	event.preventDefault();
 	hideLogins();
 	$("#login-admin").show("fast");
  	$("#main-title").text("Área do Administrador");
 	cleanCss();
 });

$("#btn-login-aluno").click(function(){
	validaLogin('aluno');
});

$("#btn-login-professor").click(function(){
	validaLogin('professor');
});

$("#btn-login-admin").click(function(){
	validaLogin('admin');
});

$("#btn-aluno-inicial").click(function(event){
 	event.preventDefault();
 	hideDivs('aluno');
 	$("#aluno-inicial").fadeIn("fast");
 });

$("#btn-aluno-disciplinas").click(function(event){
 	event.preventDefault();
 	hideDivs('aluno');
 	$("#aluno-disciplinas").fadeIn("fast");
  	$("#btn-aluno-disciplinas").parent().addClass("active");
 });

$("#btn-aluno-matricula").click(function(event){
 	event.preventDefault();
 	hideDivs('aluno');
 	$("#aluno-matricula").fadeIn("fast");
  	$("#btn-aluno-matricula").parent().addClass("active");
 });

$("#btn-aluno-notas").click(function(event){
 	event.preventDefault();
 	hideDivs('aluno');
 	$("#aluno-notas").fadeIn("fast");
 	$("#btn-aluno-notas").parent().addClass("active");
 });

$("#btn-aluno-sair").click(function(event){
 	event.preventDefault();
 	hideDivs('aluno');
	$("#main").hide("slow");
	$("#container-aluno").append("<h2>Saindo do Sistema</h2>");
	$("#btn-aluno-sair").parent().addClass("active");

	$.post("login.php", {modo: "logout-aluno"},
		function(){
			setTimeout(function() {window.location.href = 'index.html'}, 800);
		}
	);
 });

$("#btn-professor-inicial").click(function(event){
 	event.preventDefault();
 	hideDivs('professor');
 	$("#professor-inicial").fadeIn("fast");
 });

$("#btn-professor-disciplinas").click(function(event){
 	event.preventDefault();
 	hideDivs('professor');
 	$("#professor-disciplinas").fadeIn("fast");
  	$("#btn-professor-disciplinas").parent().addClass("active");
 });

$("#btn-professor-notas").click(function(event){
 	event.preventDefault();
 	hideDivs('professor');
 	$("#professor-notas").fadeIn("fast");
 	$("#btn-professor-notas").parent().addClass("active");
 });

$("#btn-professor-sair").click(function(event){
 	event.preventDefault();
 	hideDivs('professor');
	$("#main").hide("slow");
	$("#container-professor").append("<h2>Saindo do Sistema</h2>");
	$("#btn-professor-sair").parent().addClass("active");
	$("#btn-admin-sair").parent().addClass("active");

	$.post("login.php", {modo: "logout-professor"},
		function(){
			setTimeout(function() {window.location.href = 'index.html'}, 800);
		}
	);
 });

$("#btn-admin-inicial").click(function(event){
 	event.preventDefault();
	hideDivs('admin');
 	$("#admin-inicial").fadeIn("fast");
 });

$("#btn-admin-alunos").click(function(event){
 	event.preventDefault();
	hideDivs('admin');
 	$("#admin-alunos").fadeIn("fast");
  	$("#btn-admin-alunos").parent().addClass("active");
 });

$("#btn-admin-professores").click(function(event){
 	event.preventDefault();
 	hideDivs('admin');
 	$("#admin-professores").fadeIn("fast");
 	$("#btn-admin-professores").parent().addClass("active");

 });

$("#btn-admin-disciplinas").click(function(event){
 	event.preventDefault();
 	hideDivs('admin');
 	$("#admin-disciplinas").fadeIn("fast");
 	$("#btn-admin-disciplinas").parent().addClass("active");
 });

$("#btn-admin-notas").click(function(event){
 	event.preventDefault();
 	hideDivs('admin');
 	$("#admin-notas").fadeIn("fast");
 	$("#btn-admin-notas").parent().addClass("active");
 });

$("#btn-admin-sair").click(function(event){
 	event.preventDefault();
 	hideDivs('admin');
 	$("#btn-professor-sair").parent().addClass("active");
	$("#main").hide("slow");
	$("#container-admin").append("<h2>Saindo do Sistema</h2>");
	
	$.post("login.php", {modo: "logout-admin"},
		function(){
			setTimeout(function() {window.location.href = 'index.html'}, 800);
		}
	);
 });

function cleanCss(){
 	$("#aluno-usuario").css("border-color", "");
 	$("#aluno-senha").css("border-color", "");
  	$("#professor-usuario").css("border-color", "");
 	$("#professor-senha").css("border-color", "");
  	$("#admin-usuario").css("border-color", "");
 	$("#admin-senha").css("border-color", "");
 	$(".danger-usuario").text("");
 	$(".danger-usuario").hide("fast");
 	$(".danger-usuario").text("");
 	$(".danger-senha").hide("fast");
}

function hideLogins(){
 	$("#login-aluno").hide("fast");
 	$("#login-professor").hide("fast");
 	$("#login-admin").hide("fast");
}

function hideDivs(type){
	if (type == 'aluno'){
		$("#aluno-inicial").hide("fast");
	 	$("#aluno-disciplinas").hide("fast");
	 	$("#aluno-matricula").hide("fast");
	 	$("#aluno-notas").hide("fast");
	  	$("#btn-aluno-disciplinas").parent().removeClass("active");
	  	$("#btn-aluno-matricula").parent().removeClass("active");
	  	$("#btn-aluno-matricula").parent().removeClass("active");
	 	$("#btn-aluno-notas").parent().removeClass("active");

	}else if (type == 'professor'){
		$("#professor-inicial").hide("fast");
	 	$("#professor-disciplinas").hide("fast");
	 	$("#professor-notas").hide("fast");
	  	$("#btn-professor-disciplinas").parent().removeClass("active");
	 	$("#btn-professor-notas").parent().removeClass("active");

	}else if (type == 'admin'){
	 	$("#admin-inicial").hide("fast");
	 	$("#admin-alunos").hide("fast");
	 	$("#admin-professores").hide("fast");
	 	$("#admin-disciplinas").hide("fast");
	 	$("#admin-notas").hide("fast");
	  	$("#btn-admin-alunos").parent().removeClass("active");
	 	$("#btn-admin-professores").parent().removeClass("active");
	 	$("#btn-admin-disciplinas").parent().removeClass("active");
	 	$("#btn-admin-notas").parent().removeClass("active");
	}
}

function load(){
 	event.preventDefault();
 	$("#container").fadeIn("slow");
 	$("#login-aluno").show("fast");
  	$("#main-title").text("Área do Aluno");
  	$("#btn-aluno").focus();
};

function loadaluno(){
 	event.preventDefault();
 	$("#container-aluno").fadeIn("slow");
 	$("#aluno-inicial").show("fast");
};

function loadprofessor(){
 	event.preventDefault();
 	$("#container-professor").fadeIn("slow");
 	$("#professor-inicial").show("fast");
};

function loadadmin(){
 	event.preventDefault();
 	$("#container-admin").fadeIn("slow");
 	$("#admin-inicial").show("fast");
};

function validaLogin(login){
	usuariovalido = false;
	senhavalida = false

	if (login == 'aluno') {
		$.post(
			"login.php",
			{modo: "login-aluno", ra: $("#aluno-usuario").val(), senha: $("#aluno-senha").val()},
			function(retorno){
				if ($("#aluno-usuario").val() == "" || retorno == "ERROUSUARIO"){
					$(".danger-usuario").text("Usuário incorreto");
					$(".danger-usuario").show("fast");
					$("#aluno-usuario").css("border-color", "#a94442");
				}else{
					$(".danger-usuario").hide("fast");
					$("#aluno-usuario").css("border-color", "");
					usuariovalido = true;
				}
				if ($("#aluno-senha").val() == "" || retorno == "ERROSENHA"){
					$(".danger-senha").text("Senha incorreta");
					$(".danger-senha").show("fast");
					$("#aluno-senha").css("border-color", "#a94442");
				}else{
					$(".danger-senha").hide("fast");
					$("#aluno-senha-senha").css("border-color", "");
					senhavalida = true;
				}
				if (retorno == "OK"){
					$("#main").hide("slow");
					$("#container").append("<h2>Acessando o sistema</h2>");
					setTimeout(function() {window.location.href = 'aluno.php'}, 800);	
				}
			}

		);
	}else if(login == 'professor'){
		$.post(
			"login.php", 
			{modo: "login-professor", usuario: $("#professor-usuario").val(), senha: $("#professor-senha").val() }, 
			function(retorno){
				if ($("#professor-usuario").val() == "" || retorno == "ERROUSUARIO"){
					$(".danger-usuario").text("Usuário incorreto");
					$(".danger-usuario").show("fast");
					$("#professor-usuario").css("border-color", "#a94442");
				}else{
					$(".danger-usuario").hide("fast");
					$("#professor-usuario").css("border-color", "");
					usuariovalido = true;
				}
				if ($("#professor-senha").val() == "" || retorno == "ERROSENHA"){
					$(".danger-senha").text("Senha incorreta");
					$(".danger-senha").show("fast");
					$("#professor-senha").css("border-color", "#a94442");
				}else{
					$(".danger-senha").hide("fast");
					$("#professor-senha").css("border-color", "");
					senhavalida = true;
				}
				if (retorno == "OK"){
					$("#main").hide("slow");
					$("#container").append("<h2>Acessando o sistema</h2>");
					setTimeout(function() {window.location.href = 'professor.php'}, 800);	
				}
			}
		);	
	}else if(login == 'admin'){
		$.post(
			"login.php", 
			{modo: "login-admin", usuario: $("#admin-usuario").val(), senha: $("#admin-senha").val() }, 
			function(retorno){
				if ($("#admin-usuario").val() == "" || retorno == "ERROUSUARIO"){
					$(".danger-usuario").text("Usuário incorreto");
					$(".danger-usuario").show("fast");
					$("#admin-usuario").css("border-color", "#a94442");
				}else{
					$(".danger-usuario").hide("fast");
					$("#admin-usuario").css("border-color", "");
					usuariovalido = true;
				}
				if ($("#admin-senha").val() == "" || retorno == "ERROSENHA"){
					$(".danger-senha").text("Senha incorreta");
					$(".danger-senha").show("fast");
					$("#admin-senha").css("border-color", "#a94442");
				}else{
					$(".danger-senha").hide("fast");
					$("#admin-senha").css("border-color", "");
					senhavalida = true;
				}
				if (retorno == "OK"){
					$("#main").hide("slow");
					$("#container").append("<h2>Acessando o sistema</h2>");
					setTimeout(function() {window.location.href = 'admin.php'}, 800);	
				}
			}
		);	
	}
};

/*cadastro de alunos da area admin */
function carregaFormAluno(varModo, varIndice){
	$.post(
		"includes/admin/aluno.php", {modo: varModo, id: varIndice},
		function(retorno){
			$("#retorno_ajax_aluno").html(retorno);
		}
	);
}

function salvarCadastroAluno(){
	$.post(
		"includes/admin/aluno.php", 
		{
			modo: "gravar-cadastro",
			id: $("#id").val(),
			nome: $("#nome").val(),
			ra: $("#ra").val(),
			senha: $("#senha").val()
		},

		function(retorno){
			$("#retorno_ajax_aluno").html(retorno);	
		}		
	);
}


/*cadastro de professor na area admin*/
function carregaFormProfessor(varModo, varIndice){
	$.post(
		"includes/admin/professor.php", {modo: varModo, id: varIndice},
		function(retorno){
			$("#retorno_ajax_professor").html(retorno);
		}
	);
}

function salvarCadastroProfessor(){
	$.post(
		"includes/admin/professor.php", 
		{
			modo: "gravar-cadastro",
			id: $("#indice").val(),
			nome: $("#nome").val(),
			codigo: $("#codigo").val(),
			senha: $("#senha").val()
		},

		function(retorno){
			$("#retorno_ajax_professor").html(retorno);	
		}		
	);
}

/*cadastro disciplina na area admin*/
function carregaFormDisciplina(varModo, varIndice){
	$.post(
		"includes/admin/disciplina.php", {modo: varModo, id: varIndice},
		function(retorno){
			$("#retorno_ajax_disciplina").html(retorno);
		}
	);
}

function salvarCadastroDisciplina(){
	$.post(
		"includes/admin/disciplina.php", 
		{
			modo: "gravar-cadastro",
			id: $("#id").val(),
			codigo: $("#codigo").val(),
			disciplina: $("#disciplina").val(),
			professor: $("#professor option:selected").val()
		},

		function(retorno){
			$("#retorno_ajax_disciplina").html(retorno);	
		}		
	);
}

function alterar_disciplina_admin(){
	$.post(
		"includes/admin/notas.php", 
		{modo: "alterar_disciplina", disciplina: $("#admin-disciplinas-select").val()},
		function(retorno){
			$("#admin-notas").html(retorno);
		}	
	);	
}

/*cadastro de notas area do professor*/
function alterar_disciplina(){
	$.post(
		"includes/professor/notas.php", 
		{modo: "alterar_disciplina", disciplina: $("#professor-disciplinas-select").val()},
		function(retorno){
			$("#professor-notas").html(retorno);
			$("#professor-notas-list p").html($("#professor-disciplinas-select option:selected").text());
		}	
	);	
}

function mostra_campo_alterar_nota(textbox, idxAluno, idxDisciplina){
	//ao clicar no botão alterar nota >>> formulario notas da area do professor
	var inputbox = "<input type='text' class='inputbox nota' value=\""+$("#"+textbox).text()+"\">";
	$("#"+textbox).html(inputbox);
	$("input.inputbox").focus();

	$("input.inputbox").blur(function(event){
		$("#"+textbox).html($(this).val());
		
		$.post(
			"includes/professor/notas.php",
			{
				modo: "gravar_alteracao_nota", 
				aluno: idxAluno,
				disciplina: idxDisciplina,
				trabalho: $("#trabalho"+idxAluno).html(),
				prova1: $("#prova1"+idxAluno).html(),
				prova2: $("#prova2"+idxAluno).html()
			},
			function(retorno){
				$("#professor-notas").html(retorno);	
			}
		);
	});
}

//area do aluno
function fazerMatricula(idxAluno, idxDisciplina){
	$.post(
		"includes/aluno/matricula.php", 
		{modo: "fazer-matricula", aluno: idxAluno, disciplina: idxDisciplina},
		function(retorno){
			$("#aluno-matricula").html(retorno);

			$.post("includes/aluno/disciplinas.php", {modo: "atualizar"},
				function(retorno2){
					$("#aluno-disciplinas").html(retorno2);
				}
			);
		}	
	);	
}

function alterar_disciplina_aluno(){
	$.post(
		"includes/aluno/notas.php", 
		{modo: "alterar_disciplina", disciplina: $("#aluno-disciplinas-select").val()},
		function(retorno){
			$("#aluno-notas").html(retorno);
		}	
	);	
}

function validaCadastro(cadastro){
	if (cadastro == 'aluno') {
		nomevalido = false;
		ravalido = false;
		senhavalida = false;
		$.post(
		 	"validacao.php",
		 	{modo: "cadastro-aluno", nome: $("#nome").val(), ra: $("#ra").val(), senha: $("#senha").val()},
		 	function(retorno){
				if ($("#nome").val() == ""){
					$("#nome").css("border-color", "#a94442");
					alert('Digite um nome');
					nomevalido = false;
				}else{
					$("#nome").css("border-color", "");
					nomevalido = true;
				}
				if ($("#ra").val() == ""){
					$("#ra").css("border-color", "#a94442");
					alert('Digite um RA');
					ravalido = false;
				}else if (retorno == "RAINVALIDO"){
					$("#ra").css("border-color", "#a94442");
					//alert('O campo RA deve conter apenas números');
					ravalido = false;
				}else if (retorno == "RAEXISTENTE"){
					$("#ra").css("border-color", "#a94442");
					alert('RA já cadastrado');
					ravalido = false;
				}else{
					$("#ra").css("border-color", "");
					ravalido = true;
				}
				if ($("#senha").val() == ""){
					$("#senha").css("border-color", "#a94442");
					alert('Digite uma senha');
					senhavalida = false;
				}else if(retorno == "SENHACURTA"){
					$("#senha").css("border-color", "#a94442");
					alert('A senha deve ter no mínimo 6 caracteres');
					senhavalida = false;
				}else{
					$("#senha").css("border-color", "");
					senhavalida = true;
				}
				if (nomevalido && ravalido && senhavalida){
					salvarCadastroAluno();
				}
			}
	 	);
	}else if(cadastro == 'professor'){
		nomevalido = false;
		codigovalido = false;
		senhavalida = false;
		$.post(
		 	"validacao.php",
		 	{modo: "cadastro-professor", nome: $("#nome").val(), codigo: $("#codigo").val(), senha: $("#senha").val()},
		 	function(retorno){
				if ($("#nome").val() == ""){
					$("#nome").css("border-color", "#a94442");
					alert('Digite um nome');
					nomevalido = false;
				}else{
					$("#nome").css("border-color", "");
					nomevalido = true;
				}
				if ($("#codigo").val() == ""){
					$("#codigo").css("border-color", "#a94442");
					alert('Digite um código');
					codigovalido = false;
				}else if (retorno == "CODIGOINVALIDO"){
					$("#codigo").css("border-color", "#a94442");
					alert('O campo código deve conter apenas números');
					codigovalido = false;
				}else if (retorno == "CODIGOEXISTENTE"){
					$("#codigo").css("border-color", "#a94442");
					alert('Código já cadastrado');
					codigovalido = false;
				}else{
					$("#codigo").css("border-color", "");
					codigovalido = true;
				}
				if ($("#senha").val() == ""){
					$("#senha").css("border-color", "#a94442");
					alert('Digite uma senha');
					senhavalida = false;
				}else if(retorno == "SENHACURTA"){
					$("#senha").css("border-color", "#a94442");
					alert('A senha deve ter no mínimo 6 caracteres');
					senhavalida = false;
				}else{
					$("#senha").css("border-color", "");
					senhavalida = true;
				}
				if (nomevalido && codigovalido && senhavalida){
					salvarCadastroProfessor();
				}
			}
	 	);
	}else if(cadastro == 'disciplina'){
		codigovalido = false;
		nomevalido = false;
		professorvalido = false;
		$.post(
		 	"validacao.php",
		 	{modo: "cadastro-disciplina", codigo: $("#codigo").val(), nome: $("#disciplina").val(), professor: $("#professor").val()},
		 	function(retorno){
				if ($("#codigo").val() == ""){
					$("#codigo").css("border-color", "#a94442");
					alert('Digite um código');
					codigovalido = false;
				}else if (retorno == "CODIGOINVALIDO"){
					$("#codigo").css("border-color", "#a94442");
					alert('O campo código deve conter apenas números');
					codigovalido = false;
				}else if (retorno == "CODIGOEXISTENTE"){
					$("#codigo").css("border-color", "#a94442");
					alert('Código já cadastrado');
					codigovalido = false;
				}else{
					$("#codigo").css("border-color", "");
					codigovalido = true;
				}
				if ($("#disciplina").val() == ""){
					$("#disciplina").css("border-color", "#a94442");
					alert('Digite um nome');
					nomevalido = false;
				}else{
					$("#disciplina").css("border-color", "");
					nomevalido = true;
				}
				if (retorno == "PROFESSORNULO"){
					$("#professor").css("border-color", "#a94442");
					alert('Selecione o proefessor');
					professorvalido = false;
				}else{
					$("#professor").css("border-color", "");
					professorvalido = true;
				}
				if (nomevalido && codigovalido && professorvalido){
					salvarCadastroDisciplina();
				}
			}
	 	);	
	}
};