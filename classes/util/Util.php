<?php
/**
 * Created by PhpStorm.
 * User: tarle
 * Date: 09/10/2016
 * Time: 22:40
 */
date_default_timezone_set ( 'America/Sao_Paulo' );

define('CONTEXT_NAME', '/pro300/');
//define('CONTEXT_NAME', '/');
define('LOG_DIR', $_SERVER['DOCUMENT_ROOT'] . CONTEXT_NAME . 'log/');

define('SERVERNAME', "localhost");
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'pro300');


function logger($msg)
{
    $data = date("Y_m_d");
    $hora = date("H:i:s T");
    $ip = $_SERVER ['REMOTE_ADDR'];

    // Nome do arquivo:
    $arquivo = LOG_DIR . "Logger-$data.log";

    // Texto a ser impresso no log:
    $texto = "[$hora] \t [$ip] \t $msg \n";

    $manipular = fopen("$arquivo", "ab");
    fwrite($manipular, $texto);
    fclose($manipular);
}

function prepararJson($dado, $erro = false, $msg = "") {
    $result = array("dado" => $dado, "erro" => $erro, "msg" => $msg);
    respostaJson($result);
}

function respostaJson($dados) {
    header("Content-type: application/json");

    echo json_encode($dados);
    exit;
}

function respostaJsonSucesso($msg) {
    respostaJson(array("erro"=> false, "msg"=> $msg));
}

function respostaJsonErro($msg) {
    respostaJson(array("erro"=> true, "msg"=> $msg));
}

function respostaJsonExcecao($e) {
    logger($e->getMessage());
    respostaJson(array("erro"=> true, "msg"=> $e->getMessage()));
}

class BDConnection
{
    protected $conn;

    function __construct() {


        try {
            $opcoes = array (
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_PERSISTENT => TRUE
            );

            $c = new PDO("mysql:host=". SERVERNAME .";dbname=". DBNAME .";charset=utf8;", USERNAME, PASSWORD, $opcoes);
            $c->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->conn = $c;
        } catch ( PDOException $e ) {
            $conn = NULL;
            logger($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn = null;
    }
}

?>