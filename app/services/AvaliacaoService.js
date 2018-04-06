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
    
    this.buscarAvaliacoesPendentes = function(atividadeId, callback) {
        $http({
            url: '/api/avaliacao/buscarPendentes.php?atividadeId=' + atividadeId,
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
    
    this.enviarAvaliacoes = function(lista, callback) {
        $http({
            url: '/api/avaliacao/enviarAvaliacoes.php',
            method: 'POST',
            data: lista
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