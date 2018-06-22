function RelatorioController ($scope, $location) {
    $scope.voltar = function() {
        $location.path("/");
    }
    
    $scope.init = function() {
        $location.path("/relatorio")
    }
}