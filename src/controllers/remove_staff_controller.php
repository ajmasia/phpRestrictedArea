<?php
    require_once '../models/user_model.php';
    require_once '../models/policie_model.php';

    session_start();
 
    if (!empty($_GET['id']) && isset($_GET['id'])) {

        // Check if user exist
        $user = new User();
        $user_selected = $user->getSelectedUserData($_GET['id']);
        
        if (count($user_selected) == 1) {
            
            $policie = new Policie();
            $related_user_policies = $policie->getPoliciesByUser($_GET['id']);
            
            foreach ($related_user_policies as $row) {

                // Update user
                $policie->unlinkPolicieUser($row['policie_id']);
            
            }

            // Delete user

            $user->deleteUser($_GET['id']);

            header("location: /piranha_technical_skills_evaluation/src/views/ifa-admin-all-staff.php");

        } else {
            echo 'Invalidad user id';
        }
 
    } else {
        echo 'You need an existing user id';
    }
 
?>
<a href=""></a>