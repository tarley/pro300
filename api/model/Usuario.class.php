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
                    u.telefone,
                    u.perfil_id,
                    p.perfil
             FROM  usuario u
            INNER JOIN perfil p ON p.id = u.perfil_id
            WHERE email LIKE :email");
                   
            $stmt->bindParam(":email", $email);
            
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function alterarAluno( $email, $telefone, $novaSenha, $ra, $nome) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                UPDATE usuario
                   SET ra = :ra,
                       nome = :nome,
                       telefone = :telefone,
                       senha = :senha
                 WHERE email = :email
                ");
                
            $stmt->bindParam(":ra", $ra);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $senhaCripto = sha1($novaSenha);
            $stmt->bindParam(":senha", $senhaCripto);
            $stmt->bindParam(":email", $email);
            
            return $stmt->execute();
        }
        
        public static function alterarProfessor($email, $novaSenha, $nome) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                UPDATE usuario
                   SET nome = :nome,
                       senha = :senha
                 WHERE email = :email
                ");
                
            $stmt->bindParam(":nome", $nome);
            $senhaCripto = sha1($novaSenha);
            $stmt->bindParam(":senha", $senhaCripto);
            $stmt->bindParam(":email", $email);
            
            return $stmt->execute();
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
        
        public static function inserir($email, $telefone, $senha, $ra, $nome, $perfilId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                INSERT INTO usuario(email, telefone, senha, ra, nome, perfil_id) 
                  VALUES (:email, :telefone, :senha, :ra, :nome, :perfil_id)
            ");
            
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            
            $senhaCripto = sha1($senha);
            $stmt->bindParam(':senha', $senhaCripto);
            $stmt->bindParam(':ra', $ra);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':perfil_id', $perfilId);
            
            return $stmt->execute();
        }
    }
?>