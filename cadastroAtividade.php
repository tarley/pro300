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
						<h3>Cadastro Atividade</h3><!-- Título da Página -->
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteudo da página  -->

								<!-- alteração -->
								<div class="col-md-6 col-sm-12 col-xs-6">
									<div class="x_content">
										<div class="form-group col-md-12 col-s m-12 col-xs-6" method="get">
											<label class="control-label">Token*: </label>
											<input type="text" name="token" class="form-control" id="token">
										</div>
										<div class="form-group col-md-12 col-sm-12 col-xs-6">
											<label class="control-label">Período de
												inscrição da Prova300*:
											</label>
											<div class="control-group">
												<div class="controls">
													<div class="input-prepend input-group">
														<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
														<input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control"  />
													</div>
												</div>
											</div>
										</div>
										

										<div class="form-group col-md-12 col-sm-12 col-xs-6">
											<label class="control-label">Descrição da prova*:</label>
											<textarea class="form-control" rows="4" name="descricao" id="descricao"></textarea>
										</div>

										<p class="col-md-12 col-sm-12 col-xs-6">* Informações Obrigatórias</p>

										<div class="form-group">
											<div class="col-md-12 col-sm-0 col-xs-0 col-md-offset-0" style="margin-top:9px">
												<input type="submit" class="btn btn-primary" name="cancelar" id="cancelar" value="Cancelar">
												<input type="submit" class="btn btn-success" name="confirmar" id="confirmar" value="Confirmar">
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<!-- Fim do conteudo da página  -->

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

<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
<script>

	$("#confirmar").click(function(e) {

		var now = moment();

		var token = $("#token").val();
		var descricao = $("#descricao").val();
		var dataInicio = $('#reservation').data('daterangepicker').startDate.format('YYYY-MM-DD');
		var dataFim = $('#reservation').data('daterangepicker').endDate.format('YYYY-MM-DD');

		if (token == "") {
			alert("Preencha o campo Token!");
			e.preventDefault();
			return;
		}

		var dtInicio = moment(dataInicio);
		now = moment(now, 'YYYY-MM-DD');
		
		if (now.isAfter(dtInicio, 'day')){
			alert("Data inválida!");
			e.preventDefault();
			return;
		}

		if (descricao == "") {
			alert("Preencha o campo de Descrição!");
			e.preventDefault();
			return;
		}

		$.post("classes/Atividade.class.php?acao=inserir", { token: token, descricao: descricao, dataInicio: dataInicio, dataFim: dataFim})
			.done(function(result){
				console.log(result);
				alert(result.msg);

				if(result.erro==false){
					console.log("sim");
					window.location = "administrarAtividades.php";
				}
			});

		e.preventDefault();
	});

	$("#cancelar").click(function(e){
			window.location = "administrarAtividades.php";
	});

</script>
</body>
</html>
