function InscricaoService($http, DialogUtils) {

    this.buscarPorAtividade = function(id, callback) {
        $http({
            method: 'GET',
            url: '/api/inscricao/buscarPorAtividade.php?atividade_id=' + id,
        }).then(function(response) {
            if (response.data.sucesso)
                callback(response)
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }

    this.inscrever = function(atividadeId, callback) {
        $http({
            method: 'GET',
            url: '/api/inscricao/inscrever.php?atividadeId=' + atividadeId
        }).then(function(response) {
            if (response.data.sucesso)
                callback(response);
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }

    this.excluir = function(id, callback) {
        $http({
            method: 'DELETE',
            url: '/api/inscricao/excluir.php',
            data: {id: id}
        }).then(function(response) {
            DialogUtils.showResponse(response);

            if (response.data.sucesso)
                callback();
        }, function(response) {
            DialogUtils.showError(response);
        });
    }
    
    this.salvar = function(inscricoes, callback) {
        $http({
            method: 'POST',
            url: '/api/inscricao/alterar.php',
            data: inscricoes
        }).then(function(response) {
            if(response.data.sucesso) {
                callback(response);
            } else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }
    
    this.buscarInscricoesMeuGrupo = function(atividadeId, callback) {
        $http({
            method: 'GET',
            url: '/api/inscricao/buscarPorMeuGrupo.php?atividade_id=' + atividadeId,
        }).then(function(response) {
            if (response.data.sucesso)
                callback(response)
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }
}
