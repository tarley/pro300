<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';

    if(empty($_GET['codProfessor']))
        respostaJson('Parametro $_GET[\'codProfessor\'] não informado', null, false);

    try {
        $conn = new PDO("mysql:host=" . DB_SERVERNAME . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("
            SELECT cod_atividade,
                   nom_atividade,
                   desc_atividade,
                   data_inicio,
                   data_fim
              FROM tb_atividade 
             WHERE cod_professor = :codProfessor
               AND data_encerramento_atv IS NULL ");
               
        $stmt->bindParam(":codProfessor", $_GET['codProfessor']);
        $stmt->execute();
        
        respostaListaJson($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch(PDOException $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>