<?php
    require_once '../../Config.php';

    LOG::Debug("API: avaliacao/buscarPendentes");

    acessoRestrito(array($ALUNO));

    try {
        $lista = Avaliacao::getAvaliacoesPendentes($_GET['atividadeId']);
        
        respostaListaJson($lista);
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>