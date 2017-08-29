<?php
    require_once '../../Config.php';

    Log::Debug("API: atividade/buscarPorAluno");

    acessoRestrito(array($ALUNO));

    try {
        $lista = Atividade::buscarPorAluno(getUsuarioId());
        respostaListaJson($lista);
    } catch(PDOException $e) {
        respostaErroJson($e);
    }
?>