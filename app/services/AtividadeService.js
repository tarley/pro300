function AtividadeService($http, DialogUtils) {
    this.atividade = null;

    this.setAtividade = function(value) {
        atividade = value;
    }

    this.getAtividade = function() {
        return atividade;
    }

    this.buscarAtividadePorId = function(id, callback) {
        $http({
            method: 'GET',
            url: '/api/atividade/buscarPorId.php?id=' + id,
        }).then(function(response) {
            if (response.data.sucesso) {
                var lista = response.data.lista;

                if (lista == null || lista.length == 0) {
                    DialogUtils.showMessage("Atividade de código {0} não encontrada.", [id]);
                    return;
                }

                callback(lista[0]);
            }
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }

    this.buscarPorProfessor = function(callback) {
        $http({
            method: 'GET',
            url: '/api/atividade/buscarPorProfessor.php'
        }).then(function(response) {
            if (response.data.sucesso)
                callback(response);
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }

    this.buscarPorAluno = function(callback) {
        $http({
            method: 'GET',
            url: '/api/atividade/buscarPorAluno.php'
        }).then(function(response) {
            if (response.data.sucesso)
                callback(response);
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }

    this.buscarParaInscricao = function(cursoId, callback) {
        $http({
            method: 'GET',
            url: '/api/atividade/buscarParaInscricao.php?curso_id=' + cursoId,
        }).then(function(response) {
            if (response.data.sucesso) {
                callback(response.data.lista);
            }
            else {
                DialogUtils.showResponse(response);
            }
        }, function(response) {
            DialogUtils.showError(response);
        });
    }

    this.inserirOuAlterar = function(atividade, callback) {
        $http({
            method: 'POST',
            url: '/api/atividade/inserirOuAlterar.php',
            data: atividade
        }).then(function(response) {
            if (response.data.sucesso)
                callback(response);
            else
                DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }
}
