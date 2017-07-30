function InscricaoController($scope, $http, $location, SelectService,
    DialogService, ValidationService, CursoService) {

    $scope.init = function() {
        validate();

        CursoService.buscarTodos(function(response) {
            $scope.cursos = response.data.lista;
            SelectService.configField();
        });
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
            url: '/api/inscricao/inscrever.php?ativiadeId=' + ativiadeId
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

    $scope.voltar = function() {
        $location.path('/');
    }

    function validate() {
        ValidationService.configureValidation('formInscricao', {
            rules: {
                curso: "required"
            },
            messages: {
                curso: "Selecione o curso da atividade"
            },
        });
    }
}
