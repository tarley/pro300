<?php
    require_once '../../Config.php';

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);
    $log->debug(print_r($request, true));
    
    try {
        $conn = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        
        $stmt = $conn->prepare("
            INSERT INTO usuario(email, senha, ra, nome, perfil_id) 
              VALUES (:email, :senha, :ra, :nome, :perfil_id)
        ");
        $stmt->bindParam(':email', $request['email']);
        
        $senha = sha1($request['senha']);
        $stmt->bindParam(':senha', $senha);
        
        $stmt->bindParam(':ra', $request['ra']);
        $stmt->bindParam(':nome', $request['nome']);
        $stmt->bindParam(':perfil_id', $ALUNO);
        
        if($stmt->execute()) {
            $log->debug('Conta criada com sucesso.');
            respostaJson('Conta de aluno criada com sucesso', null, true);
        } else {
            $log->debug('Falha na criação da conta');
            respostaJson('Falha na criação da conta.', null, false);
        }
    } catch(PDOException $e) {
        if($e->getCode() == '23000') {
            $log->debug('Conta já cadastrada no sistema.');
            respostaJson('Conta já cadastrada no sistema', null, false);
        } else {
            $log->debug($e->getMessage());
            respostaErroJson($e);
        }
    } catch(Exception $e) {
        $log->debug($e->getMessage());
        respostaErroJson($e);  
    }
?>