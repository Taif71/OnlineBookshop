<?php
    session_start();
    // GET all value through hmlhttp submit
    $uname = $_GET['uname'];

    require 'config.php';  //DB Configure
    
    // Insert into flight
    $sql = "SELECT uname FROM users WHERE uname=?";
    $stmt = mysqli_stmt_init($db_con);
    if(!mysqli_stmt_prepare($stmt , $sql)){   //DB Error
        header("Location: signup.php?error=sqlerror");
        echo"erroor".mysqli_error($db_con);
        exit();
    }
    else{
        // DB Connection Success
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){

            // echo "User name is not available";

            if($uname == $row['uname'] ){
                echo "User name not available";
            }
            else{
                echo 123;
            }
        }
        else{
            echo "User name available";
        }
    }
     
    //Close DB Connection
    mysqli_stmt_close($stmt);
    mysqli_close($db_con);
?>