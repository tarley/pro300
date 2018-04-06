function TableUtils() {

    this.configDataTable = function(tableID, obj) {

        //obj.language = this.getLanguage();

        $(document).ready(function() {
            var table = $('#' + tableID);

            table.DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "search": "Pesquisar:",
                "emptyTable":     "teste",
                "zeroRecords": "Ops! Nenhum registro encontrado.",
            });
        });
    }

    this.getLanguage = function() {
        return {
            paging: false,
            ordering: false,
            info: false,
            search: "Pesquisar por",
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
            }
        };
    }

    this.configOrderDataType = function() {
        $(document).ready(function() {
            $.fn.dataTable.ext.order['dom-text'] = function(settings, col) {
                return this.api().column(col, {
                    order: 'index'
                }).nodes().map(function(td, i) {
                    return $('input', td).val();
                });
            }

            $.fn.dataTable.ext.order['dom-text-numeric'] = function(settings, col) {
                return this.api().column(col, {
                    order: 'index'
                }).nodes().map(function(td, i) {
                    return $('input', td).val() * 1;
                });
            }

            /* Create an array with the values of all the checkboxes in a column */
            $.fn.dataTable.ext.order['dom-checkbox'] = function(settings, col) {
                return this.api().column(col, {
                    order: 'index'
                }).nodes().map(function(td, i) {
                    return $('input', td).prop('checked') ? '1' : '0';
                });
            }
        });
    }
}
