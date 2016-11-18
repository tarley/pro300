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
						<h3>Relatório Atividades</h3>
					</div>
				</div>


				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">
								<div class="text-right">

								<a id=dl download="Relatorio.csv"></a>
								<button type="button" class="btn btn-default text-center" onclick="exportarRelatorio()">
									Exportar

									<i class="fa fa-file"></i>
								</button>
									</div>

								<!-- Início do conteudo da página  -->
								<table id="datatable" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th>Nome Aluno</th>
										<th>RA</th>
										<th>Nota Prova</th>
										<th>Nota P-300</th>
										<th>Total</th>
										<th>Indice Melhoria</th>
										<th>Outras Informações</th>
									</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
								<!-- Criação das tabelas do pop-up usando o onshow event para executar a query e puxar os dados  -->

								<div class="modal fade avaliacao" tabindex="-1" role="dialog" aria-hidden="true" onshow="">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">
													<span aria-hidden="true"></span>
												</button>
												<h4 class="modal-title" id="myModalLabel">Avaliação xxxx</h4>
											</div>
											<div class="modal-body">
												<h4>Nota das avaliações realizadas</h4>
												<table id="tabelaPopupAvaliacao" class="table responsive">
												<thead>
													<tr>
														<th>Nome Aluno</th>
														<th>Ra Aluno</th>
														<th>Avaliação Ajudante</th>
														<th>Avalição Ajudado</th>
														<th>Media de valor das avaliações</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
											</div>
										</div>
									</div>
								</div>

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




<!--  Scripts-->
<?php include_once ("includes/script.php"); ?>

<script src="js/relatorioAtividades.js"></script>
<script src="js/downloadRelatorio.js"></script>

<!--<script>
	$(function () {
		relatorio();
	})
</script>-->

<script>
	$(document).ready(function () {

		var datatable = $("#datatable");
		var tbody = datatable.find("tbody");

		relatorio(tbody);
	});


</script>


</body>
</html>
