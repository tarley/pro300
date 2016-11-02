/**
 * Created by Vitor on 23/10/2016.
 */
function relatorio(tbody) {
    this.url = "classes/RelatorioAtividades.php";


    tbody.empty();

    $.ajax({
        url: this.url
    }).done(function (data) {

        $.each(data, function (key, val) {

            //alert('teste');
            tr = $("<tr id=''/>");
            tr.append($("<td />").text(val.Nome));
            tr.append($("<td />").text(val.RA));
            tr.append($("<td />").text(val.NotaP1));
            tr.append($("<td />").text(val.NotaP300));
            tr.append($("<td />").text(val.NotaFinal));
            tr.append($("<td />").text(val.IndiceMelhoria));

            colunaBotoes = $("<td/>");
            botao = $("<button/>");
            botao.attr("type", "button");
            botao.attr("class", "btn btn-primary");
            botao.attr("data-toggle", "modal");
            botao.attr("data-target", ".avaliacao");

            icone = $("<i />");
            icone.attr("class", "fa fa-navicon");

            botao.append(icone);

            botao.click(function() {
                alert(val.CodInscricao);
                $("#myModalLabel").text("Avaliação " + val.Nome);

                $.ajax({
                    url: "classes/RelatorioAtividades.php" + "?acao=buscarDetalhes&CodInscricao=" + val.CodInscricao
                }).done(
                    function (data) {
                        tabela = $("#tabelaPopupAvaliacao");
                        body = tabela.find("tbody");
                        body.empty();

                        $.each(data, function (key, val) {
                            tr = $("<tr/>");
                            tr.append($("<td/>").append(val.Nome));
                            tr.append($("<td/>").append(val.RA));
                            tr.append($("<td/>").append(val.AvAjudante));
                            tr.append($("<td/>").append(val.AvAjudado));
                            tr.append($("<td/>").append(val.Media));

                            body.append(tr);
                        });
                    }
                );

            });

            colunaBotoes.append(botao);
            tr.append(colunaBotoes);

            tbody.append(tr);
        });
    });
}

function exibirDetalhesAvaliacao(idAvaliacao) {
    alert(idAvaliacao);
    // $.ajax({
    //     url: "classes/RelatorioAtividades.php" + "?acao=buscarDetalhes&CodInscricao=" + idAvaliacao
    // }).done(
    //     function (data) {
    //         $.each(data, function (key, val) {
    //             <tr>;
    //             <td>"+val.Nome+"<\/td>;
    //             <td>"+val.RA+"<\/td>";
    //             <td>"+val.AvAjudante+"<\/td>;
    //             <td>"+val.AvAjudado+"<\/td>;
    //             <td>"+val.Media+"<\/td>;
    //             "";
    //             </tr>;
    //         });
    //     }
    // );
}
