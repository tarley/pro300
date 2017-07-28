<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    acessoRestrito();

    $lista = array();
    
    switch(getPerfilId()) {
        case $ADMINISTRADOR:
            $lista = 
                [
                   ["descricao" => "Alterar dados pessoais", "url" => "sass.html"],
                   ["descricao" => "Editar Professor", "url" => "sass.html"],
                   ["descricao" => "Editar Parâmetros", "url" => "sass.html"],
                   ["descricao" => "Avaliação", "url" => "sass.html"],
                   ["descricao" => "Fundadores", "url" => "sass.html"]
                ];
            break;
        case $COORDENADOR:
            $lista =
                [
                   ["descricao" => "Alterar dados pessoais", "url" => "sass.html"],
                   ["descricao" => "Editar Professor", "url" => "sass.html"],
                   ["descricao" => "Avaliação", "url" => "sass.html"],
                   ["descricao" => "Fundadores", "url" => "sass.html"]
                ];
            break;
        case $PROFESSOR:
            $lista =
                [
                   ["descricao" => "Alterar dados pessoais", "url" => "sass.html"],
                   ["descricao" => "Avaliação", "url" => "sass.html"],
                   ["descricao" => "Fundadores", "url" => "sass.html"]
                ];
            break;
        case $ALUNO:
            $lista = 
                [
                   ["descricao" => "Fundadores", "url" => "sass.html"]
                ];
            break;
    }

    $log->debug(print_r($lista, true));
    return respostaListaJson($lista);
?>