<?php
    require_once '../../Config.php';

    Log::Debug("API: inscricao/buscarPorAtividade");
    
    //acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    try {
        $lista = Inscricao::buscarPorAtividade($_GET["atividade_id"]);
        
        foreach($lista as $key => $value) {
            $incricaoId = $value['id'];
            $alunoId = $value['aluno_id'];
            $atividadeId = $value['atividade_id'];
            
            
            $lista[$key]['totalAvaliacoesPendentes'] = 
                Avaliacao::getTotalAvaliacoesPendentes($alunoId, $atividadeId);
            $lista[$key]['notasAvaliado'] =
                Avaliacao::getNotasAvaliado($incricaoId);
                
            if($value['lider'] == 1) {
                $media = Avaliacao::getMediaLider($incricaoId);
                
                $lista[$key]['mediaLider'] = $media;
                $lista[$key]['acrescimoLider'] = Avaliacao::getAcrescimoLider($media);
            } else {
                $lista[$key]['mediaLider'] = 0.0;
                $lista[$key]['acrescimoLider'] = 0.0;
            }
        }
        
        respostaListaJson($lista);
    } catch(Exception $e) {
        respostaErroJson($e);
    }
?>