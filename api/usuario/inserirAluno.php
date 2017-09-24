<?php
    require_once '../../Config.php';

    $log->Debug("API: usuario/inserirAluno");

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);
    
    $log->Debug(print_r($request, true));
    
    try {
        $conn = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        
        $stmt = $conn->prepare("
            INSERT INTO usuario(email, telefone, senha, ra, nome, perfil_id) 
              VALUES (:email, :telefone, :senha, :ra, :nome, :perfil_id)
        ");
        $stmt->bindParam(':email', $request['email']);
        $stmt->bindParam(':telefone', $request['telefone']);
        
        $senha = sha1($request['senha']);
        $stmt->bindParam(':senha', $senha);
        
        $stmt->bindParam(':ra', $request['ra']);
        $stmt->bindParam(':nome', $request['nome']);
        $stmt->bindParam(':perfil_id', $ALUNO);
        
        if($stmt->execute())
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