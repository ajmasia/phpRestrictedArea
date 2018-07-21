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

            function password_generate($chars) {
                $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                return substr(str_shuffle($data), 0, $chars);
            }
 
            $temporal_user_password = password_generate(7);
            $user_password_hasg = password_hash($temporal_user_password, PASSWORD_DEFAULT);
            $email_activation_key = md5($user_email. $user_name);
            // create account verification link
            $link = 'http://'. $_SERVER['SERVER_NAME']. ':8888/'. 'piranha_technical_skills_evaluation/src/services/activation.php?key='. $email_activation_key;

            $new_user = $con->prepare("INSERT INTO users (user_name, user_email, user_password, user_roll, user_status, user_activation_key) VALUES (:user_name, :user_email, :user_password, 'staff', 'Invitation Sent', :user_activation_key)");
            $new_user->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $new_user->bindParam(':user_email', $user_email, PDO::PARAM_STR);
            $new_user->bindParam(':user_password', $user_password_hasg, PDO::PARAM_STR);
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
            $message = (new Swift_Message('Pirahna account user mail activation'))
                ->setFrom(['fswdtesting@gmail.com' => 'Piranha admin'])
                ->setTo([$user_email => $user_name])
                ->setBody('
                    <h2>Pirahna skills evaluation user accound mail activation</h2></br>
                    <p>Pirahna admin has created a new account for you.<p>
                    <p>
                    User: '. $user_name. '<br>
                    Temporal password: '. $temporal_user_password. '
                    </p>
                    <p>Please follow the link below to activate your account:<br>'. $link .'</p>
                    <p>Kind regards,</p>
                    <p>Pirahna Design padawan<br>© 2018. All rights reserved.</p>
                ', 'text/html');

            // Send the message
            $result = $mailer->send($message);

            // Create response data
            $response['redirect'] = '../views/ifa-admin-all-staff.php';
            $response['is_loged'] = true;
            
        }

        echo json_encode($response);
    
    } else {
    
        exit('Get out!');
    
    }

?>