
$("#btn-aluno").click(function(event){
 	event.preventDefault();
 	$("#login-aluno").show("fast");
 	$("#login-professor").hide("fast");
 	$("#login-admin").hide("fast");
 	$("#main-title").text("Área do Aluno");
 	$(".danger-usuario").hide("fast");
 	$(".danger-senha").hide("fast");
 	$("#aluno-usuario").css("border-color", "");
 	$("#aluno-senha").css("border-color", "");
  	$("#professor-usuario").css("border-color", "");
 	$("#professor-senha").css("border-color", "");
  	$("#admin-usuario").css("border-color", "");
 	$("#admin-senha").css("border-color", "");
 });

$("#btn-professor").click(function(event){
 	event.preventDefault();
 	$("#login-aluno").hide("fast");
 	$("#login-professor").show("fast");
 	$("#login-admin").hide("fast");
  	$("#main-title").text("Área do Professor");
   	$(".danger-usuario").hide("fast");
 	$(".danger-senha").hide("fast");
  	$("#aluno-usuario").css("border-color", "");
 	$("#aluno-senha").css("border-color", "");
  	$("#professor-usuario").css("border-color", "");
 	$("#professor-senha").css("border-color", "");
  	$("#admin-usuario").css("border-color", "");
 	$("#admin-senha").css("border-color", "");
 });

$("#btn-admin").click(function(event){
 	event.preventDefault();
 	$("#login-aluno").hide("fast");
 	$("#login-professor").hide("fast");
 	$("#login-admin").show("fast");
  	$("#main-title").text("Área do Administrador");
   	$(".danger-usuario").hide("fast");
 	$(".danger-senha").hide("fast");
  	$("#aluno-usuario").css("border-color", "");
 	$("#aluno-senha").css("border-color", "");
  	$("#professor-usuario").css("border-color", "");
 	$("#professor-senha").css("border-color", "");
  	$("#admin-usuario").css("border-color", "");
 	$("#admin-senha").css("border-color", "");
 });

$("#btn-login-aluno").click(function(){
	validaLoginAluno();
});

$("#btn-login-professor").click(function(){
	validaLoginProfessor();
});

$("#btn-login-admin").click(function(){
	validaLoginAdmin();
});


$("#btn-aluno-inicial").click(function(event){
 	event.preventDefault();
 	$("#aluno-inicial").fadeIn("fast");
 	$("#aluno-disciplinas").hide("fast");
 	$("#aluno-notas").hide("fast");
 	$("#btn-aluno-disciplinas").parent().removeClass("active");
 	$("#btn-aluno-notas").parent().removeClass("active");
 });

$("#btn-aluno-disciplinas").click(function(event){
 	event.preventDefault();
 	$("#aluno-inicial").hide("fast");
 	$("#aluno-disciplinas").fadeIn("fast");
 	$("#aluno-notas").hide("fast");
  	$("#btn-aluno-disciplinas").parent().addClass("active");
 	$("#btn-aluno-notas").parent().removeClass("active");
 });

$("#btn-aluno-notas").click(function(event){
 	event.preventDefault();
 	$("#aluno-inicial").hide("fast");
 	$("#aluno-disciplinas").hide("fast");
 	$("#aluno-notas").fadeIn("fast");
  	$("#btn-aluno-disciplinas").parent().removeClass("active");
 	$("#btn-aluno-notas").parent().addClass("active");
 });

$("#btn-aluno-sair").click(function(event){
 	event.preventDefault();
	$("#main").hide("slow");
	$("#container-aluno").append("<h2>Saindo do Sistema</h2>");
  	$("#btn-aluno-disciplinas").parent().removeClass("active");
 	$("#btn-aluno-notas").parent().removeClass("active");
	$("#btn-aluno-sair").parent().addClass("active");
	setTimeout(function() {window.location.href = 'index.html'}, 800);
 });

$("#btn-professor-inicial").click(function(event){
 	event.preventDefault();
 	$("#professor-inicial").fadeIn("fast");
 	$("#professor-disciplinas").hide("fast");
 	$("#professor-notas").hide("fast");
 	$("#btn-professor-disciplinas").parent().removeClass("active");
 	$("#btn-professor-notas").parent().removeClass("active");
 });

$("#btn-professor-disciplinas").click(function(event){
 	event.preventDefault();
 	$("#professor-inicial").hide("fast");
 	$("#professor-disciplinas").fadeIn("fast");
 	$("#professor-notas").hide("fast");
  	$("#btn-professor-disciplinas").parent().addClass("active");
 	$("#btn-professor-notas").parent().removeClass("active");
 });

$("#btn-professor-notas").click(function(event){
 	event.preventDefault();
 	$("#professor-inicial").hide("fast");
 	$("#professor-disciplinas").hide("fast");
 	$("#professor-notas").fadeIn("fast");
  	$("#btn-professor-disciplinas").parent().removeClass("active");
 	$("#btn-professor-notas").parent().addClass("active");
 });

$("#btn-admin-sair").click(function(event){
 	event.preventDefault();
	$("#main").hide("slow");
	$("#container-admin").append("<h2>Saindo do Sistema</h2>");
  	$("#btn-admin-disciplinas").parent().removeClass("active");
 	$("#btn-admin-notas").parent().removeClass("active");
	$("#btn-admin-sair").parent().addClass("active");
	setTimeout(function() {window.location.href = 'index.html'}, 800);
 });

