function UsuarioController($scope, $rootScope, $http, $location,
    DialogService, ValidationService, AuthService) {

    $scope.init = function() {
        configCharacterCounter();
        ValidationService.configValidation('#formUsuario', {
            rules: {
                ra: {
                    required: true,
                    maxlength: 20,
                    number: true
                },
                nome: {
                    required: true,
                    maxlength: 255
                },
                telefone: {
                    number: true
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                senha: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                confirmacaoSenha: {
                    required: true,
                    equalTo: "#input-senha"
                }
            },
            messages: {
                ra: {
                    required: "Informe sua RA.",
                    maxlength: "RA não deve conter mais de 20 digitos.",
                    number: "Número de RA inválido."
                },
                nome: {
                    required: "Informe seu nome completo.",
                    maxlength: "Nome não deve conter mais de 255 caracteres."
                },
                telefone: {
                    number: "Número de telefone inválido"
                },
                email: {
                    required: "Informe seu e-mail. Ele será utilizado no seu proximo acesso.",
                    email: "Informe um e-mail válido.",
                    maxlength: "e-mail não deve conter mais de 50 caracteres."
                },
                senha: {
                    required: "Informe uma senha para o seu usuário.",
                    minlength: "Senha deve conter mais de 4 caracteres.",
                    maxlength: "Senha não deve conter mais de 20 caracteres."
                },
                confirmacaoSenha: {
                    required: "Favor confirmar a senha digitada anteriormente.",
                    equalsTo: "Senha diferente da confirmação."
                }
            }
        });

        $scope.usuario = {};
    }

    $scope.salvar = function() {
        var form = $("#formUsuario");
        
        if (form.valid()) {
            $http({
                method: 'POST',
                url: '/api/usuario/inserirAluno.php',
                data: $scope.usuario
            }).then(function(response) {
                DialogService.showResponse(response);
                if (response.data.sucesso) {
                    AuthService.autenticar($scope.usuario);
                }
            }, function(response) {
                DialogService.showError(response);
            });
        }
    };

    $scope.voltar = function() {
        if ($scope.usuario.id)
            $location.path("/");
        else
            $location.path("/login");
    }

    function configCharacterCounter() {
        $(document).ready(function() {
            $('#input-ra, #input-nome, #input-telefone, ' +
                    '#input-email, #input-senha, #input-confirmacaoSenha')
                .characterCounter();
        });
    }
}
