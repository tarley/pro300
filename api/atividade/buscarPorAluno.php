<?php
    require_once '../../Config.php';

    Log::Debug("API: atividade/buscarPorAluno");

    acessoRestrito(array($ALUNO));

    try {
        $alunoId = getUsuarioId();
        $lista = Atividade::buscarPorAluno($alunoId);
        
        foreach($lista as $key => $value) {
            $id = $value['id'];
            $totalAvaliacoesPendentes = Avaliacao::getTotalAvaliacoesPendentes($alunoId, $id);
            Log::Debug("Atividade $id possui $totalAvaliacoesPendentes pendências.");
            
            $lista[$key]["totalAvaliacoesPendentes"] = $totalAvaliacoesPendentes;
        }
        
        respostaListaJson($lista);
    } catch(PDOException $e) {
        respostaErroJson($e);
    }
?>