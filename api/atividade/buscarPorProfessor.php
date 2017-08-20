<?php
    require_once '../../Config.php';

    LOG::Debug("API: atividade/buscarPorProfessor");

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    try {
        $professorId = getUsuarioId();
        $lista = Atividade::buscarPorProfessor($professorId);
        
        respostaListaJson($lista);
    } catch(PDOException $e) {
        LOG::Error($e);
        respostaErroJson($e);
    }
?>