function GrupoService(StringUtils, DialogUtils) {

    this.existemGruposGerados = function(listaInscricoes) {
        if (isNullOrEmpty(listaInscricoes))
            return false;

        for (var i = 0; i < listaInscricoes.length; i++) {
            var inscricao = listaInscricoes[i];

            if (inscricao.grupo != null && inscricao.grupo.trim().length > 0)
                return true;
        }

        return false;
    }

    this.gerarGrupos = function(numeroMinimoAlunosPorGrupo, listaInscricoes) {

        if (StringUtils.isNotNumber(numeroMinimoAlunosPorGrupo)) {
            DialogUtils.showMessage("'{0}' não é um número válido.", [numeroMinimoAlunosPorGrupo]);
            return;
        }

        if (isNullOrEmpty(listaInscricoes)) {
            DialogUtils.showMessage("Lista de inscrições vazia ou nula.");
            return;
        }
        
        if(numeroMinimoAlunosPorGrupo < 1) {
            DialogUtils.showMessage("Número minimo de alunos por grupo não pode ser menor que 1.");
            return;
        }
        
        if(listaInscricoes.length < numeroMinimoAlunosPorGrupo) {
            DialogUtils.showMessage("Número de inscrições insuficiente para criar um grupo.");
            return;
        }

        if (inscricoesSemNota1(listaInscricoes)) {
            DialogUtils.showMessage("É necessário lançar todas as notas 'P. 1' para a geração dos grupos");
            return;
        }

        var numeroDeGrupos = Math.round(listaInscricoes.length / numeroMinimoAlunosPorGrupo);

        definirLideresEGrupos(numeroDeGrupos, listaInscricoes);
    }

    function isNullOrEmpty(listaInscricoes) {
        return listaInscricoes == undefined || listaInscricoes == null || listaInscricoes.length == 0;
    }

    function inscricoesSemNota1(listaInscricoes) {
        if (isNullOrEmpty(listaInscricoes))
            return true;

        for (var i = 0; i < listaInscricoes.length; i++) {
            var inscricao = listaInscricoes[i];

            if (StringUtils.isNullOrEmpty(inscricao.nota1))
                return true;
        }

        return false;
    }

    function definirLideresEGrupos(numeroDeGrupos, listaInscricoes) {
        listaInscricoes.sort(function(i1, i2) {
            return i2.nota1 - i1.nota1;
        });

        var GRUPOS = "ABCDEFGHIJKLMNOPQRSTUVXWYZ";
        var grupoLiderado = numeroDeGrupos - 1;

        listaInscricoes.forEach(function(inscricao, index) {
            inscricao.lider = (index < numeroDeGrupos);
            inscricao.grupo = GRUPOS[(inscricao.lider ? index : grupoLiderado--) % numeroDeGrupos];
        });
    }
}
