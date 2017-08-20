<?php
    require_once '../../Config.php';

    $log->debug("API: inscricao/buscarPorAtividade");
    
    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR), $log);

    try {
        $lista = Inscricao::buscarPorAtividade($_GET["atividade_id"]);
        respostaListaJson($lista, $log);
    } catch(Exception $e) {
        $log->Error($e);
        respostaErroJson($e, $log);
    }
?>