function InscricaoController($scope, $http, $location, AuthService, DataService,
    SelectService, DialogService, CursoService, AtividadeService) {

    $scope.initInscricao = function() {
        SelectService.configField('#select-curso');
        configValidacoes();

        CursoService.buscarTodos(function(response) {
            $scope.cursos = response.data.lista;
            SelectService.configField('#select-curso');
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

    $scope.voltar = function() {
        $location.path('/');
    }

    function configValidacoesInscricao() {
        $(document).ready(function() {
            $("#formInscricao").validate({
                debug: true,
                rules: {
                    curso: "required"
                },
                messages: {
                    curso: "Selecione o curso da atividade"
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                    $(error).addClass('erro');
                },
                errorClass: 'invalid',
                validClass: 'valid',
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('invalid').removeClass('');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass(errorClass).addClass(validClass);
                }
            });
        });
    }
}
