function TableService() {

    this.configDataTable = function(tableID, obj) {

        obj.language = this.getLanguage();

        $(document).ready(function() {
            var table = $('#' + tableID);
            
            if($.fn.dataTable.isDataTable(table))
                table.DataTable();
            else    
                table.DataTable(obj);
        });
    }

    this.getLanguage = function() {
        return {
            search: "Pesquisar na tabela",
            lengthMenu: "Número _MENU_ de registros por pagina",
            zeroRecords: "Ops! Nenhum registro encontrado.",
            info: "Exibindo a página _PAGE_ de _PAGES_",
            infoEmpty: "Nenhum registro disponível.",
            infoFiltered: "(Número total de registros: _MAX_)",
            paginate: {
                first: "Primeiro",
                previous: "Anterior",
                next: "Próximo",
                last: "Último"
            },
        };
    }
}
