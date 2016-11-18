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
<?php
	echo "teste";
	
	if(isset($_POST['codInscricao'])) {
		echo "<br/>" . count( $_POST['codInscricao']);
	}
	
	if(isset($_POST['lider'])) {
		echo "<br/>" . count( $_POST['lider']);
	}
	
	if(isset($_POST['situacao'])) {
		echo "<br/>" . count( $_POST['situacao']);
	}
?>

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
								<form id="editarInscricao" action="gestaoGrupos.php" method="post">								
								<div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
									
									<div class="panel">

										<div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											
											<div id="tabelaListaGrupo" class="panel-body">
												

											</div>											
										</div>
									</div>
								</div>


								<input class="btn btn-primary" value="salvar" id="salvar">Salvar alterações</button>
								<div class="clearfix"></div>								
								</form>
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
					$('tr[data-tipo="resposta"]').each(function(){
						var $codInscricao = $("input[name='codInscricao']",this).val();
						var $tipo = $("input[name=lider][checked]:radio", this);
						var $situacao = $("input[name=situacao][checked]:radio", this)
						console.log(this);
						console.log($codInscricao);
						console.log($tipo);
						console.log($situacao);
					});
					e.preventDefault();
				});
				
			});
			
			
		</script>
	
</body>
</html>

