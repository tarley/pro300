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

                colunaBotoes.append(botao);
                tr.append(colunaBotoes);

                $.ajax({
                    url: "classes/RelatorioAtividades.php"+ "?acao=buscarDetalhes&CodInscricao=" + val.CodInscricao
                }).done(function (data) {
/*

 $.each(data, function (key, val) {
 <tr>;
 <td>"+val.Nome+"<\/td>;
 <td>"+val.RA+"<\/td>";
 <td>"+val.AvAjudante+"<\/td>;
 <td>"+val.AvAjudado+"<\/td>;
 <td>"+val.Media+"<\/td>;
 "";
 </tr>;
 });
* */

                });


                tbody.append(tr);
            });
        });
}
