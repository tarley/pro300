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
    
    this.alterarAluno = function(aluno, callback) {
        $http({
            method: 'POST',
            url: '/api/usuario/alterarAluno.php',
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
    
    this.alterarProfessor = function(professor, callback) {
        $http({
            method: 'POST',
            url: '/api/usuario/alterarProfessor.php',
            data: professor
        }).then(function(response) {
            DialogUtils.showResponse(response);
            if (response.data.sucesso) {
                callback(response);
            }
        }, function(response) {
            DialogUtils.showError(response);
        });
    }
    
    this.recuperarSenha = function(email, callback) {
        $http({
            method: 'GET',
            url: '/api/usuario/recuperarSenha.php?email=' + email
        }).then(function(response) {
            DialogUtils.showResponse(response);
        }, function(response) {
            DialogUtils.showError(response);
        });
    }
}
