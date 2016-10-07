<?php

define ( 'HOST', '127.0.0.1' );
define ( 'DBNAME', 'dispenserinove' );
define ( 'USER', 'root' );
define ( 'PASSWORD', '' );
/*
define ( 'HOST', 'ns702.hostgator.com.br' );
define ( 'DBNAME', 'tarley_dispenser' );
define ( 'USER', 'tarley_dispenser' );
define ( 'PASSWORD', 'Newton@2016' );
*/
define ( 'CHARSET', 'utf8' );
define ( 'CHAVE', 'DispenserInoveNewtonPaiva2016' );

define('CONTEXT_NAME', '/dispenserinove/');
//define('CONTEXT_NAME', '/');
define('LOG_DIR', $_SERVER['DOCUMENT_ROOT'] . CONTEXT_NAME . 'log/');

require_once 'Logger.php';


/**
 * Created by PhpStorm.
 * User: NP
 * Date: 07/10/2016
 * Time: 19:04
 */
class BDConnection
{
    protected $db;

    function __construct() {
        $conn = NULL;
        try {
            $opcoes = array (
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_PERSISTENT => TRUE
            );

            $conn = new PDO ( "mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes );
            $conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            $conn = NULL;
            Logger($e);
        }
        $this->db = $conn;
    }

    public function getConnection() {
        return $this->db;
    }

    public function query($sql)
    {
        return $this->db->query($sql);
    }
}