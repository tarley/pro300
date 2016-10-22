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
						<h3>Gestão de Grupos</h3><!-- Título da Página -->
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteudo da página  -->
								<div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
									<div class="panel">
										<a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
											<h4 class="panel-title">Grupo 1</h4>
										</a>

										<div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<table class="table table-striped responsive-utilities jambo_table">
													<thead>
													<tr>
														<th style="text-align: center">RA</th>
														<th style="text-align: center">Nome</th>
														<th style="text-align: center">Tipo</th>
														<th style="text-align: center">Nota</th>
														<th style="text-align: center">Desabilitar</th>

													</tr>
													</thead>
													<tbody>
													<tr class="even pointer">

														<td class=" " style="text-align: center">410981 </td>
														<td class=" ">Solano Belo</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-primary active"><input name="options1[]" value="1" type="radio" checked="checked">Lider</label><label class="btn btn-sm btn-default"><input name="options1[]" value="0" type="radio">Ajudado</label></div>
														</td>

														<td class=" " style="text-align: center">20</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records" >
														</td>

														</td>
													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">194604 </td>
														<td class=" ">Neuza Frois</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options2[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options2[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>

														<td class=" " style="text-align: center">13</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">452389 </td>
														<td class=" ">Vinícius Santana</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options3[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options3[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>

														<td class=" " style="text-align: center">14</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">790363 </td>
														<td class=" ">Graciano Bairros</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options4[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options4[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>

														<td class=" " style="text-align: center">15</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">487357 </td>
														<td class=" ">Clovis Silva</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options5[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options5[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>

														<td class=" " style="text-align: center">9</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

														</td>
													</tr>
													</tbody>
												</table>

											</div>
										</div>
									</div>
								</div>

								<div class="accordion" id="accordion2" role="tablist" aria-multiselectable="true">
									<div class="panel">
										<a class="panel-heading" role="tab" id="headingOne2" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
											<h4 class="panel-title">Grupo 2</h4>
										</a>
										<div id="collapseOne2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<table class="table table-striped responsive-utilities jambo_table">
													<thead>
													<tr>
														<th style="text-align: center">RA</th>
														<th style="text-align: center">Nome</th>
														<th style="text-align: center">Tipo</th>
														<th style="text-align: center">Nota</th>
														<th style="text-align: center">Desabilitar</th>
													</tr>
													</thead>
													<tbody>
													<tr class="even pointer">

														<td class=" " style="text-align: center">843915 </td>
														<td class=" ">Gabriela Cambezes</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-primary active"><input name="options6[]" value="1" type="radio" checked="checked">Lider</label><label class="btn btn-sm btn-default"><input name="options6[]" value="0" type="radio">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">16</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">519487 </td>
														<td class=" ">Capitolino Valério</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options7[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options7[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">15</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">717374 </td>
														<td class=" ">Tibúrcio Valverde</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options8[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options8[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">15</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">217560 </td>
														<td class=" ">Olívio Esteves</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options9[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options9[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">3</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">925684 </td>
														<td class=" ">Carlota Mourinho</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options10[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options10[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">1</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													</tbody>
												</table>

											</div>
										</div>
									</div>
								</div>

								<div class="accordion" id="accordion3" role="tablist" aria-multiselectable="true">
									<div class="panel">
										<a class="panel-heading" role="tab" id="headingOne3" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne">
											<h4 class="panel-title">Grupo 3</h4>
										</a>
										<div id="collapseOne3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<table class="table table-striped responsive-utilities jambo_table">
													<thead>
													<tr>
														<th style="text-align: center">RA</th>
														<th style="text-align: center">Nome</th>
														<th style="text-align: center">Tipo</th>
														<th style="text-align: center">Nota</th>
														<th style="text-align: center">Desabilitar</th>
													</tr>
													</thead>
													<tbody>
													<tr class="even pointer">

														<td class=" " style="text-align: center">962596 </td>
														<td class=" ">Eulália Neres</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-primary active"><input name="options12[]" value="1" type="radio" checked="checked">Lider</label><label class="btn btn-sm btn-default"><input name="options12[]" value="0" type="radio">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">17</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">404109 </td>
														<td class=" ">Élvio Ulhoa</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options13[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options13[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">10</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">362094 </td>
														<td class=" ">João Paulo</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options14[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options14[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">11</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">710730 </td>
														<td class=" ">Simone Escobar</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options15[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options15[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">5</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">263868 </td>
														<td class=" ">Plínio Caldeira</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options16[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options16[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">14</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													</tbody>
												</table>

											</div>
										</div>
									</div>
								</div>

								<div class="accordion" id="accordion4" role="tablist" aria-multiselectable="true">
									<div class="panel">
										<a class="panel-heading" role="tab" id="headingOne4" data-toggle="collapse" data-parent="#accordion4" href="#collapseOne4" aria-expanded="true" aria-controls="collapseOne">
											<h4 class="panel-title">Grupo 4</h4>
										</a>
										<div id="collapseOne4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<table class="table table-striped responsive-utilities jambo_table">
													<thead>
													<tr>
														<th style="text-align: center">RA</th>
														<th style="text-align: center">Nome</th>
														<th style="text-align: center">Tipo</th>
														<th style="text-align: center">Nota</th>
														<th style="text-align: center">Desabilitar</th>
													</tr>
													</thead>
													<tbody>
													<tr class="even pointer">

														<td class=" " style="text-align: center">11111111 </td>
														<td class=" ">Adão Alvim</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-primary active"><input name="options17[]" value="1" type="radio" checked="checked">Lider</label><label class="btn btn-sm btn-default"><input name="options17[]" value="0" type="radio">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">29</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">680123 </td>
														<td class=" ">Almor Sardinha</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options18[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options18[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">14</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">504383 </td>
														<td class=" ">Tatiana Onofre</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options19[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options19[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">13</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">484303 </td>
														<td class=" ">João Paulo</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options20[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options20[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">6</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">698635 </td>
														<td class=" ">Hermano Vila-Chã</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options21[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options21[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">15</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													</tbody>
												</table>

											</div>
										</div>
									</div>
								</div>

								<div class="accordion" id="accordion5" role="tablist" aria-multiselectable="true">
									<div class="panel">
										<a class="panel-heading" role="tab" id="headingOne5" data-toggle="collapse" data-parent="#accordion5" href="#collapseOne5" aria-expanded="true" aria-controls="collapseOne">
											<h4 class="panel-title">Grupo 5</h4>
										</a>
										<div id="collapseOne5" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<table class="table table-striped responsive-utilities jambo_table">
													<thead>
													<tr>
														<th style="text-align: center">RA</th>
														<th style="text-align: center">Nome</th>
														<th style="text-align: center">Tipo</th>
														<th style="text-align: center">Nota</th>
														<th style="text-align: center">Desabilitar</th>
													</tr>
													</thead>
													<tbody>
													<tr class="even pointer">

														<td class=" " style="text-align: center">914273 </td>
														<td class=" ">Dinis Furquim</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-primary active"><input name="options22[]" value="1" type="radio" checked="checked">Lider</label><label class="btn btn-sm btn-default"><input name="options22[]" value="0" type="radio">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">23</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">598087 </td>
														<td class=" ">Lúcio Neves</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options23[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options23[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">14</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">154506 </td>
														<td class=" ">Soraia Valério</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options24[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options24[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">7</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">361247 </td>
														<td class=" ">Guadalupe Caeira</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options25[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options25[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">8</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">186271 </td>
														<td class=" ">Lília Temes</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options26[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options26[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">15</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													</tbody>
												</table>

											</div>
										</div>
									</div>
								</div>

								<div class="accordion" id="accordion6" role="tablist" aria-multiselectable="true">
									<div class="panel">
										<a class="panel-heading" role="tab" id="headingOne6" data-toggle="collapse" data-parent="#accordion6" href="#collapseOne6" aria-expanded="true" aria-controls="collapseOne">
											<h4 class="panel-title">Grupo 6</h4>
										</a>
										<div id="collapseOne6" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<table class="table table-striped responsive-utilities jambo_table">
													<thead>
													<tr>
														<th style="text-align: center">RA</th>
														<th style="text-align: center">Nome</th>
														<th style="text-align: center">Tipo</th>
														<th style="text-align: center">Nota</th>
														<th style="text-align: center">Desabilitar</th>
													</tr>
													</thead>
													<tbody>
													<tr class="even pointer">

														<td class=" " style="text-align: center">581751 </td>
														<td class=" ">�?talo Albernaz</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-primary active"><input name="options27[]" value="1" type="radio" checked="checked">Lider</label><label class="btn btn-sm btn-default"><input name="options27[]" value="0" type="radio">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">25</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">538204 </td>
														<td class=" ">Raimundo Salomão</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options28[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options28[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">14</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">306046 </td>
														<td class=" ">Maura Tabosa</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options29[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options29[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">13</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="odd pointer">

														<td class=" " style="text-align: center">196169 </td>
														<td class=" ">Brás Fitas</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options30[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options30[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">12</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													<tr class="even pointer">

														<td class=" " style="text-align: center">297274 </td>
														<td class=" ">Justino Camilo</td>
														<td style="text-align: center"> <div class="btn-group btn-toggle text-right" data-toggle="buttons"><label class="btn btn-sm btn-default"><input name="options31[]" value="1" type="radio">Lider</label><label class="btn btn-sm btn-primary active"><input name="options31[]" value="0" type="radio" checked="checked">Ajudado</label></div>
														</td>
														<td class=" " style="text-align: center">11</td>

														<td class="a-center " style="text-align: center">
															<input type="checkbox" class="flat" name="table_records">
														</td>

													</tr>
													</tbody>
												</table>


											</div>
										</div>
									</div>
									<br/>

								</div>

								<button type="button" class="btn btn-primary">Salvar</button>
								<div class="clearfix"></div>
								<!-- Fim do conteudo da página  -->

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
