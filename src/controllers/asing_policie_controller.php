<?php
    require_once '../models/user_model.php';
    require_once '../models/policie_model.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');

        $response = [];

        $user = new User();

        // Get data
        session_start();
        $polcie_id = $_POST['policie_id'];
        $staff_id = $_SESSION['staff_id'];

        // Check if user exist
        $user = new User();
        $current_user = $user->getSelectedUserData($_GET['id']);

        // Check if policie exist
        $policie = new Policie();
        $policie_sected = $policie->getPolicieById($polcie_id);

        if (count($current_user) == 1 && count($policie_sected)) {
            
            // User correct is correct
            // Update user account status
            $update_policie = $policie->asignPolicieToUser($staff_id, $polcie_id);

            echo json_encode('Policie updated correctly.');
            $response['redirect'] = 'ifa-admin-all-staff.php?id='. $_SESSION['staff_id'];

        } else {
            echo json_encode('An error ocurred trying asing policie to user');
        }

       

    } else {

        exit('Get out!');
    
    }
?>