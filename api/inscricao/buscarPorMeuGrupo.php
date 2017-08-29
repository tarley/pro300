<?php
    require_once '../../Config.php';

    Log::Debug("API: inscricao/buscarPorMeuGrupo");

    acessoRestrito(array($ALUNO));

    try {
        $aluno_id = getUsuarioId();
        $aluno = Inscricao::buscarPorAlunoAtividade($aluno_id, $_GET['atividade_id']);
        Log::Debug("Aluno solicitante: " . print_r($aluno, true));
        $lista = Inscricao::buscarInscricoesMeuGrupo($_GET['atividade_id'], $aluno['grupo'], $aluno_id);
        
        respostaListaJson($lista);
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>