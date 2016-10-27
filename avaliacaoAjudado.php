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
						<h3>Formulario de Avaliação para o Ajudante</h3><!-- Título da Página -->
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteu	do da página  -->
								<p>Prezado Ajudante, neste formulário você deverá avaliar, com bastante honestidade, o nível de ajuda oferecida a cada integrante do grupo com base na escala de 1 a 5. <br/>(1 para pouca ajuda e 5 para muita ajuda).</p>

								<!-- start form for validation -->
								<form id="demo-form" data-parsley-validate>
									<br/>
									<label for="fullname">Nome do Ajudado:</label> Rodrigo
									<div class="x_content">
										<br/>
										<div>
											<div id="stars" class="starrr lead"></div>
											A nota do lider é: <span id="count">0</span> estrela(s)
										</div>
										<div class="row x_title">
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
											</div>
										</div>
										<label for="fullname">Nome do Ajudado:</label> Bruno
										<div>
										<br/>
											<div id="stars" class="starrr lead"></div>
											A nota do lider é: <span id="count">0</span> estrela(s)
										</div>
										<br/>
									</div>
									<br/>
									<br/>
									<br/>
									<span class="btn btn-primary">Salvar</span>

								</form>
								<!-- end form for validations -->
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
