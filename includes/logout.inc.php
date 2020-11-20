<?php
    
    if(isset($_GET['user-removed']) == "success") {
        session_start();
        session_unset();
        session_destroy();

        header("Location: ../login.php?user-removed=success");
        exit();
        
    }
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../login.php");
    exit();