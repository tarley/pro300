<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Projeto 300 </title>

	<!-- Bootstrap core CSS -->

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-progressbar -->
	<link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- JQVMap -->
	<link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="fonts/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">

	<!-- Custom styling plus plugins -->
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
	<link href="css/icheck/flat/green.css" rel="stylesheet" />
	<link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

	<script src="js/jquery.min.js"></script>
	<script src="js/nprogress.js"></script>

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
			<div class="left_col scroll-view">

				<div class="navbar nav_title" style="border: 0;">
					<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Projeto 300</span></a>
				</div>
				<div class="clearfix"></div>

				<!-- menu prile quick info -->
				<div class="profile">
					<div class="profile_pic">
						<img src="images/img.jpg" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Bem vindo!</span>
						<h2>Usuário</h2>
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


		<!-- page content -->
		<div class="right_col" role="main">

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard_graph">

						<div class="row x_title">
							<div class="col-md-6">
								<h3>Lançamento Notas</h3>
							</div>
							<div class="col-md-6">

							</div>
						</div>

						<div class=row>
							<div class="col-md-8 col-sm-8 col-xs-8">

                                <div class="x_content">
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

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<div>
	<!-- footer content -->
	<footer>
		<div class="copyright-info">
			<p class="pull-right">Projeto 300 <a href="http://www.newtonpaiva.br">Colorlib</a>
			</p>
		</div>
		<div class="clearfix"></div>
	</footer>
	<!-- /footer content -->
</div>
<!-- /page content -->

<div id="custom_notifications" class="custom-notifications dsp_none">
	<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
	</ul>
	<div class="clearfix"></div>
	<div id="notif-group" class="tabbed_notifications"></div>
</div>

		<!-- jQuery -->
		<script src="../vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="../vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="../vendors/nprogress/nprogress.js"></script>
		<!-- Chart.js -->
		<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
		<!-- gauge.js -->
		<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- iCheck -->
		<script src="../vendors/iCheck/icheck.min.js"></script>
		<!-- Skycons -->
		<script src="../vendors/skycons/skycons.js"></script>
		<!-- Flot -->
		<script src="../vendors/Flot/jquery.flot.js"></script>
		<script src="../vendors/Flot/jquery.flot.pie.js"></script>
		<script src="../vendors/Flot/jquery.flot.time.js"></script>
		<script src="../vendors/Flot/jquery.flot.stack.js"></script>
		<script src="../vendors/Flot/jquery.flot.resize.js"></script>
		<!-- Flot plugins -->
		<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
		<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
		<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
		<!-- DateJS -->
		<script src="../vendors/DateJS/build/date.js"></script>
		<!-- JQVMap -->
		<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
		<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
		<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="js/moment/moment.min.js"></script>
		<script src="js/datepicker/daterangepicker.js"></script>

		<!-- Custom Theme Scripts -->
		<script src="../build/js/custom.min.js"></script>

		<!-- Flot -->

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

<!-- flot js -->
<!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="js/flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript" src="js/flot/date.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
<script type="text/javascript" src="js/flot/curvedLines.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
<script>
	$(document).ready(function() {
		// [17, 74, 6, 39, 20, 85, 7]
		//[82, 23, 66, 9, 99, 6, 2]
		var data1 = [
			[gd(2012, 1, 1), 17],
			[gd(2012, 1, 2), 74],
			[gd(2012, 1, 3), 6],
			[gd(2012, 1, 4), 39],
			[gd(2012, 1, 5), 20],
			[gd(2012, 1, 6), 85],
			[gd(2012, 1, 7), 7]
		];

		var data2 = [
			[gd(2012, 1, 1), 82],
			[gd(2012, 1, 2), 23],
			[gd(2012, 1, 3), 66],
			[gd(2012, 1, 4), 9],
			[gd(2012, 1, 5), 119],
			[gd(2012, 1, 6), 6],
			[gd(2012, 1, 7), 9]
		];
		$("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
			data1, data2
		], {
			series: {
				lines: {
					show: false,
					fill: true
				},
				splines: {
					show: true,
					tension: 0.4,
					lineWidth: 1,
					fill: 0.4
				},
				points: {
					radius: 0,
					show: true
				},
				shadowSize: 2
			},
			grid: {
				verticalLines: true,
				hoverable: true,
				clickable: true,
				tickColor: "#d5d5d5",
				borderWidth: 1,
				color: '#fff'
			},
			colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
			xaxis: {
				tickColor: "rgba(51, 51, 51, 0.06)",
				mode: "time",
				tickSize: [1, "day"],
				//tickLength: 10,
				axisLabel: "Date",
				axisLabelUseCanvas: true,
				axisLabelFontSizePixels: 12,
				axisLabelFontFamily: 'Verdana, Arial',
				axisLabelPadding: 10
				//mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
			},
			yaxis: {
				ticks: 8,
				tickColor: "rgba(51, 51, 51, 0.06)",
			},
			tooltip: false
		});

		function gd(year, month, day) {
			return new Date(year, month - 1, day).getTime();
		}
	});
</script>

<!-- worldmap -->
<script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
<script type="text/javascript" src="js/maps/gdp-data.js"></script>
<script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
<script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
<!-- pace -->
<script src="js/pace/pace.min.js"></script>
<script>
	$(function() {
		$('#world-map-gdp').vectorMap({
			map: 'world_mill_en',
			backgroundColor: 'transparent',
			zoomOnScroll: false,
			series: {
				regions: [{
					values: gdpData,
					scale: ['#E6F2F0', '#149B7E'],
					normalizeFunction: 'polynomial'
				}]
			},
			onRegionTipShow: function(e, el, code) {
				el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
			}
		});
	});
</script>
<!-- skycons -->
<script src="js/skycons/skycons.min.js"></script>
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

