<?php
    require_once '../db/db_connect.php';

    

        try {
            
            $available_policies = $con->prepare("SELECT * FROM policies WHERE user_id is null");
            $available_policies->execute();
            $available_policies_result = $available_policies->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch(PDOException $error) {
            echo "Opps! An error occurred<br>";
            echo $error->getMessage();
            exit;
        }
    
        try {
        
            $staff_id =$_SESSION['staff_id'];
    
            $user_available_policies = $con->prepare("SELECT * FROM policies WHERE user_id = '". $_GET['id']. "'");
            $user_available_policies->execute();
            $user_available_policies_result = $user_available_policies->fetchAll(PDO::FETCH_ASSOC);
        
        } 
        catch(PDOException $error) {
        
            echo json_encode("Opps! An error occurred<br>");
            echo $error->getMessage();
            exit;
        
        }
    
?>