function AtividadeController($scope, $http, $location, AuthService, DataService,
    SelectService, DialogService, CursoService, AtividadeService) {

    $scope.initListagem = function() {
        $scope.lista = {};

        var acao = 'buscarAtivosParaProfessor.php';
        
        if(AuthService.isPerfilAluno())
            acao = 'buscarInscricoesDoAluno.php';
        
        $scope.lista = {};
        
        $http({
            method: 'GET',
            url: '/api/atividade/' + acao
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
        AtividadeService.setAtividade({})
        $location.path('/cadastrarAtividade');
    }

    $scope.initCadastro = function() {
        $scope.atividade = AtividadeService.getAtividade();

        AtividadeService.configCadastro();
        CursoService.buscarTodos(function(response) {
            $scope.cursos = response.data.lista;
            SelectService.configField('#select-curso');
        });
    }

    $scope.salvar = function() {
        var form = $("#formAtividade");
        //console.log("Valid: " + form.valid());

        if (!form.valid())
            return;

        $http({
            method: 'POST',
            url: '/api/atividade/inserirOuAlterar.php',
            data: $scope.atividade
        }).then(function(response) {
            DialogService.showResponse(response);

            if (response.data.sucesso)
                $location.path('/');
        }, function(response) {
            DialogService.showError(response);
        });
    }

    $scope.voltar = function() {
        $location.path('/');
    }

    $scope.editar = function(id) {
        $http({
            method: 'GET',
            url: '/api/atividade/buscarPorId.php?id=' + id,
        }).then(function(response) {
            if (response.data.sucesso) {
                var lista = response.data.lista;

                if (lista == null || lista.length == 0) {
                    DialogService.showMessage("Atividade de código {0} não encontrada.", [id]);
                    return;
                }
                AtividadeService.setAtividade(lista[0]);
                $location.path('/cadastrarAtividade');
            }
            else
                DialogService.showResponse(response);
        }, function(response) {
            DialogService.showError(response);
        });
    }

    $scope.isEditMode = function() {
        return $scope.atividade != null && $scope.atividade.id != null;
    }

    $scope.getClassLabels = function() {
        return $scope.isEditMode() ? 'active' : '';
    }

    $scope.novaInscricao = function() {
        $location.path('/inscricao');
    }

    $scope.initInscricao = function() {
        AtividadeService.configInscricao();
        CursoService.buscarTodos(function(response) {
            $scope.cursos = response.data.lista;
            SelectService.configField('#select-curso');
        });
    }

    $scope.isPerfilAluno = function() {
        return AuthService.isPerfilAluno();
    }

    $scope.filtrarAtividadesParaInscricao = function() {
        var form = $('#formInscricao');

        if (!form.valid())
            return;
            
        $scope.lista = {};
        
        $http({
            method: 'GET',
            url: '/api/atividade/buscarParaInscricao.php?curso_id=' + $scope.atividade.curso_id,
        }).then(function(response) {
            if (response.data.sucesso) {
                $scope.lista = response.data.lista;
            }
            else {
                DialogService.showResponse(response);
            }
        }, function(response) {
            DialogService.showError(response);
        });
    }

    $scope.inscrever = function(ativiadeId, nome) {
        $http({
            method: 'GET',
            url: '/api/atividade/inscrever.php?ativiadeId=' + ativiadeId
        }).then(function(response) {
            if (response.data.sucesso) {
                DialogService.showMessage("Inscricao para a atividade {0} realizada com sucesso!", [nome]);
                $location.path('/');
            }
            else {
                DialogService.showResponse(response);
            }
        }, function(response) {
            DialogService.showError(response);
        });
    }
}
