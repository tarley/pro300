/**
 * Created by tarle on 09/10/2016.
 */


function tarefa() {
    this.url = "classes/Tarefa.php";

    this.listarTarefas = function (tbody) {

        tbody.empty();

        $.ajax({
            url: this.url
        }).done(function (data) {

            $.each(data, function (key, val) {

                tr = $("<tr />");
                tr.append($("<td />").text(val.id));
                tr.append($("<td />").text(val.descricao));
                tr.append($("<td />").text(val.dataFinalizacao));
                tr.append($("<td />").text(val.finalizado));

                var btnAlterar = $("<a/>").attr({
                    class:"",
                    title:"Alterar tarefa",
                    href:"#modalAlterar"
                });

                icone = $("<i />").attr("class", "mdi-content-create");
                btnAlterar.append(icone);

                btnAlterar.click(function () {
                    tarefa.abrirAlterar(val.id, $("#formAlteracao"));
                });

                var btnExcluir = $("<a/>").attr({
                    class:"",
                    title: "Excluir tarefa",
                    href:"#"
                });

                icone = $("<i />").attr("class", "mdi-content-clear");
                btnExcluir.append(icone);

                btnExcluir.click(function () {
                    tarefa.excluir(val.id);
                });

                tdBotoes = $("<td/>");
                tdBotoes.append(btnAlterar);
                tdBotoes.append(btnExcluir);
                tr.append(tdBotoes);

                tbody.append(tr);
            });
        });
    }

    this.excluir = function(id) {
        if(confirm("Tem certeza que deseja excluir a Tarefa?")) {
            $.ajax({
                url: this.url + "?acao=excluir&id=" + id
            }).done(function (data) {
                tarefa.listarTarefas(tblTarefa.find("tbody"));
                alert(data.msg);
            });
        }
    }

    this.inserir = function(form){
        $.post( this.url+"?acao=inserir", form.serialize())
            .done(function(data){
            if(!data.erro){
                form.each(function(){
                    this.reset();
                });

                $("#modalCadastro").closeModal();
            }

            alert(data.msg);
            tarefa.listarTarefas(tblTarefa.find("tbody"));
        });
    }

    this.abrirAlterar = function(id, form) {
        $("#id").val(id);

        $.ajax({
            url : this.url+"?acao=buscarPorId&id="+id
        }).done(function(data){
            $("#alterarDescricao").val(data[0].descricao);
            $("#modalAlterar").openModal();
        });
    }

    this.executaAlteracao = function(form){
        $.post( this.url+"?acao=alterar", form.serialize() ).done(function(data){

            if(!data.erro){
                form.each(function(){
                    this.reset();
                });

                $("#modalAlterar").closeModal();
            }

            alert(data.msg);
            tarefa.listarTarefas(tblTarefa.find("tbody"));
        });
    }

}