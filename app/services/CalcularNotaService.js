function CalcularNotaService(StringUtils, DialogUtils, ListaUtils) {

    return {
        existemNotasLancadas: function(listaInscricoes) {
            if (ListaUtils.isNullOrEmpty(listaInscricoes))
                return false;

            for (var i = 0; i < listaInscricoes.length; i++) {
                var inscricao = listaInscricoes[i];

                if (inscricao.lider == 1 && StringUtils.isNotNullOrEmpty(inscricao.nota300))
                    return true;
            }

            return false;
        },
        // TODO Remover esse código
        calcularNotasLideres: function(listaInscricoes) {
            if (ListaUtils.isNullOrEmpty(listaInscricoes)) {
                DialogUtils.showMessage("Lista de inscrições vazia ou nula.");
                return;
            }

            if (inscricoesSemNota1(listaInscricoes)) {
                DialogUtils.showMessage("É necessário lançar todas as notas 'P. 1' para o calculo das notas dos lideres");
                return;
            }

            if (inscricoesSemNota300(listaInscricoes)) {
                DialogUtils.showMessage("É necessário lançar todas as notas 'P. 300' dos ajudados para o calculo das notas dos lideres");
                return;
            }

            listaInscricoes.forEach(function(inscricao, index, listaInscricoes) {

                if (inscricao.lider != 1)
                    return;

                var mediaMelhoriaNotas = calcularMediaMelhoriaNotas(listaInscricoes, inscricao.grupo);
                var mediaDasAvaliacoes = calcularMediaDasAvaliacoes(inscricao.notasAvaliado);

                var acrescimo = obterAcrecimo(mediaMelhoriaNotas, mediaDasAvaliacoes);

                inscricao.nota300 = parseInt(inscricao.nota1) + acrescimo;
            }, this);
        }
    };

    function inscricoesSemNota1(listaInscricoes) {
        if (ListaUtils.isNullOrEmpty(listaInscricoes))
            return true;

        for (var i = 0; i < listaInscricoes.length; i++) {
            var inscricao = listaInscricoes[i];

            if (StringUtils.isNullOrEmpty(inscricao.nota1))
                return true;
        }

        return false;
    }

    function inscricoesSemNota300(listaInscricoes) {
        if (ListaUtils.isNullOrEmpty(listaInscricoes))
            return true;

        for (var i = 0; i < listaInscricoes.length; i++) {
            var inscricao = listaInscricoes[i];

            if (inscricao.lider != 1 && StringUtils.isNullOrEmpty(inscricao.nota300))
                return true;
        }

        return false;
    }
    // TODO Remover esse código
    function calcularMediaMelhoriaNotas(listaInscricoes, grupo) {

        var somaMelhoriaNotas = 0;
        var totalAlunos = 0;

        listaInscricoes.forEach(function(inscricao, index, listaInscricoes) {
            if (inscricao.grupo != grupo || inscricao.lider == 1)
                return;

            somaMelhoriaNotas += inscricao.nota300 - inscricao.nota1;
            totalAlunos++;
        }, this);

        if (totalAlunos == 0)
            return 0;
        else
            return somaMelhoriaNotas / totalAlunos;
    }
    // TODO Remover esse código
    function calcularMediaDasAvaliacoes(listaNotasAvaliado) {

        var somaNotasAvaliacoes = 0;
        var totalAvaliacoes = 0;

        listaNotasAvaliado.forEach(function(notaAvaliado, index, listaNotasAvaliado) {
            if (StringUtils.isNullOrEmpty(notaAvaliado.nota))
                return;

            somaNotasAvaliacoes += notaAvaliado.nota;
            totalAvaliacoes++;
        }, this);

        if (totalAvaliacoes == 0)
            return 0;
        else
            return somaNotasAvaliacoes / totalAvaliacoes;
    }
    
    function obterAcrecimo(mediaMelhoriaNotas, mediaDasAvaliacoes) {
        if (mediaMelhoriaNotas < 5) {
            switch (true) {
                case (mediaDasAvaliacoes < 1):
                    return 0;
                case (mediaDasAvaliacoes < 2):
                    return 1;
                case (mediaDasAvaliacoes < 3):
                    return 2;
                case (mediaDasAvaliacoes < 4):
                    return 3;
                default:
                    return 4;
            }
        }
        else {
            switch (true) {
                case (mediaDasAvaliacoes < 1):
                    return 0;
                case (mediaDasAvaliacoes < 2):
                    return 1.5;
                case (mediaDasAvaliacoes < 3):
                    return 2.5;
                case (mediaDasAvaliacoes < 4):
                    return 3.5;
                default:
                    return 4.5;
            }
        }
    }
}
