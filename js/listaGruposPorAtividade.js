function grupo(){

	this.url = 'classes/Grupo.class.php';

	this.listarGrupos = function(div, codAtividade){
		
		div.empty();
		
		$.ajax({
			url : this.url + '?codAtividade=' + codAtividade
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
								'<th style= "text-align: left" width=10>RA</th>' +
								'<th style= "text-align: left" width=150>Nome</th>' +
								'<th style= "text-align: left" width=25>Tipo</th>' +
								'<th style= "text-align: left" width=20>Nota</th>' + 
								'<th style= "text-align: left" width=5>Desabilitado</th>' +
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
					//Nome Aluno
                	tr.append($("<td/>").text(val.nome));
					
					/*
					var classeAtivo = 'btn btn-sm btn-primary active';
					var classeInativo = 'btn btn-sm btn-default';
					var attrChecked = "checked"
					*/
					
					
					//Tipo de aluno
					if(val.lider == 1) {
						tr.append($("<td/>").append("<td style='text-align: center'>"
												   +"<div id='divTipoAluno' class='btn-group btn-toggle text-right' data-toggle='buttons'>"
												   +"<label class='btn btn-sm btn-primary active'>"
												   +"<input name='lider' value='1' type='radio' checked>Lider</label>"
												   +"<label class='btn btn-sm btn-default'>"
												   +"<input name='lider' value='0' type='radio'>Ajudado</label></div>"
												   +"</td>")); 
				    } else {
						tr.append($("<td/>").append("<td style='text-align: center'>"
												   +"<div id='divTipoAluno' class='btn-group btn-toggle text-right' data-toggle='buttons'>"
												   +"<label class='btn btn-sm btn-default'>"
												   +"<input name='lider' value='1' type='radio'>Lider</label>"
												   +"<label class='btn btn-sm btn-primary active'>"
												   +"<input name='lider' value='0' type='radio' checked>Ajudado</label></div>"
												   +"</td>")); 
					}
					/*		
					var tdTipoAlunoExterna = $("<td/>");
					
					var tdTipoAluno = $("<td/>");
					tdTipoAluno.css("text-align", "center");
					
					tdTipoAlunoExterna.append(tdTipoAluno);
					
					var divTipoAluno = $("<div/>");
					divTipoAluno.addClass("btn-group btn-toggle text-right");
					divTipoAluno.attr("data-toggle", "buttons");
					
					
					
					var inputLider = $("<input/>");
					inputLider.attr('id', 'inputLider')
					inputLider.attr("name", "options1[]");
					inputLider.attr("value", "1");
					inputLider.attr("type", "radio");
					
					
					
					var labelLider = $("<label/>");
					labelLider.html('Líder', inputLider);
					//labelLider.append(inputLider);
					labelLider.attr('for', 'inputLider');
					
					labelLider.append(inputLider);
					
					if(val.lider == 1){
						labelLider.addClass("btn btn-sm btn-primary active");
						inputLider.attr("checked", "checked");
					}
					else{
						labelLider.addClass("btn btn-sm btn-default");
					}
					
					var labelAjudado = $("<label/>");
					labelAjudado.html("Ajudado");
					labelAjudado.attr("for", "checkboxSituacao" + val.cod_inscricao);
					
					var inputAjudado = $("<input/>");
					inputAjudado.attr("name", "options1[]");
					inputAjudado.attr("value", "0");
					inputAjudado.attr("type", "radio");
					
					labelAjudado.append(inputAjudado);
					
					if(val.lider == 0){
						labelAjudado.addClass("btn btn-sm btn-primary active");
						inputAjudado.attr("checked", "checked");
					}
					else{
						labelAjudado.addClass("btn btn-sm btn-default");
					}
					
					tdTipoAluno.append(divTipoAluno);
					divTipoAluno.append(labelLider);
					divTipoAluno.append(inputLider);
					divTipoAluno.append(labelAjudado);
					divTipoAluno.append(inputAjudado);
					
					tr.append(tdTipoAlunoExterna);
					*/
					
					// Nota do aluno		   
                	tr.append($("<td/>").text(val.p1));
									
					// Situação aluno
					if(val.situacao == 1) {
						tr.append($("<td/>").append("<td style='text-align: center'>"
												   +"<div class='btn-group btn-toggle text-right' data-toggle='buttons'>"
												   +"<label class='btn btn-sm btn-primary active'>"
												   +"<input name='situacao' value='1' type='radio' checked>Ativo</label>"
												   +"<label class='btn btn-sm btn-default'>"
												   +"<input name='situacao' value='0' type='radio'>Inativo</label></div>"
												   +"</td>"));
					} else {
						tr.append($("<td/>").append("<td style='text-align: center'>"
												   +"<div class='btn-group btn-toggle text-right' data-toggle='buttons'>"
												   +"<label class='btn btn-sm btn-default'>"
												   +"<input name='situacao' value='1' type='radio'>Ativo</label>"
												   +"<label class='btn btn-sm btn-primary active'>"
												   +"<input name='situacao' value='0' type='radio' checked>Inativo</label></div>"
												   +"</td>"));
				   }

					tbody.append(tr);
		
					$('.btn-toggle .btn').click(function() {
						var div = $(this).parent();
			   
						div.find('.btn-primary input').attr("checked", false);             
						div.find('.btn-primary').removeClass('btn-primary').removeClass('active').addClass('btn-default');
			   
						$(this).addClass('btn-primary').addClass('active').removeClass('btn-default');
						$('input', this).attr('checked', true);        
		
					});



				});

		}).error(
			function(data){
				alert(data.responseText);
			}
		);

	}

}
