<?php
    require_once '../../Config.php';

    LOG::Debug("API: avaliacao/criar");

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    try {
        Avaliacao::criar($_GET['atividadeId']);
        
        respostaJson("Avaliações criadas com sucesso!", null, true, $log);
    } catch(Exception $e) {
        LOG::Error($e);
        respostaErroJson($e);
    }
?>