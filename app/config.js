var app = angular.module('pro300App', ["ngRoute"]);

app.service('StringUtils', StringUtils);
app.service('DialogUtils', DialogUtils);
app.service('SelectUtils', SelectUtils);
app.service('TableUtils', TableUtils);
app.service('ValidationUtils', ValidationUtils)
app.service('DateUtils', DateUtils);
app.service('ListaUtils', ListaUtils);


app.service('AuthService', AuthService);
app.service('UsuarioService', UsuarioService);
app.service('CursoService', CursoService);
app.service('GrupoService', GrupoService);
app.service('AtividadeService', AtividadeService);
app.service('AvaliacaoService', AvaliacaoService);
app.service('InscricaoService', InscricaoService);
app.service('CalcularNotaService', CalcularNotaService);



app.controller('CadastroAtividadeController', CadastroAtividadeController);
app.controller('ListagemAtividadeController', ListagemAtividadeController);
app.controller('InscricaoController', InscricaoController);
app.controller('InscricoesController', InscricoesController);
app.controller('LoginController', LoginController);
app.controller('MenuController', MenuController);
app.controller('UsuarioController', UsuarioController);
app.controller('AvaliacaoController', AvaliacaoController);

app.config(RouteConfig);
app.run(OnRouteChangeStart);
app.run(function($rootScope) {
  $rootScope.typeOf = function(value) {
    return typeof value;
  };
})

.directive('stringToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(value) {
        return '' + value;
      });
      ngModel.$formatters.push(function(value) {
        return parseFloat(value);
      });
    }
  };
});

/*
function AuthInterceptor($location, AuthService, $q) {
    return {
        request: function(config) {
            config.headers = config.headers || {};

            if (AuthService.getToken()) {
                config.headers['Authorization'] = 'Bearer ' + AuthService.getToken();
            }

            return config;
        },
        responseError: function(response) {
            if (response.status == 401 || response.status == 403) {
                $location.path('/signin');
            }

            return $q.reject(response);
        }
    }
}
*/
/*
app.factory('AuthInterceptor', AuthInterceptor)
    .config(function($httpProvider) {
        $httpProvider.interceptors.push('AuthInterceptor');
    });
*/