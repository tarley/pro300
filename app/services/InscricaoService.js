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
    
    this.calcularNotaFinal = function(inscricao) {
        
        if(inscricao == undefined || inscricao == null)
            return 0;
        
        var nota1 = Number(inscricao.nota1);
        
        if(isNaN(nota1))
            return 0;
        
        if(inscricao.lider == 1) {
            var acrescimoLider = inscricao.acrescimoLider;
            
            if(isNaN(acrescimoLider))
                return nota1;
            else if(nota1 + acrescimoLider > 30)
                return 30;
            else
                return nota1 + acrescimoLider;
        } else {
            var nota300 = Number(inscricao.nota300);
            
            if(isNaN(nota300))
                return 0;
            else if(nota1 > nota300)
                return nota1;
            else
                return nota300;
        }
    }
}
