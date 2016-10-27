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
									<tr>
										<td>Aaron</td>
										<td>1415415</td>
										<td>16</td>
										<td>25</td>
										<td>25</td>
										<td>15%</td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Aaron">
												<i class="fa fa-navicon"></i>
											</button>
											<div class="modal fade Aaron" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">

														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Avaliação Aaron</h4>
														</div>
														<div class="modal-body">
															<h4>Nota das avaliações realizadas</h4>
															<table class="table responsive">
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
																<tr>
																	<td>Shank</td>
																	<td>1415415</td>
																	<td>2</td>
																	<td>3</td>
																	<td>3</td>

																</tr>
																<tr>
																	<td>Geraldo</td>
																	<td>Teste</td>
																	<td>1415415</td>
																	<td>4</td>
																	<td>4</td>
																	<td>4</td>
																</tr>
																<tr>
																	<td>Nemo</td>
																	<td>1415415</td>
																	<td>5</td>
																	<td>5</td>
																	<td>5</td>
																</tr>
																<tr>
																	<td>Eduardo</td>
																	<td>1415415</td>
																	<td>1</td>
																	<td>1</td>
																	<td>1</td>
																</tr>
																</tbody>
															</table>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>

													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>Shank</td>
										<td>1415415
										<td>16</td>
										<td>25</td>
										<td>25</td>
										<td>15%</td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Shank">
												<i class="fa fa-navicon"></i>
											</button>
											<div class="modal fade Shank" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">

														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Avaliação Shank</h4>
														</div>
														<div class="modal-body">
															<h4>Nota das avaliações realizadas</h4>
															<table class="table responsive">
																<thead>
																<tr>
																	<th>Nome Aluno</th>
																	<th>Sobrenome Aluno</th>
																	<th>Ra Aluno</th>
																	<th>Avaliação Ajudante</th>
																	<th>Avalição Ajudado</th>
																	<th>Media de valor das avaliações</th>

																</tr>
																</thead>
																<tbody>
																<tr>
																	<td>Aaron</td>
																	<td>1415415</td>
																	<td>5</td>
																	<td>5</td>
																	<td>5</td>
																</tr>
																</tbody>
															</table>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>

													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>Geraldo</td>
										<td>1415415</td>
										<td>16</td>
										<td>25</td>
										<td>25</td>
										<td>15%</td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".geraldo">
												<i class="fa fa-navicon"></i>
											</button>
											<div class="modal fade geraldo" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">

														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Avaliação Geraldo</h4>
														</div>
														<div class="modal-body">
															<h4>Nota das avaliações realizadas</h4>
															<table class="table responsive">
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
																<tr>
																	<td>Aaron</td>
																	<td>1415415</td>
																	<td>5</td>
																	<td>5</td>
																	<td>5</td>
																</tr>
																</tbody>
															</table>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>

													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>Nemo</td>
										<td>1415415</td>
										<td>16</td>
										<td>25</td>
										<td>25</td>
										<td>15%</td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Nemo">
												<i class="fa fa-navicon"></i>
											</button>
											<div class="modal fade Nemo" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">

														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Avaliação Nemo</h4>
														</div>
														<div class="modal-body">
															<h4>Nota das avaliações realizadas</h4>
															<table class="table responsive">
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
																<tr>
																	<td>Aaron</td>
																	<td>1415415</td>
																	<td>5</td>
																	<td>5</td>
																	<td>5</td>
																</tr>
																</tbody>
															</table>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>

													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>Eduardo</td>
										<td>1415415</td>
										<td>16</td>
										<td>25</td>
										<td>25</td>
										<td>15%</td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Eduardo5">
												<i class="fa fa-navicon"></i>
											</button>
											<div class="modal fade Eduardo5" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">

														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Avaliação Eduardo</h4>
														</div>
														<div class="modal-body">
															<h4>Nota das avaliações realizadas</h4>
															<table class="table responsive">
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
																<tr>
																	<td>Aaron</td>
																	<td>1415415</td>
																	<td>5</td>
																	<td>5</td>
																	<td>5</td>
																</tr>
																</tbody>
															</table>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>

													</div>
												</div>
											</div>
										</td>
									</tr>

									</tbody>
								</table>
								<!-- Início do conteudo da página  -->

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
