<?php
    if(isset($_POST["comment-submit"])){

        require 'config.php';  //Required DB configuration

        $email = $_POST['email'];
        $comment = $_POST['comment'];

        if(strlen($comment) < 10){
            header("Location: ../contact.php?error=shortcomment");  //Redirect to same page
            exit();
        }
        else{
            $sql = "INSERT INTO comments (email , comment ) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($db_con);
            if(!mysqli_stmt_prepare($stmt , $sql)){   //Sql error check
                header("Location: ../contact.php?error=sqlerror"); //Redirect to same page
                exit();
            }
            else{
            //store data into DB
                mysqli_stmt_bind_param($stmt, "ss", $email , $comment);
                mysqli_stmt_execute($stmt);
                header("Location: ../contact.php?comment=success");  //Redirect to payment page
                exit();
            }
        }
        //close db connection
        mysqli_stmt_close($stmt);
        mysqli_close($db_con);
    }