$("#btn-admin-inicial").click(function(event){
 	event.preventDefault();
 	$("#admin-inicial").fadeIn("fast");
 	$("#admin-alunos").hide("fast");
 	$("#admin-professores").hide("fast");
 	$("#admin-disciplinas").hide("fast");
 	$("#admin-notas").hide("fast");
  	$("#btn-admin-alunos").parent().removeClass("active");
 	$("#btn-admin-professores").parent().removeClass("active");
 	$("#btn-admin-disciplinas").parent().removeClass("active");
 	$("#btn-admin-notas").parent().removeClass("active");
 });

$("#btn-admin-alunos").click(function(event){
 	event.preventDefault();
 	$("#admin-inicial").hide("fast");
 	$("#admin-alunos").fadeIn("fast");
 	$("#admin-professores").hide("fast");
 	$("#admin-disciplinas").hide("fast");
 	$("#admin-notas").hide("fast");
  	$("#btn-admin-alunos").parent().addClass("active");
 	$("#btn-admin-professores").parent().removeClass("active");
 	$("#btn-admin-disciplinas").parent().removeClass("active");
 	$("#btn-admin-notas").parent().removeClass("active");
 });

$("#btn-admin-professores").click(function(event){
 	event.preventDefault();
 	$("#admin-inicial").hide("fast");
 	$("#admin-alunos").hide("fast");
 	$("#admin-professores").fadeIn("fast");
 	$("#admin-disciplinas").hide("fast");
 	$("#admin-notas").hide("fast");
  	$("#btn-admin-alunos").parent().removeClass("active");
 	$("#btn-admin-professores").parent().addClass("active");
 	$("#btn-admin-disciplinas").parent().removeClass("active");
 	$("#btn-admin-notas").parent().removeClass("active");
 });

$("#btn-admin-disciplinas").click(function(event){
 	event.preventDefault();
 	$("#admin-inicial").hide("fast");
 	$("#admin-alunos").hide("fast");
 	$("#admin-professores").hide("fast");
 	$("#admin-disciplinas").fadeIn("fast");
 	$("#admin-notas").hide("fast");
  	$("#btn-admin-alunos").parent().removeClass("active");
 	$("#btn-admin-professores").parent().removeClass("active");
 	$("#btn-admin-disciplinas").parent().addClass("active");
 	$("#btn-admin-notas").parent().removeClass("active");
 });

$("#btn-admin-notas").click(function(event){
 	event.preventDefault();
 	$("#admin-inicial").hide("fast");
 	$("#admin-alunos").hide("fast");
 	$("#admin-professores").hide("fast");
 	$("#admin-disciplinas").hide("fast");
 	$("#admin-notas").fadeIn("fast");
  	$("#btn-admin-alunos").parent().removeClass("active");
 	$("#btn-admin-professores").parent().removeClass("active");
 	$("#btn-admin-disciplinas").parent().removeClass("active");
 	$("#btn-admin-notas").parent().addClass("active");
 });

$("#btn-admin-sair").click(function(event){
 	event.preventDefault();
	$("#main").hide("slow");
	$("#container-admin").append("<h2>Saindo do Sistema</h2>");
  	$("#btn-professor-alunos").parent().removeClass("active");
 	$("#btn-professor-professores").parent().removeClass("active");
 	$("#btn-professor-disciplinas").parent().removeClass("active");
 	$("#btn-professor-notas").parent().removeClass("active");
	$("#btn-professor-sair").parent().addClass("active");
	setTimeout(function() {window.location.href = 'index.html'}, 800);
 });


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

function validaLoginAluno(){
	usuariovalido = false;
	senhavalida = false
	if ($("#aluno-usuario").val() == ""){
		$(".danger-usuario").show("fast");
		$("#aluno-usuario").css("border-color", "#a94442");
	}
	else{
		$(".danger-usuario").hide("fast");
		$("#aluno-usuario").css("border-color", "");
		usuariovalido = true;
	}
	if ($("#aluno-senha").val() == ""){
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
};

function validaLoginProfessor(){
	usuariovalido = false;
	senhavalida = false
	if ($("#professor-usuario").val() == ""){
		$(".danger-usuario").show("fast");
		$("#professor-usuario").css("border-color", "#a94442");
	}
	else{
		$(".danger-usuario").hide("fast");
		$("#professor-usuario").css("border-color", "");
		usuariovalido = true;
	}
	if ($("#professor-senha").val() == ""){
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
};

function validaLoginAdmin(){
	usuariovalido = false;
	senhavalida = false
	if ($("#admin-usuario").val() == ""){
		$(".danger-usuario").show("fast");
		$("#admin-usuario").css("border-color", "#a94442");
	}
	else{
		$(".danger-usuario").hide("fast");
		$("#admin-usuario").css("border-color", "");
		usuariovalido = true;
	}
	if ($("#admin-senha").val() == ""){
		$(".danger-senha").show("fast");
		$("#admin-senha").css("border-color", "#a94442");
	}
	else{
		$(".danger-senha").hide("fast");
		$("#admin-senha").css("border-color", "");
		senhavalida = true;
	}
	if (usuariovalido == true && senhavalida == true) {
		$("#main").hide("slow");
		$("#container").append("<h2>Acessando o sistema</h2>");
		setTimeout(function() {window.location.href = 'admin.html'}, 800);
	}
};