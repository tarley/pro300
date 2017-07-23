function UsuarioController($scope, $rootScope, $http, $location, AuthService) {

    $scope.initCadastroAluno = function() {
        $scope.usuario = {};

        $(document).ready(function() {
            $('#input-ra, #input-nome, #input-telefone, ' +
                    '#input-email, #input-senha, #input-confirmacaoSenha')
                .characterCounter();

            $("#formUsuario").validate({
                debug: true,
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
                //For custom messages
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

    $scope.initMenu = function() {
        AuthService.atualizarMenu();
    }

    $scope.salvar = function() {
        var form = $("#formUsuario");
        console.log("Valid: " + form.valid());

        if (form.valid()) {
            $http({
                method: 'POST',
                url: '/api/usuario/inserirAluno.php',
                data: $scope.usuario
            }).then(function(response) {
                Materialize.toast(response.data.mensagem, 4000);
                if (response.data.sucesso) {
                    AuthService.autenticar($scope.usuario);
                }
            }, error);
        }
    };

    $scope.voltar = function() {
        if ($scope.usuario.id) {
            $location.path("/");
        }
        else {
            $location.path("/login");
        }
    }

    $scope.logout = function() {
        AuthService.logout();
    };

    function error(response) {
        Materialize.toast("UsuarioController: " + response.status + " - " + response.statusText, 4000);
    }
}
