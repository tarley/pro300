function CursoService($http, DialogService) {

    this.buscarTodos = function(callback) {
        $http({
            method: 'GET',
            url: '/api/curso/buscarTodos.php'
        }).then(function(response) {
            if (response.data.sucesso) {
                callback(response);
            }
            else
                DialogService.showResponse(response);
        }, function(response) {
            DialogService.showError(response);
        });
    }

}
