<?php
    require_once '../db/db_connection_class.php';
    
    class Policie extends DataBaseConfig {
        
        public function __construct() {
            parent::__construct();
        }

        public function getUnasingPolicies() {
            
            $query = "SELECT * 
                        FROM policies 
                        WHERE user_id is null";

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

        public function getPoliciesByUser($user_id) {

            $query = "SELECT * 
                        FROM policies 
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

        public function getPolicieById($policie_id) {

            $query = "SELECT * 
                        FROM policies 
                        WHERE policie_id = ". $policie_id. " LIMIT 1";

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
        
        public function unlinkPolicieUser($policie_id) {

            $query = "UPDATE policies 
                        SET user_id = null 
                        WHERE policie_id = ". $policie_id;

            $result = $this->connection->query($query);

            if ($result == false) {
                return false;
            }

            return true;

        }

    }
?>