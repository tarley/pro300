<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    $log->debug("API: inscricao/buscarPorAtividade");

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR), $log);

    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        
        $stmt = $conn->prepare("
            SELECT i.id,
                   u.ra,
                   u.nome AS aluno
              FROM inscricao i
            INNER JOIN usuario u ON u.id = i.aluno_id
            INNER JOIN atividade a ON a.id = i.atividade_id
            WHERE i.atividade_id = :atividade_id
              AND a.professor_id = :professor_id ");
               
        $stmt->bindParam(":atividade_id", $_GET["atividade_id"]);
        $stmt->bindParam(":professor_id", getUsuarioId());
        $stmt->execute();
        
        respostaListaJson($stmt->fetchAll(PDO::FETCH_ASSOC), $log);
    } catch(PDOException $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>