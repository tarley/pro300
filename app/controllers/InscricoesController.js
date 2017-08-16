function InscricoesController($scope, $http, $location, 
    DialogUtils, TableUtils, SelectUtils,
    AtividadeService, InscricaoService, GrupoService) {

    $scope.init = function() {
        $scope.atividade = AtividadeService.getAtividade();
        buscarInscricoes();
    }

    $scope.excluir = function(id) {
        InscricaoService.excluir(id, buscarInscricoes);
    }

    $scope.gerarGrupos = function() {
        var listaInscricoes = $scope.lista;

        if (GrupoService.existemGruposGerados(listaInscricoes) &&
            !confirm('Alunos já possuem grupos. Deseja realizar uma nova geração de grupos?'))
            return;
        
        var numeroMinimoAlunosPorGrupo = prompt("Qual o número minimo de alunos por grupo?");
        if(numeroMinimoAlunosPorGrupo)
            GrupoService.gerarGrupos(numeroMinimoAlunosPorGrupo, $scope.lista);

        // $('#modal1').modal('open', {
        //     ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        //         alert("Ready");
        //         console.log(modal, trigger);
        //     },
        //     complete: function() {
        //         alert('Closed');
        //     } // Callback for Modal close
        // });

        // $('#modal1').modal({
        //     dismissible: true, // Modal can be dismissed by clicking outside of the modal
        //     opacity: .5, // Opacity of modal background
        //     inDuration: 300, // Transition in duration
        //     outDuration: 200, // Transition out duration
        //     startingTop: '4%', // Starting top style attribute
        //     endingTop: '10%', // Ending top style attribute

        // });

    }

    $scope.salvar = function() {
        InscricaoService.salvar($scope.lista, function(response) {
            DialogUtils.showMessage("Inscrições alteradas com sucesso!");
            buscarInscricoes();
        });
    }

    $scope.voltar = function() {
        $location.path('/');
    }

    function buscarInscricoes() {
        $scope.lista = {};

        InscricaoService.buscarPorAtividade($scope.atividade.id, function(response) {
            $scope.lista = response.data.lista;
            configDataTable();
            SelectUtils.configField();
        });
    }

    function configDataTable() {
        TableUtils.configOrderDataType();

        TableUtils.configDataTable('table-inscricoes', {
            "order": [
                [1, "desc"]
            ],
            "columns": [
                null, null,
                { "orderDataType": "dom-text", type: 'string' },
                { "orderDataType": "dom-checkbox" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                null
            ]
        });
    }
}
