<?php
    session_start();
    session_destroy();
    
    header("location: /piranha_technical_skills_evaluation/index.php");
?>
