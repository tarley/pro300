<?php
    require_once '../../Config.php';

    LOG::Debug("API: usuario/alterarAluno");

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);
    
    LOG::Debug(print_r($request, true));
    
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
        
        if(Usuario::alterarAluno($request['email'], $request['telefone'],
            $request['novaSenha'], $request['ra'], $request['nome']))
            respostaJson('Conta alterada com sucesso', $usuario, true);
        else
            respostaJson('Falha na alteração da conta.', null, false);
    } catch(Exception $e) {
        respostaErroJson($e);  
    }
?>