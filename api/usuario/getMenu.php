<?php
    require_once '../../Config.php';
    
    Log::Debug("API: usuario/getMenu");

    acessoRestrito();
    
    $menu = new Menu($DB_HOST, $DB_NAME, $DB_USERNAME, $DB_PASSWORD, $log);
    
    switch(getPerfilId()) {
        case $ADMINISTRADOR:
            $lista = [
                ["descricao" => "Alterar meus dados", "url" => "#!/cadastrarAluno"]        
            ];
            break;
        case $COORDENADOR:
            $lista = [
                ["descricao" => "Alterar meus dados", "url" => "#!/cadastrarAluno"]        
            ];
            break;
        case $PROFESSOR:
            $lista = [
                ["descricao" => "Alterar meus dados", "url" => "#!/cadastrarAluno"]        
            ];
            break;
        case $ALUNO:
            $lista = [
                ["descricao" => "Alterar meus dados", "url" => "#!/cadastrarAluno"]        
            ]; // $menu->getMenuAluno();
            break;
    }

    return respostaListaJson($lista);
?>