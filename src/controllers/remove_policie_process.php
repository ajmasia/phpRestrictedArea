<?php
    require_once '../db/db_connect.php';
    session_start();
 
    if (!empty($_GET['id']) && isset($_GET['id'])) {
 
        $policie_id = $_GET['id'];

        // Check if user key already exist
        $search_policie = $con->prepare("SELECT * FROM policies WHERE policie_id = :policie_id LIMIT 1");
        $search_policie->bindParam(':policie_id', $policie_id, PDO::PARAM_STR);
        $search_policie->execute();

        if ($search_policie->rowCount() == 1) {
            
            // User correct is correct
            // Update user account status
            $policie_update = $con->prepare("UPDATE policies SET user_id = null WHERE policie_id = :policie_id");
            $policie_update->bindParam(':policie_id', $policie_id, PDO::PARAM_STR);
            $policie_update->execute();

            header("location: /piranha_technical_skills_evaluation/src/views/ifa-admin-edit-staff.php?id=". $_SESSION['staff_id']);


        } else {
            echo 'Invalidad policie id';
        }
 
    } else {
        echo 'You need an existing policie id';
    }
 
?>
<a href=""></a>