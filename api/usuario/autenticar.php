<?php
    require_once '../../Config.php';

    $log->Debug("API: usuario/autenticar");

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);

    $log->Debug(print_r($request, true));

    try {
        $conn = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        
        $stmt = $conn->prepare("
            SELECT  u.id, 
                    u.email, 
                    u.senha, 
                    u.ra, 
                    u.nome,
                    u.perfil_id,
                    p.perfil
             FROM  usuario u
            INNER JOIN perfil p ON p.id = u.perfil_id
            WHERE email = :email ");
               
        $stmt->bindParam(':email', $request['email']);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(empty($usuario))
            respostaJson("Usuário com e-mail {$request['email']} não encontrado.", null, false);
            
        $senha = sha1($request['senha']);
        
        $log->Debug("Senha do banco: {$usuario['senha']}");
        $log->Debug("Senha informada: {$senha}");
            
        if($senha != $usuario['senha'])
            respostaJson('Senha inválida.', null, false);
        
        unset($usuario['senha']);
        
        setUsuario($usuario);
        
        respostaJson('Autenticação realizada com sucesso.', $usuario, true, $log);
    } catch(PDOException $e) {
        $log->Error($e->getMessage());
        respostaErroJson($e);
    }
?>