<?php
    require_once './policie_model.php';
    
    session_start();    
    
    if (!empty($_GET['id']) && isset($_GET['id'])) {
 
        $policie = new Policie();
        $policie_selected = $policie->getPolicieById($_GET['id']);


        if (count($policie_selected) == 1) {
        
            $policie_user_update = $policie->unlinkPolicieUser($_GET['id']);

            header("location: /piranha_technical_skills_evaluation/src/views/ifa-admin-edit-staff.php?id=". $_SESSION['staff_id']);

        } else {
            echo 'Invalidad policie id';
        }
 
    } else {
        echo 'You need an existing policie id';
    }
 
?>
<a href=""></a>