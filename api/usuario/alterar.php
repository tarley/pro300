<?php
    require_once '../../Config.php';

    LOG::Debug("API: usuario/alterar");

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);
    
    LOG::Debug(print_r($request, true));
    
    try {
        $usuario = Usuario::buscarPorEmail($request['email']);
        
        if(empty($usuario))
            respostaJson("Usuário com e-mail {$request['email']} não encontrado.", null, false);
            
        $senha = sha1($request['senhaAtual']);
        
        $log->Debug("Senha do banco: {$usuario['senha']}");
        $log->Debug("Senha informada: {$senha}");
            
        if($senha != $usuario['senha'])
            respostaJson('Senha inválida.', null, false);
        
        $request['senhaAtual']
        
        if(Usuario.alterar($request['email'], $request['telefone'],
            $request['novaSenha'], $request['ra'], 
            $request['nome']))
            respostaJson('Conta alterada com sucesso', null, true);
        else
            respostaJson('Falha na alteracao da conta.', null, false);
    } catch(PDOException $e) {
        if($e->getCode() == '23000')
            respostaJson('Conta já existente no sistema', null, false);
        else
            respostaErroJson($e);
    } catch(Exception $e) {
        respostaErroJson($e);  
    }
?>