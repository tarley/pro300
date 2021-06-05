function GrupoService(StringUtils, DialogUtils, ListaUtils) {

    this.existemGruposGerados = function(listaInscricoes) {
        if (ListaUtils.isNullOrEmpty(listaInscricoes))
            return false;

        for (var i = 0; i < listaInscricoes.length; i++) {
            var inscricao = listaInscricoes[i];

            if (inscricao.grupo != null && StringUtils.isNotNullOrEmpty(inscricao.grupo))
                return true;
        }

        return false;
    }

    this.gerarGrupos = function(numeroMinimoAlunosPorGrupo, listaInscricoes) {

        if (StringUtils.isNotNumber(numeroMinimoAlunosPorGrupo)) {
            DialogUtils.showMessage("'{0}' não é um número válido.", [numeroMinimoAlunosPorGrupo]);
            return;
        }

        if (ListaUtils.isNullOrEmpty(listaInscricoes)) {
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

    function definirLideresEGrupos(numeroDeGrupos, listaInscricoes) {
        listaInscricoes.sort(function(i1, i2) {
            return i2.nota1 - i1.nota1;
        });

        var GRUPOS = "ABCDEFGHIJKLMNOPQRSTUVXWYZ";
        var i;
        
        /* Definir os lideres */
        for(i = 0; i < numeroDeGrupos; i ++) {
            listaInscricoes[i].lider = true;
            listaInscricoes[i].grupo = GRUPOS[i];
        }
        
        /* Definir os grupos dos ajudados */
        for(var j = i; j < listaInscricoes.length; j++) {
            var inscricao = listaInscricoes[j]
            
            inscricao.lider = inscricao.nota1 > 16.5
            
            if(--i < 0) 
                i = numeroDeGrupos - 1;
            
            inscricao.grupo = GRUPOS[i];
        }
    }
}
