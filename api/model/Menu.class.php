<?php    
    class Menu {
        
        public function getMenuAluno() {
            $alunoId = getUsuarioId();
            return [
                ["descricao" => "Avaliação", "url" => "sass.html", "badge" => Avaliacao::getTotalAvaliacoesPendentes($alunoId)]
            ];
        }
    }
    
?>