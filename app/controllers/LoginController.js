function LoginController($scope, $http, ValidationUtils, AuthService) {

    $scope.init = function() {
        AuthService.limparMenu();
        ValidationUtils.configValidation('formLogin', {
            rules: {
                email: {
                    required: true,
                    email: true
                },
                senha: "required"
            },
            messages: {
                email: {
                    required: "Informe o e-mail da sua conta.",
                    email: "e-mail inválido."
                },
                senha: "Informe a senha da sua conta."
            }
        });
    }

    $scope.autenticar = function() {
        var form = $("#formLogin");
        
        if(form.valid()) {
            AuthService.autenticar($scope.usuario);
        }
    }
}
