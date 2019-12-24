<?php
    session_start();
    session_unset();   //Unset session variable
    session_destroy(); //destroy session
    header("Location: ../index.php?logout=success"); //Redirect to home page
    exit();

?>
