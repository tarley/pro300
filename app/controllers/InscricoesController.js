function InscricoesController($scope, $http, $location, DialogService,
    TableService, SelectService, AtividadeService, InscricaoService) {

    $scope.init = function() {
        $scope.atividade = AtividadeService.getAtividade();
        buscarInscricoes();
    }

    $scope.excluir = function(id) {
        InscricaoService.excluir(id, buscarInscricoes);
    }

    $scope.salvar = function() {
        DialogService.showMessage("Metodo não implementado.");
    }

    $scope.voltar = function() {
        $location.path('/');
    }

    function buscarInscricoes() {
        $scope.lista = {};

        InscricaoService.buscarPorAtividade($scope.atividade.id, function(response) {
            $scope.lista = response.data.lista;
            configDataTable();
            SelectService.configField();
        });
    }

    function configDataTable() {
        TableService.configDataTable('table-inscricoes', {
            "order": [
                [1, "desc"]
            ]
        });
    }
}
