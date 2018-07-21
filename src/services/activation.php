<?php
    require_once '../db/db_connect.php';
 
    if (!empty($_GET['key']) && isset($_GET['key'])) {
 
        $user_activation_key = $_GET['key'];

        // Check if user key already exist
        $search_user = $con->prepare("SELECT * FROM users WHERE user_activation_key = :user_activation_key LIMIT 1");
        $search_user->bindParam(':user_activation_key', $user_activation_key, PDO::PARAM_STR);
        $search_user->execute();

        if ($search_user->rowCount() == 1) {
            
            // User correct is correct
            // Update user account status
            $search_user = $con->prepare("UPDATE users SET user_status = 'Active' WHERE user_activation_key = :user_activation_key");
            $search_user->bindParam(':user_activation_key', $user_activation_key, PDO::PARAM_STR);
            $search_user->execute();

            echo 'User activated correctly. <a href="http://localhost:8888/piranha_technical_skills_evaluation/index.php">Login</a>';


        } else {
            echo 'Invalidad activation key';
        }
 
    } else {
        echo 'You need a valid activation key';
    }
 
?>
<a href=""></a>