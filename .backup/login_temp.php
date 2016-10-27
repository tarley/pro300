<?php
    session_start();

    echo "Cod_usuario: " . $_SESSION['cod_usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include ("_header.php")?>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<?php include ('_menu.php')?>

			<!-- page content -->
			<div class="right_col" role="main">

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="dashboard_graph">

							<div class="row x_title">
								<div class="col-md-6">
									<h3>Atividades <small> projetos registrados pelo professor</small></h3>
								</div>
								<div class="col-md-6">

								</div>
							</div>

							<div class="col-md-12 col-sm-12 col-xs-12">

								<form id="frmLogin" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail<span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="email" class="form-control col-md-7 col-xs-12" type="text">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Senha<span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="senha" class="form-control col-md-7 col-xs-12" type="password">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
											<button id="btnLogin" type="submit" class="btn btn-success">Login</button>
										</div>
									</div>
								</form>
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
							</div>

							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<br />

				<?php include ("_footer.php")?>
			</div>
			<!-- /page content -->
		</div>

	</div>

	<div id="custom_notifications" class="custom-notifications dsp_none">
		<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
		</ul>
		<div class="clearfix"></div>
		<div id="notif-group" class="tabbed_notifications"></div>
	</div>

	<?php include("_scripts.php")?>
</body>
</html>
