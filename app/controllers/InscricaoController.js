function InscricaoController($scope, $http, $location,
    SelectUtils, DialogUtils, ValidationUtils,
    CursoService, AtividadeService, InscricaoService) {

    $scope.init = function() {
        validate();

        CursoService.buscarTodos(function(response) {
            $scope.cursos = response.data.lista;
            SelectUtils.configField();
        });
    }

    $scope.filtrarAtividadesParaInscricao = function() {
        var form = $('#formInscricao');

        if (!form.valid())
            return;

        $scope.lista = {};

        AtividadeService.buscarParaInscricao($scope.atividade.curso_id, function(listaAtividades) {
            $scope.lista = listaAtividades;
        });
    }

    $scope.inscrever = function(atividadeId, nome) {
        InscricaoService.inscrever(atividadeId, function(response) {
            DialogUtils.showMessage("Inscricao para a atividade {0} realizada com sucesso!", [nome]);
            $location.path('/');
        });
    }

    $scope.voltar = function() {
        $location.path('/');
    }

    function validate() {
        ValidationUtils.configValidation('formInscricao', {
            rules: {
                curso: "required"
            },
            messages: {
                curso: "Selecione o curso da atividade"
            },
        });
    }
}
