function ListagemAtividadeController($scope, $http, $location, AuthService,
    DialogService, AtividadeService) {

    $scope.init = function() {
        $scope.lista = {};

        var acao = 'atividade/buscarPorProfessor.php';

        if (AuthService.isPerfilAluno())
            acao = 'inscricao/buscarPorAluno.php';

        $http({
            method: 'GET',
            url: '/api/' + acao
        }).then(function(response) {
            if (response.data.sucesso)
                $scope.lista = response.data.lista;
            else
                DialogService.showResponse(response);
        }, function(response) {
            DialogService.showError(response);
        });
    }

    $scope.novaAtividade = function() {
        AtividadeService.setAtividade({});
        $location.path('/cadastrarAtividade');
    }

    $scope.editar = function(atividadeId) {
        AtividadeService.buscarAtividadePorId(atividadeId, function(atividade) {
            AtividadeService.setAtividade(atividade);
            $location.path('/cadastrarAtividade');
        });
    }

    $scope.novaInscricao = function() {
        $location.path('/inscricao');
    }

    $scope.visualizarInscricoes = function(atividadeId) {
        AtividadeService.buscarAtividadePorId(atividadeId, function(atividade) {
            AtividadeService.setAtividade(atividade);
            $location.path('/inscricoes');
        });
    }
}
