function InscricoesController($scope, $http, $location, 
    DialogUtils, TableUtils, SelectUtils, StringUtils,
    AtividadeService, InscricaoService, GrupoService, AvaliacaoService, 
    CalcularNotaService) {

    $scope.init = function() {
        $scope.atividade = AtividadeService.getAtividade();
        buscarInscricoes();
    }

    $scope.calcularAcrescimo = function(inscricao) {
        
        if(inscricao == undefined || inscricao == null)
            return 0;
        
        var nota1 = Number(inscricao.nota1);
        var nota300 = Number(inscricao.nota300);
        
        if(isNaN(nota1))
            return 0;
        
        if(isNaN(nota300))
            return 0;
            
        var acrescimo = nota300 - nota1;
        
        return Math.round(acrescimo * 100) / 100;
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
        if(numeroMinimoAlunosPorGrupo) {
            GrupoService.gerarGrupos(numeroMinimoAlunosPorGrupo, listaInscricoes);
            DialogUtils.showMessage('Grupos gerados com sucesso.');
            $scope.salvar();
        }
    }

    $scope.salvar = function() {
        InscricaoService.salvar($scope.lista, function(response) {
            DialogUtils.showMessage("Inscrições alteradas com sucesso!");
            buscarInscricoes();
        });
    }

    $scope.iniciarAvaliacaoColegas = function() {
        AvaliacaoService.iniciarAvaliacaoColegas($scope.atividade.id, function(response) {
            DialogUtils.showMessage("Foi iniciada a avaliação da ajuda dos colegas do grupo. Informe os alunos que eles devem acessar o sistema para responder as avaliações pendentes.");
            
            AtividadeService.buscarAtividadePorId($scope.atividade.id, function(atividade) {
                AtividadeService.setAtividade(atividade);
                $scope.atividade = atividade;
            });
            
            buscarInscricoes();
        });
    }
    
    $scope.calcularNotasLideres = function() {
        var listaInscricoes = $scope.lista;

        if (CalcularNotaService.existemNotasLancadas(listaInscricoes) &&
            !confirm('Os lideres já possuem nota. Deseja realizar um novo calculo de nota?'))
            return;
        
        CalcularNotaService.calcularNotasLideres(listaInscricoes);
        DialogUtils.showMessage('Calculo de Notas dos lideres concluido com sucesso. Lembre-se de salvar para manter as alterações.');
    }

    $scope.voltar = function() {
        $location.path('/');
    }

    $scope.irParaRelatorio = function() {
        $location.path('/relatorio');
    }

    $scope.avaliacaoDosColegasIniciada = function() {
        return StringUtils.isNotNullOrEmpty($scope.atividade.dt_inicio_avaliacao);
    }

    $scope.visualizarAvaliacoes = function(inscricaoId, raLider, nomeLider) {
        $scope.raLider = raLider;
        $scope.nomeLider = nomeLider;
        $scope.listaAvaliacoes = {};
        
        AvaliacaoService.listarAvaliacoesPara(inscricaoId, function(response) {
            $scope.listaAvaliacoes = response.data.lista;
            
            var soma = 0;
            var total = 0;
            
            $scope.listaAvaliacoes.forEach(function(avaliacao) {
                if(avaliacao.nota) {
                    soma += parseInt(avaliacao.nota);
                    total++;
                }
            });
            
            $scope.notaMedia = 0;
            
            if(total > 0)
                $scope.notaMedia = soma / total;
        });

        $(document).ready(function() {
            $('#modal1').modal('open');
        });
    }
    
    $scope.formatarTelefone = function(value) {
        return StringUtils.formatarTelefone(value);
    }

    function buscarInscricoes() {
        $scope.lista = {};

        InscricaoService.buscarPorAtividade($scope.atividade.id, function(response) {
            $scope.lista = response.data.lista;
            //configDataTable();
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
