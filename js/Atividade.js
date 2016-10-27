/**
 * Created by tarle on 21/10/2016.
 */
function atividade() {

    this.url = 'classes/Atividade.class.php';

    this.listarAtividades = function(tbody) {
        alert('Teste com sucesso!');

        tbody.empty();

        $.ajax({
            url : this.url
        }).done(function(data) {
            $.each(data, function (key, val) {
                tr = $("<tr/>");

                tr.append($("<td/>").text(val.cod_atividade));
                tr.append($("<td/>").text(val.desc_atividade));
                tr.append($("<td/>").text(val.data_inicio));
                tr.append($("<td/>").text(val.data_fim));




                tr.append($("<td/>").text(''));

                tbody.append(tr);
            });
        });


    }
}