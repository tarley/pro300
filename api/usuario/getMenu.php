<?php
    require_once '../log/logentries.php';
    require_once '../util/Config.php';
    require_once '../util/JsonUtil.php';
    require_once '../util/SegurancaUtil.php';

    $log->Debug("API: usuario/getMenu");

    acessoRestrito();
    
    $menu = new Menu($DB_HOST, $DB_NAME, $DB_USERNAME, $DB_PASSWORD, $log);
    
    switch(getPerfilId()) {
        case $ADMINISTRADOR:
            $lista = [];
            break;
        case $COORDENADOR:
            $lista = [];
            break;
        case $PROFESSOR:
            $lista = [];
            break;
        case $ALUNO:
            $lista = $menu->getMenuAluno();
            break;
    }

    $log->debug(print_r($lista, true));
    return respostaListaJson($lista);
    
    
    
    class Menu {
        
        private $DB_HOST, $DB_NAME, $DB_USERNAME, $DB_PASSWORD, $log;
        
        public function __construct($DB_HOST, $DB_NAME, $DB_USERNAME, $DB_PASSWORD, $log) {
            $this->DB_HOST = $DB_HOST;
            $this->DB_NAME = $DB_NAME;
            $this->DB_USERNAME = $DB_USERNAME;
            $this->DB_PASSWORD = $DB_PASSWORD;
            $this->log = $log;
        }
        
        public function getMenuAluno() {
            return [
                ["descricao" => "Avaliação", "url" => "sass.html", "badge" => $this->getTotalAvaliacoesPendentes()]
            ];
        }
    
        private function getTotalAvaliacoesPendentes() {
            try {
                $this->log->Debug("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME, $this->DB_USERNAME, $this->DB_PASSWORD");
                $conn = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USERNAME, $this->DB_PASSWORD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->exec("set names utf8");
                
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
            } catch(Exception $e) {
                $this->log->Error($e);
                respostaErroJson($e);
            }
        }
    }
?>