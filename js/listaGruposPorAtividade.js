function atividade(){

	this.url = 'classes/Grupo.class.php';

	this.listarGrupos = function(div){
		
		div.empty();
		
		$.ajax({
			url : this.url
		}).done(function(data){

			var grupoAtual = null;
			
				$.each(data, function (key, val){
				    if(val.grupo != grupoAtual) {

						var table = $('<table/>');
						table.attr('id', 'Grupos');
						table.attr('class', 'table table-striped responsive-utilities jambo_table');
										
						div.append(table);

						table.append(
							'<thead>' +
								'<th style= "text-align: center" width=10>RA</th>' +
								'<th style= "text-align: center" width=150>Nome</th>' +
								'<th style= "text-align: center" width=25>Tipo</th>' +
								'<th style= "text-align: center" width=20>Nota</th>' + 
								'<th style= "text-align: center" width=5>Desabilitdo</th>' +
							'</thead>');
							
						tbody = $("<tbody/>");
						table.append(tbody);

						grupoAtual = val.grupo;
				    }
			    	
					tr = $("<tr/>");
					td = $("<td/>");
					td.append(val.ra);
					
					var codDescricao = $("<input/>");
					codDescricao.attr("type", "hidden");
					codDescricao.attr("name", "codInscricao");
					codDescricao.val(val.cod_inscricao);
					
					td.append(codDescricao);
					
					
		            tr.append(td);					
                	tr.append($("<td/>").text(val.nome));
					
                	tr.append($("<td/>").append("<td style='text-align: center'>"
											   +"<div class='btn-group btn-toggle text-right' data-toggle='buttons'>"
											   +"<label class='btn btn-sm btn-primary active'>"
											   +"<input name='options1[]' value='1' type='radio' checked='checked'>Lider</label>"
											   +"<label class='btn btn-sm btn-default'>"
											   +"<input name='options1[]' value='0' type='radio'>Ajudado</label></div>"
											   +"</td>"));
                	tr.append($("<td/>").text(val.p1));
									
					
					checkSituacao = $("<input/>");
					checkSituacao.attr("id", "checkboxSituacao" + val.cod_inscricao);
					checkSituacao.attr("name", "situacao");
					checkSituacao.attr("type", "checkbox");
					checkSituacao.val("on");
					
					labelSituacao = $("<label/>");
					labelSituacao.attr("for", "checkboxSituacao" + val.cod_inscricao);
					labelSituacao.attr("class", "label-danger");
					
					
					divSituacao = $("<div/>");
					divSituacao.attr("class", "material-switch pull-right");					
					divSituacao.append(checkSituacao);
					divSituacao.append(labelSituacao);
					
                	tr.append($("<td/>").append(divSituacao));		
			
	                
					
					tbody.append(tr);

		
					$('.btn-toggle .btn').click(function() {
						var div = $(this).parent();
			   
						div.find('.btn-primary input').attr("checked", false);             
						div.find('.btn-primary').removeClass('btn-primary').removeClass('active').addClass('btn-default');
			   
						$(this).addClass('btn-primary').addClass('active').removeClass('btn-default');
						$('input', this).attr('checked', true);        
		
					});



				});

		});

	}

}
