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
    
    /* CONFIGURAÇÕES LOGENTRIES */
	$LOGENTRIES_TOKEN = "15adbbcc-0343-44ea-aba5-411b83f6e437";
    
    // Caminho para a raiz
    define( 'ABSPATH', dirname( __FILE__ ) ); 
    
    require_once ABSPATH . '/api/util/log/logentries.php';
    require_once ABSPATH . '/api/util/JsonUtil.php';
    require_once ABSPATH . '/api/util/SegurancaUtil.php';
    
    function __autoload($class_name) {
    	$file = ABSPATH . '/api/model/' . $class_name . '.class.php';
    	
    	if ( ! file_exists( $file ) ) {
    		echo "Classe " . $class_name . " não encontrada.";
    		die();
    	}
    	
    	// Inclui o arquivo da classe
        require_once $file;
    }
    
    Log::$log = $log;
    
    session_start();
?>