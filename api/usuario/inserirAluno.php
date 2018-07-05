<?php
    require_once '../../Config.php';

    LOG::Debug("API: usuario/inserirAluno");

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);
    
    LOG::Debug(print_r($request, true));
    
    try {
        if(Usuario::inserir($request['email'], $request['telefone'],
            $request['novaSenha'], $request['ra'], $request['nome'],
            $ALUNO))
            respostaJson('Conta de aluno criada com sucesso', null, true);
        else
            respostaJson('Falha na criação da conta.', null, false);
    } catch(PDOException $e) {
        if($e->getCode() == '23000')
            respostaJson('Conta já cadastrada no sistema', null, false);
        else
            respostaErroJson($e);
    } catch(Exception $e) {
        respostaErroJson($e);  
    }
?>