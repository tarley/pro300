<?php
    require_once '../../Config.php';
    
    LOG::Debug("API: usuario/recuperarSenha");
   
    $email = $_GET['email'];
   
    LOG::Debug("Alterando a senha da conta $email");
    
    try {
        $usuario = Usuario::buscarPorEmail($email);
        
        if(empty($usuario))
            respostaJson("Conta de e-mail {$email} não cadastrado no sistema.", null, false);

        $novaSenha = gerarSenha(10, true, true, true, false);
        LOG::Debug("Nova senha $novaSenha");
        
        if(!Usuario::alterarSenha($email, $novaSenha))
            respostaJson('Falha na alteração de senha.', null, false);
        
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;
        $mail->isSMTP();
        
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = EMAIL_SMTPAUTH;
        $mail->Username = EMAIL_USERNAME;
        $mail->Password = EMAIL_PASSWORD;
        $mail->SMTPSecure = EMAIL_SMTPSECURE;
        $mail->Port = EMAIL_PORT;
    
        $mail->setFrom('sistema@pro300.com.br', 'Projeto 300');
        $mail->addReplyTo('sistema@pro300.com.br', 'Projeto 300');
        
        $mail->AddAddress($email);
        
        //$mail->AddAddress("tarley.lana@gmail.com", 'Tarley Lana');    
        $mail->addBCC('tarley.lana@gmail.com');
    
        $mail->isHTML(true);
        $mail->Subject = 'Nova senha - Mensagem gerada automaticamente';
        $mail->Body = 
        '
            <p>Caro usuário,</p>
            <p>
                Você está recebendo sua senha para acesso ao 
                <a href="http://www.pro300.com.br">Projeto 300</a>. 
            </p>
            <p>
                Já no primeiro acesso ao Sistema, solicitaremos a 
                substituição desta senha por outra de sua preferência.  
            </p>
            <p>
                Sua senha: <b>' . $novaSenha . '</b>
            </p>
            <p>        
                Obrigado!
            </p>       
            <br/>
            
            <font size="2">
                Este email não aceita respostas. Em caso de
                dúvida, entre em contato com a coordenação do curso.
            </font>
        ';

        if($mail->send()) {
            respostaJson('Nova senha enviada para o seu e-mail.', null, true);
        } else {
            respostaJson('Contato não pode ser enviado. Erro: ' . $mail->ErrorInfo, null, false);
        }
    } catch(Exception $e) {
        respostaErroJson($e);  
    }
?>
