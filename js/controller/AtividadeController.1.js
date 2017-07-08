function AtividadeController($scope, $http, $location) {

    var currentTime = new Date();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        currentTime: currentTime,
        monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthsShort : ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        weekdaysFull : ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
        weekdaysShort : ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        weekdaysLetter : ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        today : 'Hoje',
        clear : 'Limpar',
        close : 'Fechar'
    });


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
