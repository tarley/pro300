<?php
    require_once '../../Config.php';

    LOG::Debug("API: avaliacao/enviarAvaliacoes");

    acessoRestrito(array($ALUNO));
    
    $post_data = file_get_contents("php://input");
    $request = json_decode($post_data, true);
    
    LOG::Debug($request);
    
    try {
        foreach($request as $avaliacao) {
            Avaliacao::alterar($avaliacao['id'], $avaliacao['nota']);    
        }
        
        respostaJson("Todas as avaliações foram alteradas com sucesso!", null, true);
    } catch(Exception $e) {
        LOG::Error($e);
        respostaErroJson($e);
    }
?>