<?php
    require_once '../../Config.php';

    Log::Debug("API: curso/buscarTodos");

    acessoRestrito();

    try {
        $lista = Curso::getAll();
        respostaListaJson($lista);
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>