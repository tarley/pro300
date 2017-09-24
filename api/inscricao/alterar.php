<?php
    require_once '../../Config.php';

    $log->Debug("API: inscricao/alterar");

    acessoRestrito(array($ADMINISTRADOR, $COORDENADOR, $PROFESSOR), $log);

    $postdata = file_get_contents('php://input');
    $request = json_decode($postdata, true);

    $log->Debug(print_r($request, true));
    
    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        $conn->beginTransaction();
        
        foreach($request as $inscricao) {
            $stmt = $conn->prepare("
                    UPDATE inscricao
                       SET grupo = :grupo,
                           lider = :lider,
                           nota1 = :nota1,
                           nota300 =:nota300
                     WHERE id = :id
                    ");
            
            $grupo = null;
            
            if(!empty($inscricao['grupo']))                    
                $grupo = strtoupper($inscricao['grupo']);

            $stmt->bindParam(":grupo", $grupo);
            $stmt->bindParam(":lider", $inscricao['lider']);
            $stmt->bindParam(":nota1", $inscricao['nota1']);
            $stmt->bindParam(":nota300", $inscricao['nota300']);
            $stmt->bindParam(":id", $inscricao['id']);
            $stmt->execute();
        }
        
        $conn->commit();
        
        respostaJson("Inscrições alteradas com sucesso", null, true, $log);
    } catch(Exception $e) {
        $conn->rollBack();
        $log->Error($e);
        
        respostaErroJson($e, $log);
    }
?>