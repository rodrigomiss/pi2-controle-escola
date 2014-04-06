
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
	setTimeout(function() {window.location.href = 'index.html'}, 800);
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
	//setTimeout(function() {window.location.href = 'index.html'}, 800);
	//window.location.href = "login.php?modo=logout-admin";
	$.post("login.php", {modo: "logout-admin"});
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
	setTimeout(function() {window.location.href = 'index.html'}, 800);
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
	 	$("#aluno-notas").hide("fast");
	  	$("#btn-aluno-disciplinas").parent().removeClass("active");
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
		if ($("#aluno-usuario").val() == ""){
			$(".danger-usuario").text("Preencha o campo R.A.");
			$(".danger-usuario").show("fast");
			$("#aluno-usuario").css("border-color", "#a94442");
		}
		else{
			$(".danger-usuario").hide("fast");
			$("#aluno-usuario").css("border-color", "");
			usuariovalido = true;
		}
		if ($("#aluno-senha").val() == ""){
			$(".danger-senha").text("Preencha o campo Senha");
			$(".danger-senha").show("fast");
			$("#aluno-senha").css("border-color", "#a94442");
		}
		else{
			$(".danger-senha").hide("fast");
			$("#aluno-senha").css("border-color", "");
			senhavalida = true;
		}
		if (usuariovalido == true && senhavalida == true) {
			$("#main").hide("slow");
			$("#container").append("<h2>Acessando o sistema</h2>");
			setTimeout(function() {window.location.href = 'aluno.html'}, 800);
		}
	}else if(login == 'professor'){
		if ($("#professor-usuario").val() == ""){
			$(".danger-usuario").text("Preencha o campo Usuário");
			$(".danger-usuario").show("fast");
			$("#professor-usuario").css("border-color", "#a94442");
		}
		else{
			$(".danger-usuario").hide("fast");
			$("#professor-usuario").css("border-color", "");
			usuariovalido = true;
		}
		if ($("#professor-senha").val() == ""){
			$(".danger-senha").text("Preencha o campo Senha");
			$(".danger-senha").show("fast");
			$("#professor-senha").css("border-color", "#a94442");
		}
		else{
			$(".danger-senha").hide("fast");
			$("#professor-senha").css("border-color", "");
			senhavalida = true;
		}
		if (usuariovalido == true && senhavalida == true) {
			$("#main").hide("slow");
			$("#container").append("<h2>Acessando o sistema</h2>");
			setTimeout(function() {window.location.href = 'professor.html'}, 800);
		}
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
$("#cadastro-aluno-form").submit(function(event){
	$.post("form-cadastro-aluno.php", $("#form-cadastro-aluno").serialize());
});

function carregaFormEditarAluno(indice){
	$.get("includes/admin/form-cadastro-aluno.php", {id: indice},
		function(retorno){
			$("#retorno_ajax").html(retorno);
		}
	);
}

function removeAluno(indice){
	$.post("includes/admin/lista-cadastro-aluno.php", {modo: "remove", id: indice},
		function(retorno){
			$("#retorno_ajax").html(retorno);
		}
	);
}

function carregaListaAlunos(){
	$.post("includes/admin/lista-cadastro-aluno.php", {modo: "listar"},
		function(retorno){
			$("#retorno_ajax").html(retorno);
		}
	);	
}


/*div professor area admin*/
function carregaFormEditarProfessor(indice){
	$.post("includes/admin/form-cadastro-professor.php", {id: indice},
		function(retorno){
			$("#retorno_ajax_professor").html(retorno);
		}
	);
}

function removeProfessor(indice){
	$.post("includes/admin/lista-cadastro-professor.php", {modo: "remove", id: indice},
		function(retorno){
			$("#retorno_ajax_professor").html(retorno);
		}
	);
}

function carregaListaProfessores(){
	$.post("includes/admin/lista-cadastro-professor.php", {modo: "listar"},
		function(retorno){
			$("#retorno_ajax_professor").html(retorno);
		}
	);	
}

$("#cadastro-professor-form").submit(function(event){
	$.post("form-cadastro-professor.php", $("#form-cadastro-professor").serialize());
});

