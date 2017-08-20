<?php
    require_once '../../Config.php';

    Log::Debug("API: atividade/buscarParaInscricao");
    acessoRestrito(array($ALUNO));

    try {
        $lista = Atividade::buscarParaInscricao($_GET['curso_id'], getUsuarioId());
        respostaListaJson($stmt->fetchAll(PDO::FETCH_ASSOC), $log);
    } catch(PDOException $e) {
        Log::Error($e);
        respostaErroJson($e);
    }
?>