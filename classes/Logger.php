<?php

date_default_timezone_set ( 'America/Sao_Paulo' );

/**
 * Created by PhpStorm.
 * User: NP
 * Date: 07/10/2016
 * Time: 19:01
 */
class Logger
{
    public function info($msg)
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
}
?>
