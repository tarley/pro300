function MenuController($scope, $rootScope, $http, $location, AuthService) {

    $scope.init = function() {
        AuthService.atualizarMenu();
        configSideNav();
    }

    $scope.logout = function() {
        AuthService.logout();
    };
    
    function configSideNav() {
         $(document).ready(function() {
            $('#button-menu').sideNav({
                menuWidth: 300,
                edge: 'right',
                closeOnClick: true,
                draggable: true,
                onOpen: function(el) { },
                onClose: function(el) { },
            });
        });
    }
}
