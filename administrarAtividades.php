<?php
	$permissaoPagina = "P";
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
							<h3>Atividades</h3>
						</div>
					</div>

					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">

							<div class="x_panel">
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
											<td class=" ">Álgebra Linear e Cálculo Vetorial Sala 01 01/2016</td>
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
