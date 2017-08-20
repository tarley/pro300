<?php
    require_once '../../Config.php';

    LOG::Debug("API: atividade/inserirOuAlterar");
    
    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);

    LOG::Debug(print_r($request, true));
    
    try {
        $dtInicio = DateTime::createFromFormat('d/m/Y', $request['dt_inicio']);
        $dataInicio = $dtInicio->format('Y-m-d');
        
        $dtTermino = DateTime::createFromFormat('d/m/Y', $request['dt_termino']);
        $dataTermino = $dtTermino->format('Y-m-d');
        
        if(empty($request['id'])) {
            Atividade::inserir($request['nome'], $request['descricao'], 
                $dataInicio, $dataTermino, $request['curso_id']);
        
            respostaJson("Atividade cadastrada com sucesso");
        } else {
            Atividade::alterar($request['id'], $request['nome'], $request['descricao'], 
                $dataInicio, $dataTermino, $request['curso_id']);
                
            respostaJson("Atividade alterada com sucesso");
        }
    } catch(Exception $e) {
        LOG::Error($e);
        respostaErroJson($e);
    }
?>