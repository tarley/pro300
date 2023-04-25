<?php
    /* CONFIGURAÇÕES DE BANCO */
    $DB_HOST = 'localhost';
    $DB_NAME = 'pro300';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '';
    
    define('DB_HOST', $DB_HOST);
    define('DB_NAME', $DB_NAME);
    define('DB_USERNAME', $DB_USERNAME);
    define('DB_PASSWORD', $DB_PASSWORD);
    
    /*CONFIGURAÇÕES DE E-MAIL*/
    // define('EMAIL_HOST', 'br518.hostgator.com.br');
    define('EMAIL_HOST', 'br702.hostgator.com.br');
    define('EMAIL_SMTPAUTH', true);
    
    // define('EMAIL_USERNAME', 'sistema@pro300.com.br');
    // define('EMAIL_PASSWORD', '$5aK8A~uQv;g');
    
    define('EMAIL_USERNAME', 'pro300@tarley.eti.br');
    define('EMAIL_PASSWORD', 'W*Er}VwTD@Eh');
    
    define('EMAIL_SMTPSECURE', 'ssl');
    define('EMAIL_PORT', 465);
    
    /* CONFIGURAÇÕES LOGENTRIES */
    // $LOGENTRIES_TOKEN = "bbde0841-f017-41ab-851f-563e6dffb70b";
    // $LOGENTRIES_TOKEN = "15adbbcc-0343-44ea-aba5-411b83f6e437";
    $LOGENTRIES_TOKEN = "d876b843-7f81-4e87-b641-923fe5814b1b";
    
    // Caminho para a raiz
    define( 'ABSPATH', dirname( __FILE__ ) ); 
    
    require_once ABSPATH . '/api/util/log/logentries.php';
    require_once ABSPATH . '/api/util/JsonUtil.php';
    require_once ABSPATH . '/api/util/SegurancaUtil.php';
    
    function __autoload($classname) {
    	$filename = ABSPATH . '/api/model/' . $classname . '.class.php';
    	if (is_readable($filename)) {
    	    // Inclui o arquivo da classe
            require $filename;
    	}
    	
    	$filename = ABSPATH . '/api/util/mailer/' . 'class.'.strtolower($classname).'.php';
        if (is_readable($filename)) {
            require $filename;
        }
    }
    
    Log::$log = $log;
    
    session_start();
?>
