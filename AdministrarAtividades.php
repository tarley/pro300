<?php
	$permissaoPagina = "P";
	require_once ("ControleAcesso.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <?php include("includes/header.php") ?>
</head>


<body class="nav-md">

	<div class="container body">
		<div class="main_container">

			<?php include("includes/menu.php") ?>

			<div class="right_col" role="main">

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="dashboard_graph">

							<div class="row x_title">
								<div class="col-md-6">
									<h3>Atividades</h3>
								</div>
								<div class="col-md-6">

								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12">
								
									<div class="x_content">
									  <table class="table table-striped responsive-utilities jambo_table bulk_action">
										<thead>
										  <tr class="headings">
											<th style="width:40%" class="column-title">Nome das Atividades</th>
											<th class="column-title">Ações</th>
											</th>
										  </tr>
										</thead>

										<tbody>
										  <tr class="even pointer">
											<td class=" ">�?lgebra Linear e Cálculo Vetorial Sala 01 01/2016</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										  <tr class="odd pointer">
											<td class=" ">Estatística e Probabilidade 03 02/2016</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										  <tr class="even pointer">
											<td class=" ">Responsabilidade Social e Ambiental 04 02/2015</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										  <tr class="odd pointer">
											<td class=" ">Algoritmos e Programação 01 01/2016</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										  <tr class="even pointer">
											<td class=" ">Planejamento, Orçamento e Controle de Obras Sala 05 01/2016</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										  <tr class="odd pointer">
											<td class=" ">Instalações Hidráulicas e Sanitárias Sala 06 02/2017</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										  <tr class="even pointer">
											<td class=" ">Resistência dos Materiais I Sala 01 01/2016</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										  <tr class="odd pointer">
											<td class=" ">Ética e Legislação Profissional Sala 01 01/2016</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>

										  <tr class="even pointer">
											<td class=" ">Gestão Empresarial Sala 01 01/2016</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										  <tr class="odd pointer">
											<td class=" ">Resistência dos Materiais II Sala 01 01/2016</td>
												<td>
												  <a href="#" class="btn btn-primary btn-xs" title="Visualizar grupos da atividade"><i class="fa fa-folder"></i> Ver grupos </a>
												  <a href="#" class="btn btn-success btn-xs" title="Editar grupos da atividade"><i class="fa fa-pencil"></i> Editar </a>
												  <a href="#" class="btn btn-info btn-xs" title="Lançar notas dos alunos" title="Lançar notas dos alunos"><i class="fa fa-pencil-square-o"></i> Lançar Notas</a>
												  <a href="#" class="btn btn-warning btn-xs" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível" title="Enviar E-mail para os alunos informando que a avaliação de ajudantes e ajudados está disponível"><i class="fa fa-envelope-square"></i> Enviar E-mail</a>
												  <a href="#" class="btn btn-danger btn-xs" title="Encerra e fechar a atividade"><i class="fa fa-times"></i> Encerrar Atividade </a>
												  <a href="#" class="btn btn-dark btn-xs" title="Gerar relatório da atividade"><i class="fa fa-file-pdf-o"></i> Relatório</a>
												</td>
											</td>
										  </tr>
										</tbody>

									  </table>
									</div>
							</div>

							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<br />

				<!-- footer content -->

				<footer>
					<div class="copyright-info">
						<p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>		
						</p>
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
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

	<script src="js/bootstrap.min.js"></script>

	<!-- gauge js -->
	<script type="text/javascript" src="js/gauge/gauge.min.js"></script>
	<script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
	<!-- chart js -->
	<script src="js/chartjs/chart.min.js"></script>
	<!-- bootstrap progress js -->
	<script src="js/progressbar/bootstrap-progressbar.min.js"></script>
	<script src="js/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- icheck -->
	<script src="js/icheck/icheck.min.js"></script>
	<!-- daterangepicker -->
	<script type="text/javascript" src="js/moment/moment.min.js"></script>
	<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

	<script src="js/custom.js"></script>


	<!-- worldmap -->
	<script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/maps/gdp-data.js"></script>
	<script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
	<script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
	<!-- pace -->
	<script src="js/pace/pace.min.js"></script>
	<!-- skycons -->
	<script src="js/skycons/skycons.js"></script>
	<script>
		var icons = new Skycons({
				"color": "#73879C"
			}),
			list = [
				"clear-day", "clear-night", "partly-cloudy-day",
				"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
				"fog"
			],
			i;

		for (i = list.length; i--;)
			icons.set(list[i], list[i]);

		icons.play();
	</script>
		
	<script>
		NProgress.done();
	</script>
	<!-- /datepicker -->
	<!-- /footer content -->
</body>

</html>
