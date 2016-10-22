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
					<form>
						<h1>  Cadastro  </h1>
						<div>
							<input type="text" class="form-control" placeholder="RA" required="" />
						</div>
						<div>
							<input type="email" class="form-control" placeholder="Email" required="" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Senha" required="" />
						</div>
						<div>
							<a class="btn btn-default submit" href="login.php">Cadastrar</a>
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
	</script>
</body>

</html>
