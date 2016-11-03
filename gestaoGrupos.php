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
						<h3>Gestão de Grupos</h3><!-- Título da Página -->
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteudo da página  -->
								<div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
									<div class="panel">

										<div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div id="tabelaListaGrupo" class="panel-body">
												

											</div>
										</div>
									</div>
								</div>


								<button type="button" class="btn btn-primary">Salvar alterações</button>
								<div class="clearfix"></div>
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

	<script src="js/listaGruposPorAtividade.js"></script>
		
		<script>
		
			var atv = new atividade();
			
			var div = $('#tabelaListaGrupo');
			
			atv.listarGrupos(div);
			
		</script>

</body>
</html>
