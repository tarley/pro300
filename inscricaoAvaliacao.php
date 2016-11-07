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
							<h3>Inscrição Avaliação</h3>
						</div>
					</div>
					
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">

							<div class="x_panel">
								<div class="x_content">
									<form action ="inscricaoAvaliacao.php" method="post" class="form-group">
										<div class="form-group">
											<label>Inserir token*:</label>
											<input type="text" name="token" id = "token" class="form-control">
										</div>
										<button type="submit" class="btn btn-primary">Cancelar</button>
										<button type="submit" class="btn btn-success" name ="enviar" id = "enviar">Enviar</button>
									</form>
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
	<script type="text/javascript">
		$("#enviar").click(function(e){

			var token1 = $("#token").val();
			

			if (token1 == "") {
				alert("Preencha o campo token");
				e.preventDefault();
				return;
			}


			$.post("classes/Inscricao.class.php?acao=inserir", { token: token1 })
				.done(function(result){
					if (result.erro)
						alert(result.msg);
					else{
						alert("Inscrição realizada com sucesso!");
						window.location = "homeAluno.php";
					}

				});

			e.preventDefault();
		});
	</script>
</body>
</html>
