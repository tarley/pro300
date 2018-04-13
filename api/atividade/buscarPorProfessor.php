<?php
    require_once '../../Config.php';

    LOG::Debug("API: atividade/buscarPorProfessor");

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    try {
        
        $Id = getUsuarioId();
        
        if($Id == $ADMINISTRADOR)
            $lista = Atividade::buscarPorAdmin($Id);
        else 
            $lista = Atividade::buscarPorProfessor($Id);
        
        respostaListaJson($lista);
    } catch(PDOException $e) {
        respostaErroJson($e);
    }
?>