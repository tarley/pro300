function RelatorioController ($scope, $location, 
    AtividadeService, InscricaoService, AvaliacaoService) {
    
    $scope.init = function() {
        $scope.atividade = AtividadeService.getAtividade();
        buscarInscricoes();
    }
    
    $scope.calcularNotaFinal = function(inscricao) {
        return InscricaoService.calcularNotaFinal(inscricao);
    }
    
    $scope.voltar = function() {
        $location.path("/inscricoes");
    }
    
    function buscarInscricoes() {
        $scope.lista = {};

        InscricaoService.buscarPorAtividade($scope.atividade.id, function(response) {
            $scope.lista = response.data.lista;
            configTabela($scope.atividade.nome);
        });
    }
    
    function configTabela(nomeAtividade) {
        $(document).ready(function() {
            $('#relatorio-final').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    { 
                        extend:'copy',
                        text: 'Copiar'
                    }, 
                    //'csv', 
                    {
                        extend: 'excel', 
                        filename: nomeAtividade,
                        sheetName: 'relatório final'
                    }, 
                    {
                        extend: 'pdf',
                        filename: nomeAtividade
                    }, 
                    {
                        extend: 'print',
                        text: 'Imprimir'
                    }
                ],
                language: {
                    lengthMenu: 'Exibidos _MENU_ registros por página',
                    zeroRecords: 'Ops! Nenhum registro encontrado.',
                    info: 'Página _PAGE_ de _PAGES_',
                    infoEmpty: 'Ops! Nenhum registro disponível',
                    infoFiltered: '(Filtrados de _MAX_ registros totais)',
                    loadingRecords: 'Carregando...',
                    processing: 'Processando...',
                    search: 'Pesquisar por:',
                    paginate: {
                        first: 'Primeiro',
                        last: 'Último',
                        next: 'Próximo',
                        previous: 'Anterior'
                    }
                }
            });
        });
    }
}