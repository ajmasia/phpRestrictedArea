<?php
    require_once '../db/db_connect.php';
    session_start();
 
    if (!empty($_GET['id']) && isset($_GET['id'])) {
 
        $staff_id = $_GET['id'];

        // Check if user key already exist
        $search_staff = $con->prepare("SELECT * FROM users WHERE user_id = :staff_id LIMIT 1");
        $search_staff->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
        $search_staff->execute();

        if ($search_staff->rowCount() == 1) {
            
            // Get staff user policies

            $search_user_policies = $con->prepare("SELECT * FROM policies WHERE user_id = '$staff_id'");
            $search_user_policies->execute();
            $search_user_policies_results = $search_user_policies->fetchAll(PDO::FETCH_ASSOC);

            foreach ($search_user_policies_results as $row) {

                // Update user
                $policie_update = $con->prepare("UPDATE policies SET user_id = null WHERE policie_id = :policie_id");
                $policie_update->bindParam(':policie_id', $row['policie_id'], PDO::PARAM_STR);
                $policie_update->execute();
            
            }

            // Delete user

            $delete_staff = $con->prepare("DELETE FROM users WHERE user_id = :staff_id");
            $delete_staff->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
            $delete_staff->execute();

            header("location: /piranha_technical_skills_evaluation/src/views/ifa-admin-all-staff.php");


        } else {
            echo 'Invalidad user id';
        }
 
    } else {
        echo 'You need an existing user id';
    }
 
?>
<a href=""></a>