function AtividadeController($scope, $http, $location, DataService,
    SelectService, AtividadeService, DialogService) {

    $scope.initListagem = function() {
        $scope.lista = {};

        $http({
            method: 'GET',
            url: '/api/atividade/buscarAtivosPorCodigoProfessor.php'
        }).then(function(response) {
            if (response.data.sucesso)
                $scope.lista = response.data.lista;
            else
                DialogService.showResponse(response);
        }, function(response) {
            DialogService.showError(response);
        });
    }

    $scope.novaAtividade = function() {
        AtividadeService.setAtividade({})
        $location.path('/cadastrarAtividade');
    }

    $scope.initCadastro = function() {
        $scope.atividade = AtividadeService.getAtividade();
        
        AtividadeService.configCadastro();
        
        $http({
            method: 'GET',
            url: '/api/curso/buscarTodos.php'
        }).then(function(response) {
            if (response.data.sucesso) {
                $scope.cursos = response.data.lista;

                SelectService.configField('#select-curso');
            }
            else
                DialogService.showResponse(response);
        }, function(response) {
            DialogService.showError(response);
        });
    }

    $scope.salvar = function() {
        var form = $("#formAtividade");
        console.log("Valid: " + form.valid());

        if (!form.valid())
            return;

        $http({
            method: 'POST',
            url: '/api/atividade/inserirOuAlterar.php',
            data: $scope.atividade
        }).then(function(response) {
            DialogService.showResponse(response);

            if (response.data.sucesso)
                $location.path('/');
        }, function(response) {
            DialogService.showError(response);
        });
    }

    $scope.voltar = function() {
        $location.path('/');
    }

    $scope.editar = function(id) {
        $http({
            method: 'GET',
            url: '/api/atividade/buscarPorId.php?id=' + id,
        }).then(function(response) {
            if (response.data.sucesso) {
                var lista = response.data.lista;
                
                if(lista == null || lista.length == 0) {
                    DialogService.showMessage("Atividade de código {0} não encontrada.", [id]);
                    return;
                }
                AtividadeService.setAtividade(lista[0]);
                $location.path('/cadastrarAtividade');
            }
            else
                DialogService.showResponse(response);
        }, function(response) {
            DialogService.showError(response);
        });
    }
    
    $scope.isEditMode = function() {
        return $scope.atividade != null && $scope.atividade.id != null;
    }
    
    $scope.getClassLabels = function() {
        return $scope.isEditMode() ? 'active' : '';
    }
}
