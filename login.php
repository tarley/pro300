<!DOCTYPE html>
<html lang="br">

<head>
	<?php include_once ("includes/header.php"); ?>
</head>

<body style="background:#F7F7F7;">

	<div class="">
		<a class="hiddenanchor" id="toregister"></a>
		<a class="hiddenanchor" id="tologin"></a>

		<div id="wrapper">
			<div id="login" class="animate form">
				<section class="login_content">
					<form>
						<h1>Controle de Acesso</h1>
						<div>
							<input id="email" type="text" class="form-control" placeholder="E-mail" required="" />
						</div>
						<div>
							<input id="senha" type="password" class="form-control" placeholder="Senha" required="" />
						</div>
						<div>
							<a id="btnLogin" class="btn btn-default submit">Entrar</a>
							<a class="reset_pass" href="#">Esqueceu a Senha?</a>
						</div>
						<div class="clearfix"></div>
						<div class="separator">

							<p class="change_link">Novo no Site?
								<a href="#toregister" class="to_register"> Cadastre-se </a>
							</p>
							<div class="clearfix"></div>
							<br />
							<div>
								<img  src="images/logo.png" alt="HTML5 Icon" style="width:205px;height:205px;">
								<br/>
								<br/>
								<p>©2016 Todos os Direitos Reservados</p>
							</div>
						</div>
					</form>
					<!-- form -->
				</section>
				<!-- content -->
			</div>
			<div id="register" class="animate form">
				<section class="login_content">
					<form id="formCadastro">
						<h1>  Cadastro  </h1>
						<div>
							<input type="text" class="form-control" placeholder="RA*" id="ra" minlength="8" maxlength="8" onkeyup="mascara( this, soDigitos );" />
						</div>
						<div>
							<input type="text" class="form-control" placeholder="Nome*" id="nome" oninput="javascript:retirarAcento(this);" />
						</div>
						<div>
							<input type="text" class="form-control" placeholder="Celular" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" />
						</div>
						<div>
							<input type="email" class="form-control" placeholder="Email*"  id="emailCadastro"  />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Senha*" id="senhaCadastro"  maxlength="10" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Confirmar Senha*:" id="confirmarSenha" maxlength="10"  />
						</div>
						<div>
							<p id="obrigatorio">* Informações Obrigatórias</p>
						</div>

						<div>
							<!--<a class="btn btn-default submit" href="login.php">Cadastrar</a> -->
							<a id="btnCadastro" class="btn btn-default submit">Cadastrar</a>
						</div>
						<div class="clearfix"></div>
						<div class="separator">

							<p class="change_link">Já participa ?
								<a href="#tologin" class="to_register"> Entre </a>
							</p>
							<div class="clearfix"></div>
							<br />

							<div>
								<img  src="images/logo.png" alt="HTML5 Icon" style="width:205px;height:205px;">
								<br/>
								<br/>
								<p>©2016 Todos os Direitos Reservados</p>
							</div>
						</div>
					</form>
					<!-- form -->
				</section>
				<!-- content -->
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$("#btnLogin").click(function(e){

			var email = $("#email").val();
			var senha = $("#senha").val();

			if (email == "") {
				alert("Preencha o campo e-mail");
				e.preventDefault();
				return;
			}

			if (senha == "") {
				alert("Preencha o campo senha");
				e.preventDefault();
				return;
			}

			$.post("classes/Usuario.class.php?acao=login", { email: email, senha: senha })
				.done(function(result){
					if (result.erro)
						alert(result.msg);
					else
						window.location = "index.php";
				});

			e.preventDefault();
		});


		$("#btnCadastro").click(function(e){

			var ra = $("#ra").val();
			var nome = $("#nome").val();
			var telefone = $("#telefone").val();
			var emailCadastro = $("#emailCadastro").val();
			var senhaCadastro = $("#senhaCadastro").val();
			var confirmarSenha = $("#confirmarSenha").val();


			if (ra == "" || ra.length < 8) {
				alert("Preencha o campo RA com 8 caracteres!");
				e.preventDefault();
				return;
			}


			if (nome == "" || nome.length < 10) {
				alert("Preencha o campo Nome com pelo menos 10 caracteres!");
				e.preventDefault();
				return;
			}

			if (telefone != "" && telefone.length < 15) {
				alert("Preencha o campo Telefone no formato (00)00000-0000");
				e.preventDefault();
				return;
			}

			if (emailCadastro == "") {
				alert("Preencha o campo Email!");
				e.preventDefault();
				return;
			}

			if (senhaCadastro == "") {
				alert("Preencha o campo senha!");
				e.preventDefault();
				return;
			}

			if (confirmarSenha == "") {
				alert("Preencha o campo Confirmar senha!");
				e.preventDefault();
				return;
			}

			if (senhaCadastro != confirmarSenha) {
				alert("Digite senhas iguais!");
				e.preventDefault();
				return;
			}

			if(senhaCadastro.length < 6){
				alert("A senha deve conter entre 6 e 10 caracteres!");
				e.preventDefault();
				return;
			}

			$.post("classes/Usuario.class.php?acao=cadastro", { ra: ra, nome: nome, telefone: telefone, emailCadastro: emailCadastro, senhaCadastro: senhaCadastro, confirmarSenha: confirmarSenha })
				.done(function(result){
					alert(result.msg);

					if (result.erro){
						
					}else{
						window.location = "login.php#tologin";	
				
						$("#ra").val("");
						$("#nome").val("");
						$("#telefone").val("");
						$("#emailCadastro").val("");
						$("#senhaCadastro").val("");
						$("#confirmarSenha").val("");
					}
					
				
				});
					
		 	e.preventDefault();
		});

		
    	function retirarAcento(objResp) {
		var varString = new String(objResp.value);
		var stringAcentos = new String('àâêôûãõáéíóúçüÀÂÊÔÛÃÕÁÉÍÓÚÇÜ1234567890\\!@#$%¨&*()-_+={[}]:;.,?|<>/´\"~^\`\'°');
		var stringSemAcento = new String('aaeouaoaeioucuAAEOUAOAEIOUCU');

		var i = new Number();
		var j = new Number();
		var cString = new String();
		var varRes = '';

		for (i = 0; i < varString.length; i++) {
			cString = varString.substring(i, i + 1);
				for (j = 0; j < stringAcentos.length; j++) {
					if (stringAcentos.substring(j, j + 1) == cString){
						cString = stringSemAcento.substring(j, j + 1);
					}
				}
			varRes += cString;
		}
		objResp.value = varRes;
	}

		
		
	</script>
	<script src="js/mascaraTelefone.js"></script>

</body>

</html>
