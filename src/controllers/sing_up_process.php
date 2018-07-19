<?php
    require_once '../db/db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');
        $response = [];
        $user_name = $_POST['user_name'];

        // Check if user already exist
        $search_user = $con->prepare("SELECT * FROM users WHERE user_name = :user_name LIMIT 1");
        $search_user->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $search_user->execute();

        if ($search_user->rowCount() == 1) {
            // User exist
            $response['error'] = 'User already exist in database';
            $response['is_loged'] = false;
        } else {
            // User do not exits
            // Hash password
            $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

            $new_user = $con->prepare("INSERT INTO users (user_name, user_password, user_roll) VALUES (:user_name, :user_password, 'admin')");
            $new_user->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $new_user->bindParam(':user_password', $user_password, PDO::PARAM_STR);
            $new_user->execute();

            $user_id = $con->lastInsertId();
            session_start();
            $_SESSION['is_loged'] = true;
            $_SESSION['user_id'] = (int) $user_id;
            $response['redirect'] = '../views/ifa-admin-all-staff.php';
            $response['is_loged'] = true;
            
        }
        echo json_encode($response);
    } else {
        exit('Get out!');
    }
?>