<!-- dashbord linegraph -->
<script>
	var doughnutData = [{
		value: 30,
		color: "#455C73"
	}, {
		value: 30,
		color: "#9B59B6"
	}, {
		value: 60,
		color: "#BDC3C7"
	}, {
		value: 100,
		color: "#26B99A"
	}, {
		value: 120,
		color: "#3498DB"
	}];
	var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
</script>
<!-- /dashbord linegraph -->
<!-- datepicker -->
<script type="text/javascript">
	$(document).ready(function() {

		var cb = function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
		}

		var optionSet1 = {
			startDate: moment().subtract(29, 'days'),
			endDate: moment(),
			minDate: '01/01/2012',
			maxDate: '12/31/2015',
			dateLimit: {
				days: 60
			},
			showDropdowns: true,
			showWeekNumbers: true,
			timePicker: false,
			timePickerIncrement: 1,
			timePicker12Hour: true,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			opens: 'left',
			buttonClasses: ['btn btn-default'],
			applyClass: 'btn-small btn-primary',
			cancelClass: 'btn-small',
			format: 'MM/DD/YYYY',
			separator: ' to ',
			locale: {
				applyLabel: 'Submit',
				cancelLabel: 'Clear',
				fromLabel: 'From',
				toLabel: 'To',
				customRangeLabel: 'Custom',
				daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
				monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				firstDay: 1
			}
		};
		$('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
		$('#reportrange').daterangepicker(optionSet1, cb);
		$('#reportrange').on('show.daterangepicker', function() {
			console.log("show event fired");
		});
		$('#reportrange').on('hide.daterangepicker', function() {
			console.log("hide event fired");
		});
		$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
			console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
		});
		$('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
			console.log("cancel event fired");
		});
		$('#options1').click(function() {
			$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
		});
		$('#options2').click(function() {
			$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
		});
		$('#destroy').click(function() {
			$('#reportrange').data('daterangepicker').remove();
		});
	});
</script>

<!-- datepicker -->
<script type="text/javascript">
	$(document).ready(function() {

		var cb = function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
			$('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
		}

		var optionSet1 = {
			startDate: moment().subtract(29, 'days'),
			endDate: moment(),
			minDate: '01/01/2012',
			maxDate: '12/31/2015',
			dateLimit: {
				days: 60
			},
			showDropdowns: true,
			showWeekNumbers: true,
			timePicker: false,
			timePickerIncrement: 1,
			timePicker12Hour: true,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			opens: 'right',
			buttonClasses: ['btn btn-default'],
			applyClass: 'btn-small btn-primary',
			cancelClass: 'btn-small',
			format: 'MM/DD/YYYY',
			separator: ' to ',
			locale: {
				applyLabel: 'Submit',
				cancelLabel: 'Clear',
				fromLabel: 'From',
				toLabel: 'To',
				customRangeLabel: 'Custom',
				daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
				monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				firstDay: 1
			}
		};

		$('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

		$('#reportrange_right').daterangepicker(optionSet1, cb);

		$('#reportrange_right').on('show.daterangepicker', function() {
			console.log("show event fired");
		});
		$('#reportrange_right').on('hide.daterangepicker', function() {
			console.log("hide event fired");
		});
		$('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
			console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
		});
		$('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
			console.log("cancel event fired");
		});

		$('#options1').click(function() {
			$('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
		});

		$('#options2').click(function() {
			$('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
		});

		$('#destroy').click(function() {
			$('#reportrange_right').data('daterangepicker').remove();
		});

	});
</script>
<!-- datepicker -->
<script type="text/javascript">
	$(document).ready(function() {

		var cb = function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
		}

		var optionSet1 = {
			startDate: moment().subtract(29, 'days'),
			endDate: moment(),
			minDate: '01/01/2012',
			maxDate: '12/31/2015',
			dateLimit: {
				days: 60
			},
			showDropdowns: true,
			showWeekNumbers: true,
			timePicker: false,
			timePickerIncrement: 1,
			timePicker12Hour: true,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			opens: 'left',
			buttonClasses: ['btn btn-default'],
			applyClass: 'btn-small btn-primary',
			cancelClass: 'btn-small',
			format: 'MM/DD/YYYY',
			separator: ' to ',
			locale: {
				applyLabel: 'Submit',
				cancelLabel: 'Clear',
				fromLabel: 'From',
				toLabel: 'To',
				customRangeLabel: 'Custom',
				daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
				monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				firstDay: 1
			}
		};
		$('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
		$('#reportrange').daterangepicker(optionSet1, cb);
		$('#reportrange').on('show.daterangepicker', function() {
			console.log("show event fired");
		});
		$('#reportrange').on('hide.daterangepicker', function() {
			console.log("hide event fired");
		});
		$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
			console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
		});
		$('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
			console.log("cancel event fired");
		});
		$('#options1').click(function() {
			$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
		});
		$('#options2').click(function() {
			$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
		});
		$('#destroy').click(function() {
			$('#reportrange').data('daterangepicker').remove();
		});
	});
</script>
<!-- /datepicker -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#single_cal1').daterangepicker({
			singleDatePicker: true,
			calender_style: "picker_1"
		}, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});
		$('#single_cal2').daterangepicker({
			singleDatePicker: true,
			calender_style: "picker_2"
		}, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});
		$('#single_cal3').daterangepicker({
			singleDatePicker: true,
			calender_style: "picker_3"
		}, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});
		$('#single_cal4').daterangepicker({
			singleDatePicker: true,
			calender_style: "picker_4"
		}, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#reservation').daterangepicker(null, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});
	});
</script>
<!-- /datepicker -->


<script>
	NProgress.done();
</script>
<!-- /datepicker -->
<!-- /footer content -->
</body>

</html>
