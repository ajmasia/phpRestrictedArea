<?php
    require_once '../db/db_connection_class.php';
    
    class User extends DataBaseConfig {
        
        public function __construct() {
            parent::__construct();
        }

        public function getUsers() {
            
            $query = "SELECT * 
                        FROM users";

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

        public function getUserData($user_name) {

            $query = "SELECT * 
                        FROM users 
                        WHERE user_name = '". $user_name. "' LIMIT 1";

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

        public function getSelectedUserData($user_id) {

            $query = "SELECT * 
                        FROM users 
                        WHERE user_id = ". $user_id. " LIMIT 1";

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

        public function deleteUser($user_id) {

            $query = "DELETE 
                        FROM users 
                        WHERE user_id = ". $user_id;

            $result = $this->connection->query($query);

            if ($result == false) {
                return false;
            }

            return true;

        }

        public function createUser($user_name, $user_email, $user_password, $email_activation_key) {

            $query = "INSERT INTO users 
                        (user_name, user_email, user_password, user_roll, user_status, user_activation_key) 
                        VALUES ('$user_name', '$user_email', '$user_password', 'staff', 'Invitation Sent', '$email_activation_key')";

            $result = $this->connection->query($query);

            if ($result == false) {
                return false;
            }

            return true;

        }
    }
?>