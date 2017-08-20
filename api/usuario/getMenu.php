<?php
    require_once '../../Config.php';
    
    Log::Debug("API: usuario/getMenu");

    acessoRestrito();
    
    $menu = new Menu($DB_HOST, $DB_NAME, $DB_USERNAME, $DB_PASSWORD, $log);
    
    switch(getPerfilId()) {
        case $ADMINISTRADOR:
            $lista = [];
            break;
        case $COORDENADOR:
            $lista = [];
            break;
        case $PROFESSOR:
            $lista = [];
            break;
        case $ALUNO:
            $lista = []; // $menu->getMenuAluno();
            break;
    }

    return respostaListaJson($lista);
?>