function ListagemAtividadeController($scope, $http, $location, 
    DialogUtils, StringUtils,
    AuthService, AtividadeService, InscricaoService) {

    $scope.init = function() {
        $scope.lista = {};

        var acao = function(response) {
            $scope.lista = response.data.lista;
        }

        if (AuthService.isPerfilAluno())
            AtividadeService.buscarPorAluno(acao);
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

    $scope.avaliarLider = function(atividadeId, totalAvaliacoesPendentes) {
        if (totalAvaliacoesPendentes > 0) {
            AtividadeService.buscarAtividadePorId(atividadeId, function(atividade) {
                AtividadeService.setAtividade(atividade);
                $location.path('/avaliarLider');
            });
        }
    }

    $scope.exibirInformacoesGrupo = function(atividadeId, grupo) {
        $scope.grupo = grupo;
        $scope.listaGrupo = {};
        
        InscricaoService.buscarInscricoesMeuGrupo(atividadeId, function(response) {
            $scope.listaGrupo = response.data.lista;
        });
        
        $(document).ready(function() {
            $('#modal1').modal('open');
        });
    }
    
    $scope.formatarTelefone = function(value) {
        return StringUtils.formatarTelefone(value);
    }
}
