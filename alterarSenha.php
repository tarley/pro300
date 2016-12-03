<?php
$permissaoPagina = "A"; // A ou P de acordo com o perfil do usuário
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
						<h3>Alterar Senha</h3>
					</div>
				</div>


				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<form class="form-horizontal form-label-left" method="POST" novalidate>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
											<label>Senha Atual*:</label>
											<input type="password" id="senha" name="senha" class="form-control" maxlength="10">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
											<label>Nova Senha*:</label>
											<input type="password" id="novaSenha" name="novaSenha" class="form-control" maxlength="10">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
											<label>Confirmação da Senha*:</label>
											<input type="password" id="confSenha" name="confSenha" class="form-control" maxlength="10">
										</div>
									</div>

									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="button" id= "btnCancelar" class="btn btn-primary">Cancelar</button>
                                            <button type="button" id="btnEnviar" class="btn btn-success">Enviar</button>
										</div>
									</div>
								</form>

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

<script>

    $("#btnEnviar").click(function (e) {
        var senhaAtual = $("#senha").val();
        var senha = $("#novaSenha").val();
        var confirmarSenha = $("#confSenha").val();

        if (senhaAtual == "") {
            alert("Preencha o campo senha atual!");
            e.preventDefault();
            return;
        }

        if (senha == "") {
            alert("Preencha o campo nova senha!");
            e.preventDefault();
            return;
        }

        if (confirmarSenha == "") {
            alert("Preencha o campo Confirmar senha!");
            e.preventDefault();
            return;
        }

        if (senha != confirmarSenha) {
            alert("Digite senhas iguais!");
            e.preventDefault();
            return;
        }

        if (senha.length < 6) {
            alert("A senha deve conter entre 6 e 10 caracteres!");
            e.preventDefault();
            return;
        }

        if (senhaAtual == senha) {
            alert("A nova senha é igual a senha atual!");
            e.preventDefault();
            return;
        }

        $.post("classes/Aluno.class.php?acao=alterarSenha", {
            senhaAtual: senhaAtual,
            novaSenha: senha
        }).done(function (result) {
            console.log(result);
            alert(result.msg);

            if (result.erro) {

            } else {
                window.location = "administrarAtividades.php";
            }

        });

        e.preventDefault();

    });

    $("#btnCancelar").click(function (e) {
        window.location = "administrarAtividades.php";
        e.preventDefault();
    });

</script>

</body>
</html>
