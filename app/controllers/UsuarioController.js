function UsuarioController($scope, $rootScope, $http, $location,
    DialogUtils, ValidationUtils, StringUtils, AuthService, UsuarioService) {

    $scope.init = function() {
        configCharacterCounter();
        //configFormatTelefone();

        if(AuthService.isAutenticado()) {
            if(AuthService.isPerfilAluno())
                configAlteracaoAluno();
            else
                configAlteracaoProfessor();

            $scope.usuario = AuthService.getUsuario();
        } else {
            configCadastro();
            $scope.usuario = {};
        }
        
        $scope.isPerfilProfessor = 
            AuthService.isPerfilProfessor() || 
            AuthService.isPerfilCoordenador() ||
            AuthService.isPerfilAdministrador();
        $scope.isEditMode = $scope.usuario != null && $scope.usuario.id != null;
        $scope.getClassLabels = $scope.isEditMode ? 'active' : '';
    }

    $scope.salvar = function() {
        var form = $("#formUsuario");

        if (form.valid()) {
            if($scope.isEditMode && $scope.isPerfilProfessor)
                UsuarioService.alterarProfessor($scope.usuario, aposSalvar);
            else if($scope.isEditMode)
                UsuarioService.alterarAluno($scope.usuario, aposSalvar);
            else
                UsuarioService.inserirAluno($scope.usuario, aposSalvar);
        }
    };
    
    function aposSalvar(response) {
        if(AuthService.isAutenticado()) {
            AuthService.setUsuario($scope.usuario);
            $location.path('/');
        } else {
            $scope.usuario.senha = $scope.usuario.novaSenha;
            AuthService.autenticar($scope.usuario);
        }
    }
    
    $scope.voltar = function() {
        if (AuthService.isAutenticado())
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
    
    function configCadastro() {
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
                novaSenha: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                confirmacaoSenha: {
                    required: true,
                    equalTo: "#input-nova-senha"
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
                novaSenha: {
                    required: "Informe uma senha para o seu usuário.",
                    minlength: "Senha deve conter mais de 4 caracteres.",
                    maxlength: "Senha não deve conter mais de 20 caracteres."
                },
                confirmacaoSenha: {
                    required: "Favor confirmar a senha digitada anteriormente.",
                    equalTo: "Senha diferente da confirmação."
                }
            }
        });
    }
    
    function configAlteracaoAluno() {
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
                telefone: {
                    required: true
                },
                senhaAtual: {
                    required: true
                },
                novaSenha: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                confirmacaoSenha: {
                    required: true,
                    equalTo: "#input-nova-senha"
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
                senhaAtual: {
                    required: "Informe a sua senha atual."
                },
                novaSenha: {
                    required: "Informe uma nova senha para o seu usuário.",
                    minlength: "Senha deve conter mais de 4 caracteres.",
                    maxlength: "Senha não deve conter mais de 20 caracteres."
                },
                confirmacaoSenha: {
                    required: "Favor confirmar a nova senha digitada anteriormente.",
                    equalTo: "Senha diferente da confirmação."
                }
            }
        });
    }
    
    function configAlteracaoProfessor() {
        ValidationUtils.configValidation('formUsuario', {
            rules: {
                nome: {
                    required: true,
                    maxlength: 255
                },
                senhaAtual: {
                    required: true
                },
                novaSenha: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                confirmacaoSenha: {
                    required: true,
                    equalTo: "#input-nova-senha"
                }
            },
            messages: {
                nome: {
                    required: "Informe seu nome completo.",
                    maxlength: "Nome não deve conter mais de 255 caracteres."
                },
                senhaAtual: {
                    required: "Informe a sua senha atual."
                },
                novaSenha: {
                    required: "Informe uma nova senha para o seu usuário.",
                    minlength: "Senha deve conter mais de 4 caracteres.",
                    maxlength: "Senha não deve conter mais de 20 caracteres."
                },
                confirmacaoSenha: {
                    required: "Favor confirmar a nova senha digitada anteriormente.",
                    equalTo: "Senha diferente da confirmação."
                }
            }
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
