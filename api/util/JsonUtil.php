<?php

function respostaJson($mensagem = null, $lista = null, $sucesso = true) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    echo json_encode(array("sucesso" => $sucesso, "mensagem" => $mensagem, "lista" => $lista));
    exit;
}

function respostaListaJson($lista) {
    respostaJson(null, $lista);
}

function respostaErroJson($exception) {
    respostaJson($exception->getMessage(), null, false);
}

?>