<?php
    
function respostaJson($mensagem = null, $lista = null, $sucesso = true) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    $response = json_encode(array("sucesso" => $sucesso, "mensagem" => $mensagem, "lista" => $lista));
    
    Log::Debug(print_r($response, true));
    
    echo $response;
    exit;
}

function respostaListaJson($lista) {
    respostaJson(null, $lista, true);
}

function respostaErroJson($exception) {
    respostaJson($exception->getMessage(), null, false);
}

?>