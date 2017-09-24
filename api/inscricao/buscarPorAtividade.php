<?php
    require_once '../../Config.php';

    $log->debug("API: inscricao/buscarPorAtividade");
    
    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    try {
        $lista = Inscricao::buscarPorAtividade($_GET["atividade_id"]);
        
        foreach($lista as $key => $value) {
            $alunoId = $value['aluno_id'];
            $atividadeId = $value['atividade_id'];
            
            $lista[$key]['totalAvaliacoesPendentes'] = 
                Avaliacao::getTotalAvaliacoesPendentes($alunoId, $atividadeId);
            $lista[$key]['notasAvaliado'] =
                Avaliacao::getNotasAvaliado($value['id']);
        }
        
        respostaListaJson($lista);
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>