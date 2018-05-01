function RouteConfig($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "/app/views/atividade/listagemProfessor.html",
            controller: "ListagemAtividadeController"
        })
        .when("/listagemAluno", {
            templateUrl: "/app/views/atividade/listagemAluno.html",
            controller: "ListagemAtividadeController"
        })
        .when("/login", {
            templateUrl: "/app/views/usuario/login.html",
            controller: "LoginController",
            open: true
        })
        .when("/recuperarSenha", {
            templateUrl: "/app/views/usuario/recuperarSenha.html",
            controller: "RecuperarSenhaController",
            open: true
        })
        .when("/cadastrarAluno", {
            templateUrl: "/app/views/usuario/cadastroAluno.html",
            controller: "UsuarioController",
            open: true
        })
        .when("/cadastrarAtividade", {
            templateUrl: "/app/views/atividade/cadastro.html",
            controller: "CadastroAtividadeController"
        })
        .when("/inscricao", {
            templateUrl: "/app/views/atividade/inscricao.html",
            controller: "InscricaoController"
        })
        .when("/inscricoes", {
            templateUrl: "/app/views/atividade/inscricoes.html",
            controller: "InscricoesController"
            
        })
        .when("/avaliarLider", {
            templateUrl: "/app/views/avaliacao/avaliarLider.html",
            controller: "AvaliacaoController"
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