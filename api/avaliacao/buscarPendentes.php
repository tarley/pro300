<?php
    require_once '../../Config.php';

    LOG::Debug("API: avaliacao/buscarPendentes");

    acessoRestrito(array($ALUNO));

    try {
        $alunoId = getUsuarioId();
        $lista = Avaliacao::getAvaliacoesPendentes($alunoId, $_GET['atividadeId']);
        
        respostaListaJson($lista);
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>