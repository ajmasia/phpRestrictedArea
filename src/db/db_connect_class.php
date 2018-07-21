<?php 
require_once '../app_config.php';

    class DataBase {
        protected static $con;
        private function __construct() {
            
            try {

                self::$con = new PDO(
                    DSN,
                    USER_NAME, 
                    PASSWORD);
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
            
            } catch (PDOException $e) {
                
                echo "An error ocour trying to connect database";
                exit;
            
            }
        }
    
        public static function getConnection() {
            if (!self::$con) {
                new DataBase();
            }
            return self::$con;
        }
    }
?>