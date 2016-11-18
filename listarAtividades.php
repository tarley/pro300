<?php
	$permissaoPagina = "A"; // A ou P de acordo com o perfil do usuário
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
									<div id="atividades"></div>
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
	<script type="text/javascript">
		$.get("classes/Atividade.class.php?acao=listarPorAluno").done(function(result){

			if(result.erro) {
				alert('Falha ao carregar atividades. Mensagem de erro:\r\n\r\n' + result.msg);
				return;
			}

			var div = $("#atividades");

			var table = $("<table>");
			table.addClass("table table-striped table-bordered");
			div.append(table);

			var tr = $("<tr>");
			table.append(tr);

			var thCod = $("<th>");
			thCod.text("Código");
			thCod.addClass("text-center");
			tr.append(thCod);

			var thDesc = $("<th>");
			thDesc.text("Descrição");
			tr.append(thDesc);

			var thDtaInic = $("<th>");
			thDtaInic.text("Data Inicio");
			thDtaInic.addClass("text-center");
			tr.append(thDtaInic);

			var thDtaFim = $("<th>");
			thDtaFim.text("Data Fim");
			thDtaFim.addClass("text-center");
			tr.append(thDtaFim);

			var thAction = $("<th>");
			tr.append(thAction);
			
			$.each(result.dado, function (idx, value) {
				//alert(value.toSource());

				var row = $("<tr>");

				var tdCod = $("<td>");
				tdCod.text(value.cod_atividade);
				tdCod.addClass("text-center");
				row.append(tdCod);

				var tdDesc = $("<td>");
				tdDesc.text(value.desc_atividade);
				row.append(tdDesc);

				var tdDtaInic = $("<td>");
				tdDtaInic.text(value.data_inicio);
				tdDtaInic.addClass("text-center");
				row.append(tdDtaInic);

				var tdDtaFim = $("<td>");
				tdDtaFim.text(value.data_fim);
				tdDtaFim.addClass("text-center");
				row.append(tdDtaFim);

				var tdAction = $("<td>");
				tdAction.addClass("text-center");
				row.append(tdAction);

				var btn = $("<a class='btn btn-primary btn-xs'>Avaliar</a>");
				btn.attr("href", "avaliacao.php?codInscricao=" + value.cod_inscricao);

				if (value.situacao == 2)
					tdAction.append(btn);

				table.append(row);
			});
		});

	</script>
</body>
</html>

