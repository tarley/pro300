function FundadoresController ($scope, $location) {
    $scope.voltar = function() {
        $location.path("/")
    }
    
    $scope.init = function() {
        $location.path("/emitirRelaorio.html")
    }
}