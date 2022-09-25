<?php
    class Atividade {
        public static function buscarParaInscricao($cursoId, $alunoId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT a.id,
                       a.nome,
                       a.descricao,
                       DATE_FORMAT(a.dt_registro, '%d/%m/%Y %H:%i:%s') AS dt_registro,
                       DATE_FORMAT(a.dt_inicio, '%d/%m/%Y') AS dt_inicio,
                       DATE_FORMAT(a.dt_termino, '%d/%m/%Y') AS dt_termino,
                       DATE_FORMAT(a.dt_inicio_avaliacao, '%d/%m/%Y %H:%i:%s') AS dt_inicio_avaliacao,
                       a.curso_id,
                       c.nome AS curso,
                       p.nome as professor
                  FROM atividade a
                INNER JOIN curso c ON c.id = a.curso_id
                INNER JOIN usuario p ON p.id = a.professor_id
                 WHERE a.curso_id = :curso_id
                   AND a.dt_inicio_avaliacao IS NULL
                   AND a.dt_encerramento IS NULL
                   AND NOT EXISTS (SELECT 1 
                                     FROM inscricao i
                                    WHERE i.atividade_id = a.id
                                      AND i.aluno_id = :aluno_id)
                   AND NOT EXISTS (SELECT 1 
                                      FROM inscricao i
                                     WHERE i.atividade_id = a.id
                                       AND i.grupo IS NOT NULL)");
                   
            $stmt->bindParam(":curso_id", $cursoId);
            $stmt->bindParam(":aluno_id", $alunoId);
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function buscarPorId($id) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT a.id,
                       a.nome,
                       a.descricao,
                       DATE_FORMAT(a.dt_registro, '%d/%m/%Y %H:%i:%s') AS dt_registro,
                       DATE_FORMAT(a.dt_inicio, '%d/%m/%Y') AS dt_inicio,
                       DATE_FORMAT(a.dt_termino, '%d/%m/%Y') AS dt_termino,
                       DATE_FORMAT(a.dt_inicio_avaliacao, '%d/%m/%Y %H:%i:%s') AS dt_inicio_avaliacao,
                       a.curso_id,
                       c.nome as curso
                  FROM atividade a
                INNER JOIN curso c ON c.id = a.curso_id
                 WHERE a.id = :id");
                   
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function buscarPorProfessor($professorId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT a.id,
                       a.nome,
                       a.descricao,
                       DATE_FORMAT(a.dt_registro, '%d/%m/%Y %H:%i:%s') AS dt_registro,
                       DATE_FORMAT(a.dt_inicio, '%d/%m/%Y') AS dt_inicio,
                       DATE_FORMAT(a.dt_termino, '%d/%m/%Y') AS dt_termino,
                       DATE_FORMAT(a.dt_inicio_avaliacao, '%d/%m/%Y %H:%i:%s') AS dt_inicio_avaliacao,
                       a.curso_id,
                       c.nome AS curso
                  FROM atividade a
                INNER JOIN curso c ON c.id = a.curso_id
                 WHERE professor_id = :professor_id
                   AND dt_encerramento IS NULL ");
            
            
            $stmt->bindParam(":professor_id", $professorId);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
      public static function buscarPorAdmin() {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT a.id,
                       a.nome,
                       a.descricao,
                       DATE_FORMAT(a.dt_registro, '%d/%m/%Y %H:%i:%s') AS dt_registro,
                       DATE_FORMAT(a.dt_inicio, '%d/%m/%Y') AS dt_inicio,
                       DATE_FORMAT(a.dt_termino, '%d/%m/%Y') AS dt_termino,
                       DATE_FORMAT(a.dt_inicio_avaliacao, '%d/%m/%Y %H:%i:%s') AS dt_inicio_avaliacao,
                       a.curso_id,
                       c.nome AS curso,
                       u.nome AS professor
                  FROM atividade a
                INNER JOIN curso c ON c.id = a.curso_id
                INNER JOIN usuario u ON u.id = a.professor_id
                 WHERE dt_encerramento IS NULL ");

            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }        
        
        public static function buscarPorAluno($alunoId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT a.id,
                       a.nome,
                       a.descricao,
                       DATE_FORMAT(a.dt_registro, '%d/%m/%Y %H:%i:%s') AS dt_registro,
                       DATE_FORMAT(a.dt_inicio, '%d/%m/%Y') AS dt_inicio,
                       DATE_FORMAT(a.dt_termino, '%d/%m/%Y') AS dt_termino,
                       DATE_FORMAT(a.dt_inicio_avaliacao, '%d/%m/%Y %H:%i:%s') AS dt_inicio_avaliacao,
                       a.curso_id,
                       c.nome AS curso,
                       i.id AS inscricao_id,
                       i.nota1,
                       i.nota300,
                       i.grupo,
                       i.lider
                  FROM atividade a
                INNER JOIN inscricao i ON i.atividade_id = a.id
                INNER JOIN curso c ON c.id = a.curso_id
                 WHERE i.aluno_id = :aluno_id
                   AND a.dt_encerramento IS NULL ");

            $stmt->bindParam(":aluno_id", $alunoId);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function inserir($nome, $descricao, $dataInicio, $dataTermino, $cursoId) {
            $conn = DB::getConnection();
            
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
                
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":dt_inicio", $dataInicio);
            $stmt->bindParam(":dt_termino", $dataTermino);
            $stmt->bindParam(":curso_id", $cursoId);
            
            $dtRegistro = new DateTime();
            $dataRegistro = $dtRegistro->format('Y-m-d H:i:s'); 
            $stmt->bindParam(":dt_registro", $dataRegistro);
            
            $usuarioId = getUsuarioId();
            $stmt->bindParam(":professor_id", $usuarioId);
            
            $stmt->execute();
        }
        
        public static function alterar($id, $nome, $descricao, $dataInicio, $dataTermino, $cursoId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                UPDATE atividade
                   SET nome = :nome, 
                       descricao = :descricao,
                       dt_inicio =:dt_inicio,
                       dt_termino = :dt_termino,
                       curso_id = :curso_id
                 WHERE id = :id
                ");
                    
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":dt_inicio", $dataInicio);
            $stmt->bindParam(":dt_termino", $dataTermino);
            $stmt->bindParam(":curso_id", $cursoId);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }
        
        public static function excluir($id) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                UPDATE atividade
                   SET dt_encerramento = :dt_encerramento
                 WHERE id = :id
                ");
            
            $dtEncerramento = new DateTime();
            $dtEncerramento = $dtEncerramento->format('Y-m-d H:i:s'); 
            
            $stmt->bindParam(":dt_encerramento", $dtEncerramento);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }
        
        public static function registrarInicioAvaliacao($id, $conn) {
            
            if(empty($conn)) {
                $conn = DB::getConnection();
            }
            
            $stmt = $conn->prepare("
                UPDATE atividade
                   SET dt_inicio_avaliacao = :dt_inicio_avaliacao
                 WHERE id = :id
            ");

            $stmt->bindParam(":id", $id);
            
            $dtInicioAvaliacao = new DateTime();
            $dtInicioAvaliacao = $dtInicioAvaliacao->format('Y-m-d H:i:s'); 
            $stmt->bindParam(":dt_inicio_avaliacao", $dtInicioAvaliacao);
            
            $stmt->execute();
        }
    }
?>