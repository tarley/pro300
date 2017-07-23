<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR));

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);

    $log->debug(print_r($request, true));
    
    $dtRegistro = new DateTime();
    
    $dtInicio = DateTime::createFromFormat('d/m/Y', $request['dt_inicio']);
    /*
    $errors = DateTime::getLastErrors();
    if (!empty($errors['error_count']))
        respostaJson('Data de inicio não informada.', null, false); 
    */
    
    $dtTermino = DateTime::createFromFormat('d/m/Y', $request['dt_termino']);
    /*
    $errors = DateTime::getLastErrors();
    if (!empty($errors['error_count']))
        respostaJson('Data de termino não informada.', null, false);  
    */
    
    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

        if(empty($request['id'])) {
            $stmt = $conn->prepare("
                INSERT INTO atividade(
                    nome, 
                    descricao,
                    dt_registro,
                    dt_inicio, 
                    dt_termino,
                    professor_id,
                    curso_id
                ) VALUES (
                    :nome, 
                    :descricao,
                    :dt_registro,
                    :dt_inicio, 
                    :dt_termino,
                    :professor_id,
                    :curso_id
                )");
                
            $stmt->bindParam(":nome", $request['nome']);
            $stmt->bindParam(":descricao", $request['descricao']);
            $stmt->bindParam(":dt_registro", $dtRegistro->format('Y-m-d'));
            $stmt->bindParam(":dt_inicio", $dtInicio->format('Y-m-d'));
            $stmt->bindParam(":dt_termino", $dtTermino->format('Y-m-d'));
            $stmt->bindParam(":professor_id", getUsuarioId());
            $stmt->bindParam(":curso_id", $request['curso_id']);
            $stmt->execute();
        
            respostaJson("Atividade cadastrada com sucesso");
        } else {
            $stmt = $conn->prepare("
                UPDATE atividade
                   SET nome = :nome, 
                       descricao = :descricao,
                       dt_inicio =:dt_inicio,
                       dt_termino = :dt_termino,
                       curso_id = :curso_id
                 WHERE id = :id
                ");
                
            $stmt->bindParam(":nome", $request['nome']);
            $stmt->bindParam(":descricao", $request['descricao']);
            $stmt->bindParam(":dt_inicio", $dtInicio->format('Y-m-d'));
            $stmt->bindParam(":dt_termino", $dtTermino->format('Y-m-d'));
            $stmt->bindParam(":curso_id", $request['curso_id']);
            $stmt->bindParam(":id", $request['id']);
            $stmt->execute();
        
            respostaJson("Atividade alterada com sucesso");
        }
    } catch(Exception $e) {
        $log->Error($e);
        respostaErroJson($e);
    }
?>