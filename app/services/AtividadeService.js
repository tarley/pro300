function AtividadeService($http, DialogService, DataService, SelectService) {
    var atividade;

    return {
        setAtividade: function(value) {
            atividade = value;
        },
        getAtividade: function() {
            return atividade;
        },
        buscarAtividadePorId: function(id, callback) {
            $http({
                method: 'GET',
                url: '/api/atividade/buscarPorId.php?id=' + id,
            }).then(function(response) {
                if (response.data.sucesso) {
                    var lista = response.data.lista;

                    if (lista == null || lista.length == 0) {
                        DialogService.showMessage("Atividade de código {0} não encontrada.", [id]);
                        return;
                    }
                    
                    callback(lista[0]);
                }
                else
                    DialogService.showResponse(response);
            }, function(response) {
                DialogService.showError(response);
            });
        }
    };
}
