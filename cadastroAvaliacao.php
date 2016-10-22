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
						<h3>Cadastro Avaliação</h3><!-- Título da Página -->
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteudo da página  -->
								<?php

								include 'classes/util/Util.php';

								$bd;

								$bd = new BDConnection();

								if(isset($_POST['confirmar'])){

									echo "ok";

									$token = trim(strip_tags($_POST['token']));
									$descricao = trim(strip_tags($_POST['descricao']));
									$professor = 1;

									try{
										$inj = 'INSERT INTO tb_atividade (token,desc_atividade,cod_professor) VALUES (:token,:descricao,:cod_professor)';

										$conn = $bd->getConnection();
										$resultado = $conn->prepare($inj);

										$resultado->bindParam(':token', $token);
										$resultado->bindParam(':descricao', $descricao);
										$resultado->bindParam(':cod_professor', $professor);

										$resultado->execute();

										//contar registro no BD
										echo $contar = $resultado->rowCount();
										if ($contar>0){
											$token= $_POST['token'];
											$descricao = $_POST['descricao'];
											$_SESSION['tokenteste'] = $token;
											$_SESSION['desteste'] = $token;

											//arquivo de direcionamento da pagina
										}else{
											echo "erro";
										}

									}catch (PDOException $e){
										echo $e;
									}
									finally{
										close($bd);
									}
								}

								?>

								<!-- alteração -->
								<div class="col-md-6 col-sm-12 col-xs-6">
									<div class="x_content">
										<form action="CadastroAvaliacao.php" method="post">
											<div class="form-group col-md-12 col-s m-12 col-xs-6" method="get">
												<label class="control-label">Token*: </label>
												<input type="text" name="token" class="form-control">
											</div>
											<div class="form-group col-md-12 col-sm-12 col-xs-6">
												<label class="control-label">Período de
													inscrição da Prova300*:
												</label>
												<div class="control-group">
													<div class="controls">
														<div class="input-prepend input-group">
															<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
															<input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="03/18/2013 - 03/23/2013" />
														</div>
													</div>
												</div>
											</div>
											<!--<div class="control-group">
													<div class="controls">
														<div class="col-md-5 xdisplay_inputx form-group has-feedback">
															<input type="text" class="form-control has-feedback-left"
																   id="single_cal3" placeholder="Data Inicial"
																   aria-describedby="inputSuccess2Status3">
															<span class="fa fa-calendar-o form-control-feedback left"
																  aria-hidden="true"></span>
															<span id="inputSuccess2Status3" class="sr-only">(success)</span>
													</div>
												</div>
												<div class="controls">
													<div class="col-md-5 xdisplay_inputx form-group has-feedback">
														<input type="text" class="form-control has-feedback-left"
															   id="single_cal5" placeholder="Data Final"
															   aria-describedby="inputSuccess2Status3">
														<span class="fa fa-calendar-o form-control-feedback left"
															  aria-hidden="true"></span>
														<span id="inputSuccess2Status3" class="sr-only">(success)</span>
													</div>
												</div>
											</div> -->

											<div class="form-group col-md-12 col-sm-12 col-xs-6">
												<label class="control-label">Descrição da prova*:</label>
												<textarea class="form-control" rows="4" name="descricao"></textarea>
											</div>

											<p class="col-md-12 col-sm-12 col-xs-6">* Informações Obrigatórias</p>

											<div class="form-group">
												<div class="col-md-12 col-sm-0 col-xs-0 col-md-offset-0" style="margin-top:9px">
													<button type="reset" class="btn btn-primary">Limpar</button>
													<input type="submit" class="btn btn-success" name="confirmar" value="Confirmar">
												</div>
											</div>
										</form>
									</div>
								</div>
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
