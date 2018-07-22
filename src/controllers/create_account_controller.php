<?php
    require_once '../app_config.php';
    require_once '../models/user_model.php';
    require_once '../../vendor/autoload.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');
        
        $response = [];

        // Get data
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];

        // Check if user exist
        $user = new User();
        $check_user = $user->getUserData($user_name);

        if (count($check_user) == 1) {
            
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
            $user_password_hash = password_hash($temporal_user_password, PASSWORD_DEFAULT);
            $email_activation_key = md5($user_email. $user_name);
            
            // create account verification link
            $link = 'http://'. $_SERVER['SERVER_NAME']. ':8888/'. 'piranha_technical_skills_evaluation/src/services/activation.php?key='. $email_activation_key;

            // Create new user
            $user->createUser($user_name, $user_email, $user_password_hash, $email_activation_key);

            // Send validation mail
            // Create the Transport
            $transport = (new Swift_SmtpTransport(MAIL_SERVER, MAIL_PORT, MAIL_SECURITY))
                ->setUsername(MAIL_USER)
                ->setPassword(MAIL_PASSWORD);

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Pirahna account user mail activation'))
                ->setFrom([MAIL_USER => 'Piranha admin'])
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
            $response['redirect'] = 'ifa-admin-all-staff.php';
            $response['is_loged'] = true;
            
        }

        echo json_encode($response);
    
    } else {
    
        exit('Get out!');
    
    }

?>