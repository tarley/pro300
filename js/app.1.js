var app = angular.module('pro300App', ["ngRoute"]);
 
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl:"/template/atividade/listagem.html"
    })
    .when("/novaAtividade", {
        templateUrl: "/template/atividade/formulario.html"
    })
    .when("/login", {
        templateUrl: "/template/login.html"
    });
});

app.controller('AtividadeController', AtividadeController);



/*
app.run(function ($rootScope, $location, AuthService) {
 
    $rootScope.$on('$routeChangeStart', function(event, next, current){
        if(next.authorize) {
            if(!AuthService.getToken()) {
                event.preventDefault();
                $location.path('/login');
            }   
        }
    });
 
    
});


var app = angular.module('pro300App', [])
    .factory('AuthInterceptor', AuthInterceptor)
    .config(function($httpProvider) {
        $httpProvider.interceptors.push('AuthInterceptor');
    });
    
function AuthInterceptor($location, AuthService, $q) {
    
    return {
        request: function(config) {
            config.headers = config.headers || {};
            
            if(AuthService.getToken()) {
                config.headers['Authorization'] = 'Bearer ' + AuthService.getToken();
            }
            
            return config;
        },
        responseError : function(response) {
            if(response.status == 401 || response.status == 403) {
                $location.path('/signin');
            }
            
            return $q.reject(response);
        }
    }
}
*/