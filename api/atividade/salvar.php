<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';

    /*
    $log->Info("Hello Logentries");
    $log->Warn("I'm a warning message");
    $log->Info("Tarley teste");
    */

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);

    $log->debug(print_r($request, true));

    $codProfessor = 1;
    
    $dataInicio = DateTime::createFromFormat('d/m/Y', $request['dataInicio']);
    $errors = DateTime::getLastErrors();
    if (!empty($errors['error_count']))
            respostaJson('Data inicio não informada.', null, false); 
    
    $dataFim = DateTime::createFromFormat('d/m/Y', $request['dataFim']);
        $errors = DateTime::getLastErrors();
        if (!empty($errors['error_count']))
            respostaJson('Data fim não informada.', null, false);  

    try {
        $conn = new PDO("mysql:host=" . DB_SERVERNAME . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("
            INSERT INTO tb_atividade(
                nom_atividade, 
                desc_atividade, 
                data_inicio, 
                data_fim,
                cod_professor
            ) VALUES (
                :nom_atividade, 
                :desc_atividade, 
                :data_inicio, 
                :data_fim, 
                :cod_professor
            )");
               
        $stmt->bindParam(":nom_atividade", $request['nome']);
        $stmt->bindParam(":desc_atividade", $request['descricao']);
        $stmt->bindParam(":data_inicio", $dataInicio->format('Y-m-d'));
        $stmt->bindParam(":data_fim", $dataFim->format('Y-m-d'));
        $stmt->bindParam(":cod_professor", $codProfessor);
        $stmt->execute();
        
        respostaJson("Atividade cadastrada com sucesso");
    } catch(Exception $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>