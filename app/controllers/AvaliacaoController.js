function AvaliacaoController($scope, $location,
    DialogUtils, AtividadeService, AvaliacaoService) {

    $scope.init = function() {
        $scope.atividade = AtividadeService.getAtividade();
        buscarAvaliacoesPendentes();
    }

    $scope.enviarAvaliacoes = function() {
        AvaliacaoService.enviarAvaliacoes($scope.lista, function(response) {
            DialogUtils.showMessage("Avaliações enviadas com sucesso!");
            $location.path("/");
        });
    };

    $scope.voltar = function() {
        $location.path("/");
    }

    function buscarAvaliacoesPendentes() {
        $scope.lista = {};

        AvaliacaoService.buscarAvaliacoesPendentes($scope.atividade.id, function(response) {
            $scope.lista = response.data.lista;
        });
    }
}
