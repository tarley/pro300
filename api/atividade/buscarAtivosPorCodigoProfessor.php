<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        
        $stmt = $conn->prepare("
            SELECT a.id,
                   a.nome,
                   a.descricao,
                   DATE_FORMAT(a.dt_registro, '%d/%m/%Y') as dt_registro,
                   DATE_FORMAT(a.dt_inicio, '%d/%m/%Y') as dt_inicio,
                   DATE_FORMAT(a.dt_termino, '%d/%m/%Y') as dt_termino,
                   a.curso_id,
                   c.nome as curso
              FROM atividade a
            INNER JOIN curso c on c.id = a.curso_id
             WHERE professor_id = :professor_id
               AND dt_encerramento IS NULL ");
               
        $stmt->bindParam(":professor_id", getUsuarioId());
        $stmt->execute();
        
        respostaListaJson($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch(PDOException $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>