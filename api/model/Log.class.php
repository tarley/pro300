<?php
    class Log {
        
        public static $log = null;
        
        public static function Debug($line) {
            if(empty(LOG::$log))
                return;
            
            if(is_array($line))
                LOG::$log->Debug(print_r($line, true));
            else
                LOG::$log->Debug($line);
        }
        
        public static function Error($line) {
            if(empty(LOG::$log))
                return;
            
            if($line instanceof Exception)
                LOG::$log->Error($line->getMessage());
            else
                LOG::$log->Error($line);
        }
    }
?>