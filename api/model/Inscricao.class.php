<?php
    class Inscricao {
        
        public static function buscarPorId($id) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT i.id,
                       i.nota1,
                       i.nota300,
                       i.grupo,
                       i.lider,
                       u.ra,
                       u.nome AS aluno
                  FROM inscricao i
                INNER JOIN usuario u ON u.id = i.aluno_id
                INNER JOIN atividade a ON a.id = i.atividade_id
                WHERE i.id = :id ");
                   
            $stmt->bindParam(":id", $id);
            
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function buscarPorAlunoAtividade($alunoId, $atividadeId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT i.id,
                       i.nota1,
                       i.nota300,
                       i.grupo,
                       i.lider,
                       u.ra,
                       u.nome AS aluno
                  FROM inscricao i
                INNER JOIN usuario u ON u.id = i.aluno_id
                WHERE i.aluno_id = :aluno_id
                  AND i.atividade_id = :atividade_id");
                   
            $stmt->bindParam(":aluno_id", $alunoId);
            $stmt->bindParam(":atividade_id", $atividadeId);
            
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function buscarPorAtividade($atividadeId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT i.id,
                       i.nota1,
                       i.nota300,
                       i.grupo,
                       i.lider,
                       i.aluno_id,
                       i.atividade_id,
                       u.ra,
                       u.nome AS aluno
                  FROM inscricao i
                INNER JOIN usuario u ON u.id = i.aluno_id
                INNER JOIN atividade a ON a.id = i.atividade_id
                WHERE i.atividade_id = :atividade_id ");
                   
            $stmt->bindParam(":atividade_id", $atividadeId);
            
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function buscarInscricoesMeuGrupo($atividadeId, $grupo, $alunoId) {
            $conn = DB::getConnection();
            $stmt = $conn->prepare("
                SELECT u.id,
                       u.ra,
                       u.email,
                       u.nome,
                       i.lider
                  FROM inscricao i
            INNER JOIN usuario u ON u.id = i.aluno_id
                 WHERE i.atividade_id = :atividade_id
                   AND i.grupo = :grupo
                   AND i.aluno_id <> :aluno_id
            ");
            
            $stmt->bindParam(":atividade_id", $atividadeId);
            $stmt->bindParam(":grupo", $grupo);
            $stmt->bindParam(":aluno_id", $alunoId);
            
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }   
    }
?>