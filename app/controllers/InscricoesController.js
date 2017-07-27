function InscricoesController($scope, $http, $location, DialogService, AtividadeService) {

    $scope.initInscricoes = function() {
        $scope.atividade = AtividadeService.getAtividade();
        
        $scope.lista = {};
        
        $http({
            method: 'GET',
            url: '/api/atividade/buscarInscricoes.php?atividade_id=' + $scope.atividade.id,
        }).then(function(response) {
            if(response.data.sucesso)
                $scope.lista = response.data.lista;
            else
                DialogService.showResponse(response);
        }, function(response){
            DialogService.showError(response);
        });
    }

    $scope.atualizarInscricoes = function() {
        DialogService.showMessage("Metodo não implementado.");
    }

    $scope.voltar = function() {
        $location.path('/');
    }
}
