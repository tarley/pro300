<?php
    require_once '../../Config.php';

    LOG::Debug("API: usuario/alterarProfessor");

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);
    
    LOG::Debug(print_r($request, true));
    
    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));
    
    try {
        $usuario = Usuario::buscarPorEmail($request['email']);
        
        if(empty($usuario))
            respostaJson("Usuário com e-mail {$request['email']} não encontrado.", null, false);
        
        $senhaAtual = sha1($request['senhaAtual']);
        $novaSenha = sha1($request['novaSenha']);
        
        LOG::Debug("Senha do banco: {$usuario['senha']} - Senha atual: {$senhaAtual} - Nova senha: {$novaSenha}");

        if($senhaAtual != $usuario['senha'])
            respostaJson('Senha inválida.', null, false);
        
        unset($usuario['senha']);
        setUsuario($usuario);
        
        if(Usuario::alterarProfessor($request['email'], $request['novaSenha'], $request['nome']))
            respostaJson('Conta alterada com sucesso', $usuario, true);
        else
            respostaJson('Falha na alteração da conta.', null, false);
    } catch(Exception $e) {
        respostaErroJson($e);  
    }
?>