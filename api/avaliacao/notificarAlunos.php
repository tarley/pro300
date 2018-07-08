<?php
    require_once '../../Config.php';
    
    LOG::Debug("API: avaliacao/notificarAlunos");
    
    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));
    
    $atividadeId = $_GET['atividadeId'];
    
    try {
        $lista = Inscricao::buscarInscricoesComPendenciaDeAvaliacao($atividadeId);

        foreach($lista as $inscricao) {
            LOG::Debug("Inscrição Notificada:" . print_r($inscricao, true));
            
            $email = $inscricao['email'];
            $atividade = $inscricao['atividade'];
            
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
            $mail->Subject = 'Projeto 300 - Inicio da avaliação dos lideres - Mensagem gerada automaticamente';
            $mail->Body = 
            '
                <p>Caro usuário,</p>
                <p>
                    As avaliações dos lideres iniciaram. Acesse o 
                    <a href="http://www.pro300.com.br">Projeto 300</a> e 
                    resolva as pendencias da atividade {{$atividade}}. 
                </p>
                <p>
                    O não cumprimento leva a eliminação do projeto e a perda da nota.  
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
            
            if($mail->send())
                LOG::Debug('e-mail enviado com sucesso.', null, true);
            else
                LOG::Debug('Falha no envio do e-mail. Erro: ' . $mail->ErrorInfo, null, false);
        }
        
        respostaJson('Alunos notificados por e-mail das avaliações dos lideres pendentes.', null, true);
    } catch(Exception $e) {
        respostaErroJson($e);  
    }
?>