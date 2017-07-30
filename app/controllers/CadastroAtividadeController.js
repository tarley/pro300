function CadastroAtividadeController($scope, $http, $location, AuthService, DataService,
    SelectService, DialogService, ValidationService, CursoService, AtividadeService) {

    $scope.init = function() {
        $scope.atividade = AtividadeService.getAtividade();

        configCharacterCounter();
        configValidation();

        DataService.configDatePicker();

        CursoService.buscarTodos(function(response) {
            $scope.cursos = response.data.lista;
            SelectService.configField();
        });
    }

    $scope.salvar = function() {
        var form = $("#formAtividade");

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

    $scope.isEditMode = function() {
        return $scope.atividade != null && $scope.atividade.id != null;
    }

    $scope.getClassLabels = function() {
        return $scope.isEditMode() ? 'active' : '';
    }

    function configCharacterCounter() {
        $(document).ready(function() {
            $('#input-nome, #text-descricao').characterCounter();
        });
    }

    function configValidation() {
        ValidationService.configValidation('formAtividade', {
            rules: {
                curso: "required",
                nome: {
                    required: true,
                    maxlength: 100
                },
                descricao: {
                    required: true,
                    maxlength: 500
                },
                dtInicio: "required",
                dtTermino: {
                    required: true,
                    beforeTo: "#dt-inicio"
                }
            },
            messages: {
                curso: "Selecione o curso da atividade",
                nome: {
                    required: "Informe o nome da atividade.",
                    maxlength: "O nome da atividade não pode conter mais de 100 caracteres."
                },
                descricao: {
                    required: "Informe uma descrição para a atividade.",
                    maxlength: 500
                },
                dtInicio: "Informe a data de inicio da atividade.",
                dtTermino: {
                    required: "Informe a data de termino da atividade.",
                    beforeTo: "Data de termino não pode ser menor ou igual a data de inicio."
                }
            }
        });

        $(document).ready(function() {
            jQuery.validator.addMethod("beforeTo", function(valueTermino, elementTermino) {
                var valueInicio = $('#dt-inicio').val();

                return DataService.isBefore(valueInicio, valueTermino);
            });
        });
    }
}
