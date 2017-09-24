function UsuarioController($scope, $rootScope, $http, $location,
    DialogUtils, ValidationUtils, AuthService, UsuarioService) {

    $scope.init = function() {
        configCharacterCounter();
        //configFormatTelefone();
        ValidationUtils.configValidation('formUsuario', {
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
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                telefone: {
                    required: true
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
                    required: "Informe seu telefone."
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
            UsuarioService.inserirAluno($scope.usuario, function(response) {
                AuthService.autenticar($scope.usuario);
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

    function configFormatTelefone() {
        $(document).ready(function() {
            $("#input-telefone").formatter({
                'pattern': '({{99}}) {{99999}}-{{9999}}'
            });
        });
        
        /*$(document).ready(function() {
            $("#input-telefone").keydown(function() {
                var tamanho = $(this).val().trim().length;

                if (tamanho < 15)
                    formatter(this, '({{99}}) {{9999}}-{{9999}}');
                else
                    formatter(this, '({{99}}) {{99999}}-{{9999}}');
            });
        });*/
    }

    /*function formatter(campo, mascara) {
        $(document).ready(function() {
            $(campo).formatter().resetPattern(mascara);
        });
    }*/
}
