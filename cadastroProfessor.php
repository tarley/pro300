<?php
$permissaoPagina = "P"; // A ou P de acordo com o perfil do usuário
require_once ("controleAcesso.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once ("includes/header.php"); ?>
</head>

<body class="nav-md">
<div class="container body">
	<div class="main_container">
		<?php include_once ("includes/left_col.php"); ?>
		<?php include_once ("includes/top_nav.php"); ?>

		<!-- Page Content Start -->
		<div class="right_col" role="main">
			<div class="">

				<div class="page-title">
					<div class="title_left">
						<h3>Cadastro Professor</h3><!-- Título da Página -->
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteudo da página  -->
								<form class="form-horizontal form-label-left" method="POST" novalidate>
									<br />
									<div class="item form-group">
										<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
											<label>Nome*:</label>
											<input id="nome" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nome" required="required" type="text">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
											<label>E-mail:</label>
											<input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="E-mail" required="required" type="text">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
											<label>Telefone:</label>
											<input id="telefone" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="telefone" placeholder="Telefone" required="required" type="text">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
											<label>Senha:</label>
											<input id="senha" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="senha" placeholder="Senha" required="required" type="password">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
											<label>Confimar Senha:</label>
											<input id="confirmarSenha" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="confirmarsenha" placeholder="Confirmar Senha" required="required" type="password">
										</div>
									</div>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button id="cancelar" type="submit" class="btn btn-primary">Cancelar</button>
											<button id="salvar" name="salvar" type="submit" class="btn btn-success">Salvar</button>
										</div>
									</div>
								</form>
								<!-- Fim do conteudo da página  -->

							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
		<!-- Page Content End -->

	</div>
</div>
<div id="custom_notifications" class="custom-notifications dsp_none">
	<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
	</ul>
	<div class="clearfix"></div>
	<div id="notif-group" class="tabbed_notifications"></div>
</div>
<?php include_once ("includes/script.php"); ?>
</body>

<script>
	$("#salvar").click(function (e) {
		var nome = $("#nome").val();
		var email = $("#email").val();
		var telefone = $("#telefone").val();
		var senha = $("#senha").val();
		var confirmarSenha = $("#confirmarSenha").val();
		var msg = "";

		if (nome == "") {
			msg += "Preencha o campo nome\n\r";
		}

		if (email == "") {
			msg += "Preencha o campo e-mail\n\r";
		}

		if (telefone == "") {
			msg += "Preencha o campo telefone\n\r";
		}

		if (senha == "") {
			msg += "Preencha o campo senha\n\r";
		}

		if (confirmarSenha == "") {
			msg += "Preencha o campo Confirmar senha\n\r";
		}

		if (msg != "") {
			alert("Preencha os campos: \n\r" + msg);
			e.preventDefault();
			return;
		}

		if(senha != confirmarSenha){
			alert("Campo Senha e Confirmar Senha devem ser iguais.");
			e.preventDefault();
			return;
		}



		$.post("classes/Professor.class.php?acao=inserir", { nome: nome, email: email, telefone: telefone , senha: senha })
			.done(function(result){
				alert(result.msg);

				if(!result.erro){
					$("#nome").val("");
					$("#email").val("");
					$("#telefone").val("");
					$("#senha").val("");
					$("#confirmarSenha").val("");
				}
			});

		e.preventDefault();
	});

</script>
</html>
