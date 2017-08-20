<?php    
    class Menu {
        
        public function getMenuAluno() {
            return [
                ["descricao" => "Avaliação", "url" => "sass.html", "badge" => Avaliacao::getTotalAvaliacoesPendentes()]
            ];
        }
    }
    
?>