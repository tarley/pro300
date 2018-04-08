<?php
    require_once '../../Config.php';

    LOG::Debug("API: atividade/excluir");
    
    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    try {
        $id = $_GET['atividade_id'];
        Atividade::excluir($id);
        respostaJson("Atividade excluida com sucesso");
        
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>