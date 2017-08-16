function UsuarioService($http, DialogUtils) {
    this.inserirAluno = function(aluno, callback) {
        $http({
            method: 'POST',
            url: '/api/usuario/inserirAluno.php',
            data: aluno
        }).then(function(response) {
            DialogUtils.showResponse(response);
            if (response.data.sucesso) {
                callback(response);
            }
        }, function(response) {
            DialogUtils.showError(response);
        });
    }
}
