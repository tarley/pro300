/**
 * Created by Bruna on 22/11/2016.
 */
//TODO - fazer a persistencia completa, evitar de ir varias vezes no servidor
$(document).ready(function(){

    var acao;
    var pai = $("#datatable"); //elemento
    var lista = pai.find("#filho"); //receptor
    var itens="";

    $.getJSON('classes/Grupo.class.php?&acao=listar&cod_atividade=' + codAtividade,function(data){
        if(data== 0){
            itens+=" ";
            //alert(data);
        }else{
            $.each(data,function(k,v){
                itens += "<tr id='linha"+k+"' class='linha'>";
                itens += "<td id='ra"+k+"'>"+v.ra+"</td>";
                itens += "<td id='nome"+k+"'>"+v.nome+"</td>";
                itens += "<td><input type='text' size='2' id='notap1"+k+"' value ='"+v.p1+"' class='form-control' placeholder=''></td>";
                itens += "<td><input type='text' size='2' id='notap300"+k+"' value ='"+v.p300+"' class='form-control' placeholder=''></td>";
                itens += "<input type='hidden' value ='"+v.cod_aluno+"'size='2' id='cod_aluno"+k+"'>";
                itens += "<input type='hidden' value ='"+v.cod_atividade+"'size='2' id='cod_atividade"+k+"'>";
                itens += "<td><input type='text' disabled value ='' size='2' id='eh_lider"+k+"' class='form-control'></td>";
                itens += "<td><input type='text' disabled value ='' size='2' id='grupo"+k+"' class='form-control'></td>";

				if (v.lider == 1)
					itens += "<td class='text-center' width='10%'><a id='btnGerarNota'" +
                        " class='btn btn-primary btn-xs' data-inscricao='" + v.cod_inscricao + "'>Gerar Nota Final</a></td>";
				else
					itens += "<td></td>";

				itens += "</tr>";
            });
        }
        lista.html(itens);

    });

});

//TODO - fazer a persistencia completa, evitar de ir varias vezes no servidor
$(document).on('click','#confirmar', function(){
    var linhas = $('.linha');
    $.each(linhas, function(k, linha){
        atualizarInscricao(linha);
    });

});

function limpar(linhas) {
    $.each(linhas, function (k, linha) {
        atributos = $(linha).find('input');
        $(atributos[4]).val('');
        $(atributos[5]).val('');
    });
}

//TODO - fazer a persistencia completa, evitar de ir varias vezes no servidor
$(document).on('click','#gerar_grupos', function(){

    var qtdPessoasPorGrupo = parseInt($('#qtd-pessoas-por-grupo').val());
    var linhas = $('.linha');
    var qtdAlunos = linhas.length;
    var excedentes = qtdAlunos % qtdPessoasPorGrupo;
    var qtdGrupos = (qtdAlunos - excedentes) / qtdPessoasPorGrupo;
    var descendente = true;
    var linha = undefined;
    var linhasNaoPreenchidas = [];

    var atributos = undefined;
    var indexGrupo = 1;

    //ordena os alunos em ordem decrescente pela nota
    linhas.sort(function(a, b) {
        return parseInt($(b).find('input')[0].value) - parseInt($(a).find('input')[0].value);
    });

    //validacao da quantidade de grupos
    if (!qtdPessoasPorGrupo || qtdPessoasPorGrupo < 1 || qtdAlunos < qtdPessoasPorGrupo) {
        limpar(linhas);
        alert('Quantidade mínima de pessoas por grpo inválida.');
        return;
    }

    for (i = 0; i < qtdAlunos;) {
        if (descendente) {
            for (j = 0; j < qtdGrupos; j++) {
                if (i < qtdAlunos) {
                    linha = linhas[i++];
                    atributos = $(linha).find('input');
                    if (atributos[0].value != 0) {
                        $(atributos[4]).val(i <= qtdGrupos ? 'Lider' : 'Ajudado');
                        $(atributos[5]).val('Grupo ' + indexGrupo++);
                        atualizarInscricao(linha);
                    } else {
                        linhasNaoPreenchidas.push(linha);
                    }
                }
            }
        } else {
            for (j = qtdGrupos + (i - 1); j >= i; j--) {
                if (i < qtdAlunos) {
                    linha = linhas[j];
                    atributos = $(linha).find('input');
                    if (atributos[0] != 0) {
                        $(atributos[4]).val(i < qtdGrupos ? 'Lider' : 'Ajudado');
                        $(atributos[5]).val('Grupo ' + indexGrupo++);
                        atualizarInscricao(linha);
                    } else {
                        linhasNaoPreenchidas.push(linha);
                    }
                }
            }
            i += qtdGrupos;
        }
        indexGrupo = 1;
        descendente = !descendente;
    }

    if (!linhasNaoPreenchidas.length) {
        //espera o processamento concluir para apresentar a mensagem de sucesso
        setTimeout(function() {
            alert('Grupos gerados com sucesso');
        }, 500);
    } else {
        $.each(linhasNaoPreenchidas, function (k, linha) {
            //TODO - destacar a linha
            $(linha).addClass("table-danger");
        });
        limpar(linhas);
        setTimeout(function() {
            alert('Preencha as notas P1 dos alunos em destaque');
        }, 500);
    }

});

//TODO - fazer a persistencia completa, evitar de ir varias vezes no servidor
function atualizarInscricao(linha) {
    var inputs = $(linha).find('input');
    var notap1        = inputs[0].value;
    var notap300      = inputs[1].value;
    var cod_aluno     = inputs[2].value;
    var cod_atividade = inputs[3].value;
    var lider         = inputs[4].value;
    var grupo = "";
    if (inputs[5].value) {
        grupo = inputs[5].value == 'Lider' ? 1 : 0;
    }
    $.ajax({
        url:'classes/Grupo.class.php?&acao=alterar' ,
        type:'POST' ,
        data: {
            cod_atividade : cod_atividade,
            cod_aluno : cod_aluno,
            notap1 : notap1,
            notap300 : notap300,
            lider : lider,
            grupo : grupo
        }
    }).success(function(resultado){
        console.log(resultado)
    }).error(function(error){
        console.log(error);
    })
}

