<?php
    require_once '../db/db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');

        $response = [];
        
        // Get data
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];

        // Check if user already exist
        $search_user = $con->prepare("SELECT * FROM users WHERE user_name = :user_name LIMIT 1");
        $search_user->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $search_user->execute();

        if ($search_user->rowCount() == 1) {
            
            // User exist
            $user = $search_user->fetch(PDO::FETCH_ASSOC);
            $user_id = (int) $user['user_id'];
            $user_roll = (string) $user['user_roll'];
            $password = (string) $user['user_password'];
            $use_status = (string) $user['user_status'];
            
            // Check password
            if (password_verify($user_password, $password)) {
                
                // Start new session
                session_start();
                $_SESSION['is_loged'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_roll'] = $user_roll;
                $_SESSION['user_status'] = $use_status;
                
                // Create response data
                $response['is_loged'] = true;

                if ($user_roll == 'admin') {
                    $response['redirect'] = './src/views/ifa-admin-all-staff.php';
                } else {
                    $response['redirect'] = './src/views/ifa-staff-dashboard.php';
                }
            }

        } else {
            // Incorrect user
            // Create response error data
            $response['error'] = 'Opps! Authentication error. Try again!';
        }

        echo json_encode($response);

    } else {

        exit('Get out!');
    
    }
?>
