function RouteConfig($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "/app/views/atividade/listagem.html"
        })
        .when("/login", {
            templateUrl: "/app/views/usuario/login.html",
            open: true
        })
        .when("/cadastrarAluno", {
            templateUrl: "/app/views/usuario/cadastroAluno.html",
            open: true
        })
        .when("/cadastrarAtividade", {
            templateUrl: "/app/views/atividade/cadastro.html"
        })
        .otherwise({
            redirectTo: "/login"
        });
}

function OnRouteChangeStart($http, $rootScope, $location, AuthService) {
    $rootScope.$on('$routeChangeStart', function(event, next, current) {
        $http({
            method: 'HEAD',
            url: '/api/usuario/isAutenticado.php'
        }).then(function(response) {
            //console.log('Autenticado');
        }, function(response) {
            if (!next.open) {
                $location.path('/login');
            }
        });
    });
}