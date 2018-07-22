<?php
    require_once '../models/user_model.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');

        $response = [];

        $user = new User();
        $check_user = $user->getUserData($_POST['user_name']);

        if (count($check_user) == 1) {
            
            foreach ($check_user as $res) {
               
                $user_name = $res['user_name'];
                $user_id = $res['user_id'];
                $user_status = $res['user_status'];
                $user_roll = $res['user_roll'];
                $user_password = $res['user_password'];

            }
            
            // User exist    
            // Check password
            if (password_verify($_POST['user_password'], $user_password)) {
                
                if ($user_status == 'Active') {
                    
                    // Start new session
                    session_start();
                    $_SESSION['is_loged'] = true;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_roll'] = $user_roll;
                    $_SESSION['user_status'] = $user_status;
                    
                    // Create response data
                    $response['is_loged'] = true;

                    if ($user_roll == 'admin') {
                        $response['redirect'] = './src/views/ifa-admin-all-staff.php';
                    } else {
                        $response['redirect'] = './src/views/ifa-staff-dashboard.php';
                    }

                } else {
                    $response['error'] = 'Opps! This user is not active yet!';
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