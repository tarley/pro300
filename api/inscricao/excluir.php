<?php
    require_once '../../Config.php';

    LOG::Debug("API: inscricao/excluir");

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));
    
    $deletedata = file_get_contents('php://input');
    $request = json_decode($deletedata, true);

    LOG::Debug(print_r($request, true));
    
    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

        $stmt = $conn->prepare("DELETE FROM inscricao WHERE id = :id");
                
        $stmt->bindParam(":id", $request["id"]);
        $stmt->execute();
    
        respostaJson("Inscrição removida com sucesso");
    } catch(Exception $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>