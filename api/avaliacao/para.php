<?php
    require_once '../../Config.php';

    LOG::Debug("API: avaliacao/para");

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    try {
        $lista = Avaliacao::getAvaliacoesPara($_GET['inscricaoId']);
        
        respostaListaJson($lista);
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>