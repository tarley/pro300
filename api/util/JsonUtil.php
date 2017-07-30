<?php
    require_once '../log/logentries.php';
    
function respostaJson($mensagem = null, $lista = null, $sucesso = true, $log = null) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    $response = json_encode(array("sucesso" => $sucesso, "mensagem" => $mensagem, "lista" => $lista));
    
    if($log != null)
        $log->Debug(print_r($response, true));
    
    echo $response;
    exit;
}

function respostaListaJson($lista, $log = null) {
    respostaJson(null, $lista, true, $log);
}

function respostaErroJson($exception, $log = null) {
    respostaJson($exception->getMessage(), null, false, $log);
}

?>