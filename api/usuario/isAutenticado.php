<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    if(autenticacaoInvalida())
        http_response_code(401);
    else
        http_response_code(200);
        
    exit;
?>