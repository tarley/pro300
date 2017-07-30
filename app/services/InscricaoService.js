function InscricaoService($http, DialogService) {

    this.buscarPorAtividade = function(id, callback) {
        $http({
            method: 'GET',
            url: '/api/inscricao/buscarPorAtividade.php?atividade_id=' + id,
        }).then(function(response) {
            if (response.data.sucesso)
                callback(response)
            else
                DialogService.showResponse(response);
        }, function(response) {
            DialogService.showError(response);
        });
    }

    this.excluir = function(id, callback) {
        $http({
            method: 'DELETE',
            url: '/api/inscricao/excluir.php',
            data: {id: id}
        }).then(function(response) {
            DialogService.showResponse(response);

            if (response.data.sucesso)
                callback();
        }, function(response) {
            DialogService.showError(response);
        });
    }
}
