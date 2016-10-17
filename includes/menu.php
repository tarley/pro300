<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Ver gruposport" content="width=device-width, initial-scale=1">

	<title>Projeto 300 </title>

	<!-- Bootstrap core CSS -->

	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/animate.min.css" rel="stylesheet">

	<!-- Custom styling plus plugins -->
	<link href="../css/custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/maps/jquery-jvectormap-2.0.3.css" />
	<link href="../css/icheck/flat/green.css" rel="stylesheet" />
	<link href="../css/floatexamples.css" rel="stylesheet" type="text/css" />

	<script src="../js/jquery.min.js"></script>
	<script src="../js/nprogress.js"></script>

	<!--[if lt IE 9]>
	<!--script src="../assets/js/ie8-responsive-file-warning.js"></script-->
	<![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries 
	<!--[if lt IE 9]>
	<!--script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script-->
	<![endif]-->
</head>


<body class="nav-md">

	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-Ver grupos">

					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Empty!</span></a>
					</div>
					<div class="clearfix"></div>

					<!-- menu prile quick info -->
					<div class="profile">
						<div class="profile_pic">
							<img src="images/img.jpg" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>Empty user</h2>
						</div>
					</div>
					<!-- /menu prile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu" style="display: none">
										<li><a href="lancamentoNota.html">Lançamento Nota</a></li>
										<li><a href="AvaliacaoAjudado.html">Avaliação Ajudado</a></li>
										<li><a href="AvaliacaoLider.html">Avaliação Lider</a></li>
										<li><a href="CadastroProfessor.html">Cadastro Professor</a></li>
										<li><a href="gestao_dos_grupos.html">Gestão Grupos</a></li>
										<li><a href="gestao_grupos_filtro_atividade.html">Filtro Atividade</a></li>
										<li><a href="parametroAvaliacao.html">Paramentro Avaliação</a></li>
										<li><a href="cadastro_aluno.html">Cadastro Aluno</a></li>
										<li><a href="cadastro_avaliacao.html">Cadastro Avaliação</a></li>
										<li><a href="inscricao_avaliacao.html">Incrição Avaliação</a></li>
										<li><a href="relatorioAtividade.html">Relatório Atividade</a></li>
										<li><a href="Telafinal.html">Tela Final</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">

				<div class="nav_menu">
					<nav class="" role="navigation">
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>
					</nav>
				</div>

			</div>
			<!-- /top navigation -->

	</div>

	<div id="custom_notifications" class="custom-notifications dsp_none">
		<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
		</ul>
		<div class="clearfix"></div>
		<div id="notif-group" class="tabbed_notifications"></div>
	</div>

	<script src="../js/bootstrap.min.js"></script>

	<!-- gauge js -->
	<script type="text/javascript" src="../js/gauge/gauge.min.js"></script>
	<script type="text/javascript" src="../js/gauge/gauge_demo.js"></script>
	<!-- chart js -->
	<script src="../js/chartjs/chart.min.js"></script>
	<!-- bootstrap progress js -->
	<script src="../js/progressbar/bootstrap-progressbar.min.js"></script>
	<script src="../js/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- icheck -->
	<script src="../js/icheck/icheck.min.js"></script>
	<!-- daterangepicker -->
	<script type="text/javascript" src="../js/moment/moment.min.js"></script>
	<script type="text/javascript" src="../js/datepicker/daterangepicker.js"></script>

	<script src="../js/custom.js"></script>


	<!-- worldmap -->
	<script type="text/javascript" src="../js/maps/jquery-jvectormap-2.0.3.min.js"></script>
	<script type="text/javascript" src="../js/maps/gdp-data.js"></script>
	<script type="text/javascript" src="../js/maps/jquery-jvectormap-world-mill-en.js"></script>
	<script type="text/javascript" src="../js/maps/jquery-jvectormap-us-aea-en.js"></script>
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
