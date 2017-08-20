<?php
    class Avaliacao {
        public static function getTotalAvaliacoesPendentes() {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare(" 
                SELECT count(1) AS total
                  FROM avaliacao a
                 INNER JOIN inscricao i on i.id = a.avaliador_id
                 WHERE i.aluno_id = :aluno_id
                   AND a.nota IS NULL
            ");
            
            $usuario_id = getUsuarioId();
            $stmt->bindParam(":aluno_id", $usuario_id);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        }
        
        public static function criar($atividadeId) {
            try {
                LOG::Debug("Gerando avaliação para a atividade $atividadeId");
                
                $conn = DB::getConnection();
                
                $stmt = $conn->prepare("
                    INSERT INTO avaliacao(
                        avaliador_id, 
                        avaliado_id
                    ) VALUES (
                        :avaliador_id, 
                        :avaliado_id
                    ) 
                ");
                
                $lista = Inscricao::buscarPorAtividade($atividadeId);
                
                LOG::Debug("Inscrições:" . print_r($lista, true));
                
                $conn->beginTransaction();
                
                foreach($lista as $avaliador) {
                    LOG::Debug("Avaliador:" . print_r($avaliador, true));
                    
                    foreach($lista as $avaliado) {    
                    
                        /* Ignorar caso seja a mesma inscrição */
                        if($avaliador['id'] == $avaliado['id']) // mesma inscrição
                            continue;
                        
                        /* Ignorar caso seja inscrições de grupos diferentes */
                        if($avaliador['grupo'] != $avaliado['grupo']) // Grupos diferentes
                            continue;
                        
                        /* Ignorar caso seja uma avaliação de lider para lider ou ajudado para ajudado */
                        if($avaliador['lider'] == $avaliado['lider'])
                            continue;
                        
                        LOG::Debug("Inserindo avaliação para:" . print_r($avaliado, true));
                        
                        $stmt->bindParam(":avaliador_id", $avaliador['id']);
                        $stmt->bindParam(":avaliado_id", $avaliado['id']);
                        $stmt->execute();
                    }
                }
                
                Atividade::registrarInicioAvaliacao($atividadeId, $conn);
                
                $conn->commit();
            } catch(Exception $e) {
                $conn->rollBack();
                throw $e;
            }
        }
    }
?>