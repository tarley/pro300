function RouteConfig($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "/app/views/atividade/listagemProfessor.html",
            controller: "AtividadeController"
        })
        .when("/listagemAluno", {
            templateUrl: "/app/views/atividade/listagemAluno.html",
            controller: "AtividadeController"
        })
        .when("/login", {
            templateUrl: "/app/views/usuario/login.html",
            controller: "LoginController",
            open: true
        })
        .when("/cadastrarAluno", {
            templateUrl: "/app/views/usuario/cadastroAluno.html",
            controller: "UsuarioController",
            open: true
        })
        .when("/cadastrarAtividade", {
            templateUrl: "/app/views/atividade/cadastro.html",
            controller: "AtividadeController"
        })
        .when("/inscricao", {
            templateUrl: "/app/views/atividade/inscricao.html",
            controller: "AtividadeController"
        })
        .when("/inscricoes", {
            templateUrl: "/app/views/atividade/inscricoes.html",
            controller: "AtividadeController"
            
        })
        .otherwise({
            redirectTo: "/login"
        });
}

function OnRouteChangeStart($http, $rootScope, $location, AuthService) {
    $rootScope.$on('$routeChangeStart', function(event, next, current) {
        if (!next.open && !AuthService.isAutenticado()) {
           $location.path('/login');
        } else if(next.templateUrl == '/app/views/atividade/listagemProfessor.html' && AuthService.isPerfilAluno()) {
            $location.path('/listagemAluno');
        }
    });
}