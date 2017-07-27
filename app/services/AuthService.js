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
                    setUsuario(response.data.lista);

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
                logout();
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

    var usuario = null;

    function getUsuario() {
        //return $rootScope.usuario;
        return usuario;
    }
    
    function setUsuario(value) {
        usuario = value;
    }
    
    function logout() {
        setUsuario(null);
    }
    
    function isAutenticado() {
        //return getUsuario() != undefined && getUsuario() != null;
        return getUsuario() != null;
    }

    function isPerfilAluno() {
        return isAutenticado() && getUsuario().perfil == 'Aluno';
    }

    function setItensMenu(value) {
        $rootScope.itensMenu = value;
    }

    function atualizarMenu() {
        limparMenu();

        if (isAutenticado()) {
            $http({
                method: 'GET',
                url: '/api/usuario/getMenu.php'
            }).then(function(response) {
                if (response.data.sucesso) {
                    setItensMenu(response.data.lista);
                }
            }, function(response) {
                DialogService.showError(response);
            });
        }
    }

    function limparMenu() {
        setItensMenu({});
    }
}
