function AuthService($http, $rootScope, $location, $window, DialogService) {

    this.getUsuario = function() {
        return $rootScope.usuario;
    }

    this.setUsuario = function(value) {
        $rootScope.usuario = value;
    }

    this.isAutenticado = function() {
        return this.getUsuario() != null;
    }

    this.isPerfilAluno = function() {
        return this.isAutenticado() && this.getUsuario().perfil == 'Aluno';
    }

    this.setItensMenu = function(value) {
        $rootScope.itensMenu = value;
    }

    this.atualizarMenu = function() {
        this.limparMenu();
        var self = this;
        if (this.isAutenticado()) {
            $http({
                method: 'GET',
                url: '/api/usuario/getMenu.php'
            }).then(function(response) {
                if (response.data.sucesso) {
                    self.setItensMenu(response.data.lista);
                }
            }, function(response) {
                DialogService.showError(response);
            });
        }
    }

    this.limparMenu = function() {
        this.setItensMenu({});
    }

    this.autenticar = function(usuario) {
        var self = this;
        
        $http({
            method: 'POST',
            url: '/api/usuario/autenticar.php',
            data: usuario
        }).then(function(response) {
            if (response.data.sucesso) {
                DialogService.showMessage("Bem vindo ao projeto 300!")
                self.setUsuario(response.data.lista);

                self.atualizarMenu();
                $location.path('/');
            }
            else
                DialogService.showResponse(response);
        }, function(response) {
            DialogService.showError(response);
        });
    }
    
    this.logout = function() {
        var self = this;
        
        $http({
            method: 'GET',
            url: '/api/usuario/logout.php'
        }).then(function(response) {
            self.setUsuario(null);
            self.limparMenu();

            $location.path('/login');
        }, function(response) {
            DialogService.showError(response);
        });
    }
}
