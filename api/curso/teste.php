<?php
    require_once '../../Config.php';

    Log::Debug("API: curso/buscarTodos");

    $log->Debug("Parametros: key1=" . $_GET['key1'] . " key2=" . $_GET['key2']);
    
    try {
        $lista = Curso::getAll();
        respostaListaJson($lista);
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>