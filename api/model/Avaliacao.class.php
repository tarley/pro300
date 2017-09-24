<?php
    class Avaliacao {
        public static function getTotalAvaliacoesPendentes($alunoId, $atividadeId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare(" 
                SELECT count(1) AS total
                  FROM avaliacao a
                 INNER JOIN inscricao i on i.id = a.avaliador_id
                 WHERE i.aluno_id = :aluno_id
                   AND i.atividade_id = :atividade_id
                   AND a.nota IS NULL
            ");

            $stmt->bindParam(":aluno_id", $alunoId);
            $stmt->bindParam(":atividade_id", $atividadeId);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        }
        
        public static function getAvaliacoesPendentes($alunoId, $atividadeId) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare(" 
                SELECT a.id,
                       a.nota,
                       u.ra,
                       u.nome AS aluno
                  FROM avaliacao a
                 INNER JOIN inscricao i1 ON i1.id = a.avaliador_id
                 INNER JOIN inscricao i2 ON i2.id = a.avaliado_id
                 INNER JOIN usuario u ON u.id = i2.aluno_id
                 WHERE i1.aluno_id = :aluno_id
                   AND i1.atividade_id = :atividade_id
                   AND a.nota IS NULL
            ");
            
            $stmt->bindParam(":aluno_id", $alunoId);
            $stmt->bindParam(":atividade_id", $atividadeId);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function getNotasAvaliado($idInscricaoAlunoAvaliado) {
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare(" 
                SELECT a.id,
                       a.nota
                  FROM avaliacao a
                 WHERE a.avaliado_id = :avaliado_id
            ");
            
            $stmt->bindParam(":avaliado_id", $idInscricaoAlunoAvaliado);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    
                    /* Ignorar caso seja um Lider, pois lider não avalia ajudado */
                    if($avaliador['lider'] == '1')
                        continue;
                    
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
        
        public static function alterar($id, $nota) {
            LOG::Debug("Alterando avaliação [$id] com a nota [$nota]");
            
            $conn = DB::getConnection();
            
            $stmt = $conn->prepare("
                UPDATE avaliacao
                   SET nota = :nota
                 WHERE id = :id
            ");
            
            $stmt->bindParam(":nota", $nota);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }
    }
?>