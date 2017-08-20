function AvaliacaoService($http, DialogUtils) {
    
    this.iniciarAvaliacaoColegas = function(atividadeId, callback) {
        $http({
            url: '/api/avaliacao/criar.php?atividadeId=' + atividadeId,
            method: 'GET'
        }).then(function(response) {
            if(response.data.sucesso)
                callback(response);
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        })
    }
}