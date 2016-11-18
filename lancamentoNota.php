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
						<h3>Lançamento Notas</h3>
					</div>
				</div>


				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteudo da página  -->
								<table id="datatable" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th>RA</th>
										<th>Nome Aluno</th>
										<th>Nota P1</th>
										<th>Nota P300</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>12332</td>
										<td>Caesar Vance</td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
									</tr>
									<tr>
										<td>5333523</td>
										<td>Angelica Ramos</td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
									</tr>

									<tr>
										<td>452452</td>
										<td>Gavin Joyce</td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
									</tr>

									<tr>
										<td>424242452</td>
										<td>Shou Itou</td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
									</tr>
									<tr>
										<td>475247524</td>
										<td>Donna Snider</td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
										<td><input type="text" size="2" class="form-control" placeholder=""></td>
									</tr>
									</tbody>
								</table>

								<button type="button" align="center" class="btn btn-primary" data-target=".bs-example-modal-sm">Salvar</button>
								<!-- Início do conteudo da página  -->

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
</html>
