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
								<form class="form-horizontal form-label-left" novalidate>
									<br />
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome <span class="required">*</span>
										</label>
										<div class="col-md-8 col-sm-6 col-xs-12">
											<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nome" required="required" type="text">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">E-mail <span class="required">*</span>
										</label>
										<div class="col-md-8 col-sm-6 col-xs-12">
											<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="E-mail" required="required" type="text">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Matéria <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="matéria" placeholder="Matéria" required="required" type="text">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Senha <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="senha" placeholder="Senha" required="required" type="password">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Confirmar Senha <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="confirmarsenha" placeholder="Confirmar Senha" required="required" type="password">
										</div>
									</div>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="submit" class="btn btn-primary">Cancelar</button>
											<button id="send" type="submit" class="btn btn-success">Salvar</button>
										</div>
									</div>
								</form>
								<!-- Fim do conteudo da página  -->

							</div>
						</div>
					</div>
				</div>

			</div>
			<?php include_once ("includes/footer.php"); ?>
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
</html>
