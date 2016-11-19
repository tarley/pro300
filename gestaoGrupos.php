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

										<div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											
											<div id="tabelaListaGrupo" class="panel-body">
												

											</div>											
										</div>
									</div>
								</div>
								
								
									<div class="form-group">
										<div class="col-md-12 col-sm-0 col-xs-0 col-md-offset-0" style="margin-top:9px">
												<input type="button" class="btn btn-primary" name="voltar" id="voltar" value="Voltar">
												<input type="button" class="btn btn-success" name="salvar" id="salvar" value="Salvar">
										</div>
									</div>
								
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

	<script src="js/listaGruposPorAtividade.js"></script>
		
		<script>
		
			var codAtividade = <?php echo $_GET['codAtividade']?>;
			var div = $('#tabelaListaGrupo');
			
			var g = new grupo();
			g.listarGrupos(div, codAtividade);		
			
		</script>
		
		<script>
		
			$(document).ready(function() {
				$(document).on("click", "#btnEncerrarAtividade", function(e){
					var cod_atividade = $(this).parent().parent().attr("id");
					console.log(cod_atividade);
					$.post("classes/Atividade.class.php?acao=encerrar", { cod_atividade: cod_atividade })
						.done(function(result){
							alert(result.msg);

							if(result.erro == false)
							{
								atv.listarAtividades(tbody);
							}
						});

					e.preventDefault();
				});
				
				$(document).on("click", "#salvar", function(e){
				
					var listaCodInscricao = "";
					var listaLider = "";
					var listaSituacao = "";
					//var $codInscricao = 
					$("input[name='codInscricao']").each(function(){
						if(listaCodInscricao != "")
							listaCodInscricao += ",";
							
						listaCodInscricao += this.value;
					});
				
					$("input[name=lider][checked]:radio").each(function(){
						if(listaLider != "")
							listaLider += ",";
							
						listaLider += this.value;
					});
					
					$("input[name=situacao][checked]:radio").each(function(){
						if(listaSituacao != "")
							listaSituacao += ",";
							
						listaSituacao += this.value;
					});
					
					console.log(listaCodInscricao);
					console.log(listaLider);
					console.log(listaSituacao);
					
					$.post("classes/Inscricao.class.php?acao=update", {
						codInscricao: listaCodInscricao, 
						lider: listaLider,  
						situacao: listaSituacao
					}).done(function(result) {
						console.log(result);
						alert(result.msg);
						
						// Verificar se precisa disso
						//g.listarGrupos(div, codAtividade);						
					}).error(function(error) {
						console.log(error);
						alert(error.responseText);						
					});
				});
				
				
			});
			
			
		</script>
		
		<script>
		$("#voltar").click(function(e){
			window.location = "administrarAtividades.php";
		});
		</script>
	
</body>
</html>

