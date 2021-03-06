<?php
    require_once '../app_config.php';

    class DataBaseConfig {
        
        private $_host = HOST;
        private $_username = USER_NAME;
        private $_password = PASSWORD;
        private $_database = DB_NAME;
        
        protected $connection;
        
        public function __construct()
        {
            if (!isset($this->connection)) {
                
                $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
                
                if (!$this->connection) {
                    echo 'Opps! Cannot connect to database server';
                    exit;
                }            
            }    
            
            return $this->connection;
        }
    }
?>
