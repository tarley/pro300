<?php
    class Curso {
        
        public static function getAll() {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT id,
                       nome,
                       ativo
                  FROM curso 
                 WHERE ativo = :ativo");
                 
            $ativo = 1;
            $stmt->bindParam(":ativo", $ativo);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
