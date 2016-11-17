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
						<h3>Formulario de Avaliação para o <span id="titulo">Ajudante</span></h3><!-- Título da Página -->
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="x_panel">
							<div class="x_content">

								<!-- Início do conteu	do da página  -->
								<p>Prezado <span id="subTitulo">Ajudante</span>, neste formulário você deverá avaliar, com bastante honestidade, o nível de ajuda oferecida a cada integrante do grupo com base na escala de 1 a 5. <br/>(1 para pouca ajuda e 5 para muita ajuda).</p>

								<!-- start form for validation -->
								<form id="demo-form" method="POST" >									
									<input id="cod_insc_avaliador" type="hidden" />
									<div id="listaAvaliacoes">
										<!--<br/>
										<label for="fullname">Nome do Ajudado:</label> 
										<div class="x_content">
											<div
												<div id="stars" class="starrr lead"></div>
												A nota do lider é: <span id="count">0</span> estrela(s)
											</div>
											<div class="row x_title">
												<div class="col-md-6">
												</div>
												<div class="col-md-6">
												</div>
											</div>
										</div>-->
									</div>
									<input id="salvar" type="submit" class="btn btn-primary"></input>
									<!--span id="btnSalvar" class="btn btn-primary">Salvar</span-->
								</form>
								<!-- end form for validations -->
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




<script>	

	var codInscricao = <?php echo $_GET['codInscricao']?>;
	
	
	/*$.ajax({
		url: "classes/Atividade.class.php?acao=listar",
		data: { codAtividade: codAtividade }
	}).done(function(data){
		
		$("#cod_insc_avaliador").val(data.cod_inscricao);
		
	});*/

	
	
	
	$.ajax({
		url: 'classes/Avaliacao.class.php?acao=listar&codInscricao=' + codInscricao
	}).done(function(data){
		
		if(data.erro)
			alert(data.msg);
		else {
			
			
			var div = $('#listaAvaliacoes');
			
			if(data.avaliadorLider == "Sim") {
				
				$("#titulo").text("Ajudante");
				$("#subTitulo").text("Ajudante");
				
				$.each(data, function (key, val){

					if(key == 'avaliadorLider') {
						return;
					}
				
					div.append('<div id="divAjudado'+val.cod_inscricao+'" data-id=' +val.cod_inscricao+ '>'+
					'<input type="hidden" name="codAvaliado" value="'+ val.cod_inscricao +'"/>\n\
                        <label for="fullname">Nome do Ajudado:</label> ' + val.nome + '<br>'+
						'<div class="x_content">'+ 
							'<label style="display: inline-flex;">\n\
								<input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+ val.cod_inscricao+'"  value="1" checked> 1<br></label>' + 
								'<label style="display: inline-flex;" for="">\n\
									<input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+ val.cod_inscricao+'" value="2"> 2 <br></label>' +
									'<label style="display: inline-flex;" for="">\n\
									<input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+ val.cod_inscricao+'" value="3"> 3<br></label>' + 
									'<label style="display: inline-flex;" for=""><input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+ val.cod_inscricao+'" value="4"> 4 <br></label>' +
									'<label style="display: inline-flex;" for=""><input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+ val.cod_inscricao+'" value="5"> 5 </label><br>' + 
									'<div class="row x_title">'+ '<div class="col-md-6"></div>'+ '<div class="col-md-6"></div>' + '</div>' + '</div></div>');
				});
			} else {
				
			    $("#titulo").set("Ajudado");
				$("#subTitulo").set("Ajudado");

				
				$.each(data, function (key, val){					
					div.append('<div id="divAjudado'+val.cod_inscricao+'" data-id=' +val.cod_inscricao+ '>'+
					'<input type="hidden" name="codAvaliado" value="'+ val.cod_inscricao +'"/><label for="fullname">Nome do Ajudado:</label> ' + val.nome + '<br>'+
						'<div class="x_content">'+ 
							'<label style="display: inline-flex;"><input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+val.cod_inscricao+'"  value="1" checked> 1<br></label>' + 
							'<label style="display: inline-flex;" for=""><input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+val.cod_inscricao+'" value="2"> 2 <br></label>' + 
							'<label style="display: inline-flex;" for=""><input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+val.cod_inscricao+'" value="3"> 3<br></label>' + 
							'<label style="display: inline-flex;" for=""><input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+val.cod_inscricao+'" value="4"> 4 <br></label>' + 
							'<label style="display: inline-flex;" for=""><input style="margin-right: 5px; margin-left: 5px;" type="radio" name="count'+val.cod_inscricao+'" value="5"> 5 </label><br>' + 
							'<div class="row x_title">'+ '<div class="col-md-6"></div>'+ '<div class="col-md-6"></div>' + '</div>' + '</div></div>');
				});
			}
			
			
		}
		
	});
	
	
	
	$("#salvar").click(function (e) {
		
		var insc_avaliador = $("#salvar").val();
		
		
		var dados = {};
		var respostas=[];
		
		//dados.salvar = insc_avaliador;		
		//dados.alunos = [];
		
		$("div[id*='divAjudado']").each(function(){
			var obj = [];
			alert($(this).prop("data"));
			//var id = $(this).attr("data-id");			
			var codAvaliado = $("input[name='codAvaliado']", this).val();			
			var notaAvaliado = $("input[type='radio'][name='count" + id + "']:checked").val();
			
			var objRespostas = {};
			
			objRespostas['cod_insc_avaliado'] = codAvaliado;
			objRespostas['nota'] = notaAvaliado;
			respostas.push(objRespostas);		
			
		});
		
		
		
		arrayObj['Respostas'] = respostas;
		dados.push(arrayObj);
		Console.log(dados);
		
		$.post("classes/Avaliacao.class.php?acao=insert", dados).done(function(data){
			
		});
		
		
	});	

</script>
</body>
</html>
