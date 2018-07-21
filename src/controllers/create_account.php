<?php
    require_once '../db/db_connect.php';
    require_once '../../vendor/autoload.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');
        $response = [];

        // Get data
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];

        // Check if user already exist
        $search_user = $con->prepare("SELECT * FROM users WHERE user_name = :user_name LIMIT 1");
        $search_user->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $search_user->execute();

        if ($search_user->rowCount() == 1) {
            
            // User exist
            // Create response error data
            $response['error'] = 'User already exist in database';
            $response['is_loged'] = false;

        } else {
            
            // User do not exits
            // Hash password
            $user_password = password_hash('supersegura', PASSWORD_DEFAULT);
            $email_activation_key = md5($user_email. $user_name);
            // create account verification link
            $link = 'http://'. $_SERVER['SERVER_NAME']. ':8888/'. 'piranha_technical_skills_evaluation/src/services/activation.php?key='. $email_activation_key;

            $new_user = $con->prepare("INSERT INTO users (user_name, user_email, user_password, user_roll, user_status, user_activation_key) VALUES (:user_name, :user_email, :user_password, 'staff', 'Invitation Sent', :user_activation_key)");
            $new_user->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $new_user->bindParam(':user_email', $user_email, PDO::PARAM_STR);
            $new_user->bindParam(':user_password', $user_password, PDO::PARAM_STR);
            $new_user->bindParam(':user_activation_key', $email_activation_key, PDO::PARAM_STR);
            $new_user->execute();

            // Send validation mail
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername('fswdtesting@gmail.com')
                ->setPassword('Art3san0');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Wonderful Subject'))
                ->setFrom(['fswdtesting@gmail.com' => 'Full Stack Web Developer Testing'])
                ->setTo(['antoniomasiaguerrero@gmail.com', 'antoniomasiaguerrero@gmail.com' => 'AJMA'])
                ->setBody('Here is the message itself. '. $link);

            // Send the message
            $result = $mailer->send($message);
            
            // Start new session
            // session_start();
            // $user_id = $con->lastInsertId();
            // $_SESSION['is_loged'] = true;
            // $_SESSION['user_id'] = (int) $user_id;
            // $_SESSION['user_roll'] = 'staff';
            // $_SESSION['user_name'] = $user_name;

            // Create response data
            $response['redirect'] = '../views/ifa-staff-dashboard.php';
            $response['is_loged'] = true;
            
        }

        echo json_encode($response);
    
    } else {
    
        exit('Get out!');
    
    }

?>