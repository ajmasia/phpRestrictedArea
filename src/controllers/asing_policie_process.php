<?php
    require_once '../db/db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');

        $response = [];
        
        // Get data
        session_start();
        $polcie_id = $_POST['policie_id'];
        $staff_id = $_SESSION['staff_id'];

        // Check if user key already exist
        $search_user = $con->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
        $search_user->bindParam(':user_id', $staff_id, PDO::PARAM_STR);
        $search_user->execute();

        $search_policie = $con->prepare("SELECT * FROM policies WHERE policie_id = :policie_id LIMIT 1");
        $search_policie->bindParam(':policie_id', $polcie_id, PDO::PARAM_STR);
        $search_policie->execute();

        if ($search_user->rowCount() == 1 && $search_policie->rowCount()) {
            
            // User correct is correct
            // Update user account status
            $policie = $con->prepare("UPDATE policies SET user_id = :user_id WHERE policie_id = :policie_id");
            $policie->bindParam(':user_id', $staff_id, PDO::PARAM_STR);
            $policie->bindParam(':policie_id', $polcie_id, PDO::PARAM_STR);

            $policie->execute();

            echo json_encode('Policie updated correctly.');
            $response['redirect'] = 'ifa-admin-all-staff.php?id='. $_SESSION['staff_id'];

        } else {
            echo json_encode('An error ocurred trying asing policie to user');
        }

       

    } else {

        exit('Get out!');
    
    }
?>