<?php
    require_once '../db/db_connect.php';

    try {
        
        $users_list = $con->prepare("SELECT * FROM users");
	    $users_list->execute();
	    $result = $users_list->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch(PDOException $error) {
        echo "Opps! An error occurred<br>";
        echo $error->getMessage();
    exit;
}
?>