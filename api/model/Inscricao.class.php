<?php
    class Inscricao {
        
        public static function buscarPorId($id) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT i.id,
                       i.nota1,
                       i.nota300,
                       i.nota_final,
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
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function buscarPorAtividade($atividadeId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT i.id,
                       i.nota1,
                       i.nota300,
                       i.nota_final,
                       i.grupo,
                       i.lider,
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
    }
?>