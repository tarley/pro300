function ListagemAtividadeController($scope, $http, $location, DialogUtils,
    AuthService, AtividadeService, InscricaoService) {

    $scope.init = function() {
        $scope.lista = {};

        var acao = function(response) {
            $scope.lista = response.data.lista;
        }

        if (AuthService.isPerfilAluno())
            InscricaoService.buscarPorAluno(acao);
        else
            AtividadeService.buscarPorProfessor(acao);
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
