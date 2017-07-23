function AuthService($http, $rootScope, $location, $window, DialogService) {
    return {
        autenticar: function(data) {
            $http({
                method: 'POST',
                url: '/api/usuario/autenticar.php',
                data: data
            }).then(function(response) {
                if (response.data.sucesso) {
                    DialogService.showMessage("Bem vindo ao projeto 300!")
                    atualizarMenu();
                    $location.path('/');
                } else
                    DialogService.showResponse(response);
            }, function(response) {
                DialogService.showError(response);
            });
        },
        logout: function() {
            $http({
                method: 'GET',
                url: '/api/usuario/logout.php'
            }).then(function(response) {
                limparMenu();
                $location.path('/login');
            }, function(response) {
                DialogService.showError(response);
            });
        },
        atualizarMenu : function() {
            atualizarMenu()
        },
        limparMenu : function() {
            limparMenu()
        }
    };

    function atualizarMenu() {
        $http({
            method: 'GET',
            url: '/api/usuario/getMenu.php'
        }).then(function(response) {
             $rootScope.itensMenu = {};
             
            if (response.data.sucesso) {
                $rootScope.itensMenu = response.data.lista;
            }
        }, function(response) {
            DialogService.showError(response);
        });
    }

    function limparMenu() {
        $rootScope.itensMenu = {};
    }
}
