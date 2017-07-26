<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    acessoRestrito(array($ALUNO));

    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        
        $stmt = $conn->prepare("
            SELECT a.id,
                   a.nome,
                   a.descricao,
                   DATE_FORMAT(a.dt_registro, '%d/%m/%Y') AS dt_registro,
                   DATE_FORMAT(a.dt_inicio, '%d/%m/%Y') AS dt_inicio,
                   DATE_FORMAT(a.dt_termino, '%d/%m/%Y') AS dt_termino,
                   a.curso_id,
                   c.nome AS curso
              FROM atividade a
            INNER JOIN curso c ON c.id = a.curso_id
             WHERE a.curso_id = :curso_id
               AND dt_encerramento IS NULL
               AND NOT EXISTS (SELECT 1 
                                 FROM inscricao i
                                WHERE i.atividade_id = a.id
                                  AND i.aluno_id = :aluno_id)");
               
        $stmt->bindParam(":curso_id", $_GET['curso_id']);
        $stmt->bindParam(":aluno_id", getUsuarioId());
        $stmt->execute();
        
        respostaListaJson($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch(PDOException $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>