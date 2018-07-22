<?php
    require_once '../db/db_connect.php';

    $staff_id = $_SESSION['staff_id'];
    
    
    try {
        
        $available_policies = $con->prepare("SELECT * FROM policies WHERE user_id is null");
        $available_policies->execute();
        $available_policies_result = $available_policies->fetchAll(PDO::FETCH_ASSOC);
        
        } catch(PDOException $error) {
            echo "Opps! An error occurred<br>";
            echo $error->getMessage();
            exit;
        
        }   
    
    try {
        
    
        $user_available_policies = $con->prepare("SELECT * FROM policies WHERE user_id = '". $_GET['id']. "'");
        $user_available_policies->execute();
        $user_available_policies_result = $user_available_policies->fetchAll(PDO::FETCH_ASSOC);
        
        } catch(PDOException $error) {
        
            echo json_encode("Opps! An error occurred<br>");
            echo $error->getMessage();
            exit;
        
        }

    try {
        
    
        $current_user = $con->prepare("SELECT * FROM users WHERE user_id = '". $_GET['id']. " LIMIT 1'");
        $current_user->execute();
        $current_user_result = $current_user->fetchAll(PDO::FETCH_ASSOC);
        
        } catch(PDOException $error) {
        
            echo json_encode("Opps! An error occurred<br>");
            echo $error->getMessage();
            exit;
        
        }
    
?>