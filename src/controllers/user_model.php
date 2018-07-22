<?php
    require_once '../db/db_connection_class.php';
    
    class User extends DataBaseConfig {
        
        public function __construct() {
            parent::__construct();
        }

        public function getLogedUserData() {

        }

        public function getSelectedUserData($user_id) {

            $query = "SELECT * 
                        FROM users 
                        WHERE user_id = ". $user_id;

            $result = $this->connection->query($query);

            if ($result == false) {
                return false;
            }

            $rows = array();

            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }

            return $rows;
        }
    }
?>