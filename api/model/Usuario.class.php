<?php
    class Usuario {
        
        public static function buscarPorEmail($email) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                SELECT  u.id, 
                    u.email, 
                    u.senha, 
                    u.ra, 
                    u.nome,
                    u.perfil_id,
                    p.perfil
             FROM  usuario u
            INNER JOIN perfil p ON p.id = u.perfil_id
            WHERE email LIKE :email");
                   
            $stmt->bindParam(":email", $email);
            
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function alterarSenha($email, $novaSenha) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                UPDATE usuario
                   SET senha = :senha
                 WHERE email = :email
                ");
            
            $senhaCripto = sha1($novaSenha);
            $stmt->bindParam(":senha", $senhaCripto);
            $stmt->bindParam(":email", $email);
            
            return $stmt->execute();
        }
    }
?>