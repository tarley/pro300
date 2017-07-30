<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    acessoRestrito(array($ALUNO));
    
    $log->debug(print_r($request, true));
    
    $dtInscricao = new DateTime();
    
    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

        $stmt = $conn->prepare("
                INSERT INTO inscricao(
                    dt_inscricao,
                    aluno_id,
                    atividade_id
                ) VALUES (
                    :dt_inscricao,
                    :aluno_id,
                    :atividade_id
                )");
                
        $stmt->bindParam(":dt_inscricao", $dtInscricao->format('Y-m-d'));
        $stmt->bindParam(":aluno_id", getUsuarioId());
        $stmt->bindParam(":atividade_id", $_GET['ativiadeId']);
        $stmt->execute();
    
        respostaJson("Atividade cadastrada com sucesso");
    } catch(Exception $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>