function CursoService($http, DialogUtils) {

    this.buscarTodos = function(callback) {
        $http({
            method: 'GET',
            url: '/api/curso/buscarTodos.php'
        }).then(function(response) {
            if (response.data.sucesso) {
                callback(response);
            }
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }

}
