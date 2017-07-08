function ConfigInputDataService() {

    this.config = function($scope) {
        var currentTime = new Date();
        $scope.currentTime = currentTime;
        $scope.month = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $scope.monthShort = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
        $scope.weekdaysFull = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
        $scope.weekdaysLetter = ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'];
        $scope.today = 'Hoje';
        $scope.clear = 'Limpar';
        $scope.close = 'Fechar';
        
        //$scope.disable = [false, 1, 7];
        //var days = 15;
        //$scope.minDate = (new Date($scope.currentTime.getTime() - (1000 * 60 * 60 * 24 * days))).toISOString();
        //$scope.maxDate = (new Date($scope.currentTime.getTime() + (1000 * 60 * 60 * 24 * days))).toISOString();
    }
}