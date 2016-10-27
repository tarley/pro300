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
								<table id="datatable" class="table table-striped responsive-utilities jambo_table bulk_action">
									<thead>
										<th>#</th>
										<th>Atividade</th>
										<th>Dt. Inicio</th>
										<th>Dt. Fim</th>
										<th></th>
									</thead>
									<tbody>

									</tbody>
								</table>
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

	<script src="js/atividade.js"></script>
	<script>
		var atv = new atividade();
		var tabela = $('#datatable');
		var tbody = tabela.find('tbody');

		atv.listarAtividades(tbody);
	</script>
</body>
</html>
