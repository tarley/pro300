function AtividadeController($scope, $http, $location, ConfigInputDataService) {

    ConfigInputDataService.config($scope);

    $scope.atividade = {};

    $scope.atividade.codigoProfessor = 1;
    $http.get('/api/atividade/buscarAtivosPorCodigoProfessor.php', {
        params: {
            codProfessor: $scope.atividade.codigoProfessor
        }
    }).then(function(response) {
        if (response.data.sucesso)
            $scope.lista = response.data.lista;
        else
            alert(response.data.mensagem);
    }, function(response) {
        alert(response.status + " - " + response.statusText);
    });

    $scope.dateFormat = function(data, format = 'DD/MM/YYYY') {
        return moment(data).format(format);
    }

    $scope.novaAtividade = function() {
        $scope.atividade = {};
        $location.path('/novaAtividade');
    }

    $scope.salvar = function() {
        
        $http({
            method: 'POST',
            url: '/api/atividade/salvar.php',
            data: $scope.atividade
        }).then(function(response) {
            
            alert(response.data.mensagem);
            
            if (response.data.sucesso)
                $location.path('/');
        }, function(response) {
            alert(response.status + " - " + response.statusText);
        });




    }

    $scope.onStart = function() {
        console.log('onStart');
    };
    $scope.onRender = function() {
        console.log('onRender');
    };
    $scope.onOpen = function() {
        console.log('onOpen');
    };
    $scope.onClose = function() {
        console.log('onClose');
    };
    $scope.onSet = function() {
        console.log('onSet');
    };
    $scope.onStop = function() {
        console.log('onStop');
    };
}
