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
						<h3>Parâmetros De Avaliação De Grupo</h3>
					</div>
				</div>


				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteudo da página  -->
								<table class="table">
									<thead>
									<tr>
										<td class="text-center" colspan = "2">Melhora</td>
										<td class="text-center">1 Ponto</td>
										<td class="text-center">2 Pontos</td>
										<td class="text-center">3 Pontos</td>
										<td class="text-center">4 Pontos</td>
										<td class="text-center">5 Pontos</td>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center"><input type="text" name="txtAM1" value = "0" placeholder="Min" size = "5"></td>
										<td class="text-center"><input type="text" name="txtAM2" value = "3"placeholder="Max" size = "5"></td>
										<td class="text-center"><input type="text" name="txtAM-1"  size = "5"></td>
										<td class="text-center"><input type="text" name="txt03-2" size = "5"></td>
										<td class="text-center"><input type="text" name="txt03-3" size = "5"></td>
										<td class="text-center"><input type="text" name="txt04-4" size = "5"></td>
										<td class="text-center"><input type="text" name="txt04-5" size = "5"></td>
									</tr>
									<tr>
										<td class="text-center"><input type="text" name="txtAM3" value = "4" placeholder="Min" size = "5"></td>
										<td class="text-center"><input type="text" name="txtAM4" value = "12"placeholder="Max" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMenor12-1" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMenor12-3" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMenor12-4" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMenor12-5" size = "5"></td>
										<td class="text-center"><input type="text" name="txt04-5" size = "5"></td>
									</tr>
									<tr>
										<td class="text-center"><input type="text" name="txtAM5" value = "13"placeholder="Min" size = "5"></td>
										<td class="text-center"><input type="text" name="txtAM6" value = "19" placeholder="Max" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMaior12-1" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMaior12-3" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMaior12-4" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMaior12-5" size = "5"></td>
										<td class="text-center"><input type="text" name="txt04-5" size = "5"></td>
									</tr>
									<tr>
										<td class="text-center"><input type="text" name="txtAM7" placeholder="Min" size = "5"></td>
										<td class="text-center"><input type="text" name="txtAM8" placeholder="Max"size = "5"></td>
										<td class="text-center"><input type="text" name="txtMaior19-1" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMaior19-3" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMaior19-4" size = "5"></td>
										<td class="text-center"><input type="text" name="txtMaior19-5" size = "5"></td>
										<td class="text-center"><input type="text" name="txt04-5" size = "5"></td>
									</tr>
									</tbody>
								</table>
								<button type="submit" class="btn btn-success">Salvar Dados</button>
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
