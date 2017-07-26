function AuthService($http, $rootScope, $location, $window, DialogService) {

    return {
        getUsuario: function() {
            return getUsuario();
        },
        isAutenticado: function() {
            return isAutenticado();
        },
        isPerfilAluno: function() {
            return isPerfilAluno();
        },
        autenticar: function(data) {
            $http({
                method: 'POST',
                url: '/api/usuario/autenticar.php',
                data: data
            }).then(function(response) {
                if (response.data.sucesso) {
                    DialogService.showMessage("Bem vindo ao projeto 300!")

                    $rootScope.usuario = response.data.lista;

                    atualizarMenu();
                    $location.path('/');
                }
                else
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
                $rootScope.usuario = null;
                limparMenu();

                $location.path('/login');
            }, function(response) {
                DialogService.showError(response);
            });
        },
        atualizarMenu: function() {
            atualizarMenu();
        },
        limparMenu: function() {
            limparMenu();
        }
    };

    function getUsuario() {
        return $rootScope.usuario;
    }

    function isAutenticado() {
        return getUsuario() != undefined && getUsuario() != null;
    }

    function isPerfilAluno() {
        return isAutenticado() && getUsuario().perfil == 'Aluno';
    }

    function atualizarMenu() {
        limparMenu();

        if (isAutenticado()) {
            $http({
                method: 'GET',
                url: '/api/usuario/getMenu.php'
            }).then(function(response) {
                if (response.data.sucesso) {
                    $rootScope.itensMenu = response.data.lista;
                }
            }, function(response) {
                DialogService.showError(response);
            });
        }
    }

    function limparMenu() {
        $rootScope.itensMenu = {};
    }
}
