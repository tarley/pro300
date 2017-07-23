<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    acessoRestrito();

    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        
        $stmt = $conn->prepare("
            SELECT id,
                   nome,
                   ativo
              FROM curso 
             WHERE ativo = :ativo");
             
        $ativo = 1;
        $stmt->bindParam(":ativo", $ativo);
        $stmt->execute();

        respostaListaJson($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch(Exception $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>