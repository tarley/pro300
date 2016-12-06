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
										<th>Lider</th>
										<th>Grupo</th>
									</tr>
									</thead>
									<tbody id="filho">
									</tbody>
								</table>
								<input type="submit" class="btn btn-success" name="confirmar" id="confirmar" value="confirmar">
								<span>Quantidade mínima de pessoas por grupo</span>
								<input type="text" name="qtd-pessoas-por-grupo" id="qtd-pessoas-por-grupo" value="">
								<input type="submit" class="btn btn-success" name="gerar_grupos" id="gerar_grupos" value="Gerar grupos">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
		<div>
			<div class="panel panel-default">
				<div class="panel-heading" id="return-user">

				</div>
				<div class="panel-body">

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
    var codAtividade = <?php echo $_GET['codAtividade']?>;
</script>
<script src="js/lancamentoNota.js"></script>
</body>
</html>

