<?php
    require_once '../../Config.php';

    if(autenticacaoInvalida())
        http_response_code(401);
    else
        http_response_code(200);
        
    exit;
?>