function LoginController($scope, $http, AuthService) {

    AuthService.limparMenu();

    $(document).ready(function() {
        $("#formLogin").validate({
            debug: true,
            rules: {
                email: {
                    required: true,
                    email: true
                },
                senha: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Informe o e-mail da sua conta.",
                    email: "e-mail inválido."
                },
                senha: {
                    required: "Informe a senha da sua conta."
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

    $scope.autenticar = function() {
        var form = $("#formLogin");
        console.log("Valid: " + form.valid());
        
        if(form.valid()) {
            AuthService.autenticar($scope.login);
        }
    }
}
