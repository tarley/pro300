function RecuperarSenhaController($scope, $http, $location, ValidationUtils, UsuarioService) {

    $scope.init = function() {
        ValidationUtils.configValidation('formRecuperarSenha', {
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Informe o e-mail para envio da nova senha.",
                    email: "e-mail inválido."
                }
            }
        });
    }

    $scope.recuperarSenha = function() {
        var form = $("#formRecuperarSenha");
        
        if(form.valid()) {
            UsuarioService.recuperarSenha($scope.email);
        }
    }
    
    $scope.voltar = function() {
        $location.path("/login");
    }
}
