<?php
    require_once '../models/user_model.php';
 
    if (!empty($_GET['key']) && isset($_GET['key'])) {
 
        $user = new User();
        $user_activation_key = $_GET['key'];
    
        // Check if user key already exist
        $activate_user = $user->getUserDataActivation($user_activation_key);

        if (count($activate_user) == 1) {
            
            // User correct is correct
            // Update user account status
            $user->updateStatus($user_activation_key);

            echo 'User activated correctly. <a href="http://localhost:8888/piranha_technical_skills_evaluation/index.php">Login</a>';


        } else {
            echo 'Invalidad activation key';
        }
 
    } else {
        echo 'You need a valid activation key';
    }
 
?>