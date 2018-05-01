<?php
    require_once '../../Config.php';

    $log->Debug("API: usuario/autenticar");

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);

    $log->Debug(print_r($request, true));

    try {
        $usuario = Usuario::buscarPorEmail($request['email']);
        
        if(empty($usuario))
            respostaJson("Usuário com e-mail {$request['email']} não encontrado.", null, false);
            
        $senha = sha1($request['senha']);
        
        $log->Debug("Senha do banco: {$usuario['senha']}");
        $log->Debug("Senha informada: {$senha}");
            
        if($senha != $usuario['senha'])
            respostaJson('Senha inválida.', null, false);
        
        unset($usuario['senha']);
        
        setUsuario($usuario);
        
        respostaJson('Autenticação realizada com sucesso.', $usuario, true);
    } catch(PDOException $e) {
        respostaErroJson($e);  
    }
?>