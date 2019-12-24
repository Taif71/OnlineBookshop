<?php

    if (isset($_POST['reset-password'])) {

        require "config.php";
        $email = $_POST['email'];

        $sql = "DELETE FROM password_reset WHERE email=?";
        $stmt = mysqli_stmt_init($db_con);
        if(!mysqli_stmt_prepare($stmt , $sql)){
            header("Location: ../signup.php?error=sqlerror");  // Redirect with sql error message
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email );
            mysqli_stmt_execute($stmt);
        }
        $sql = "SELECT email FROM users WHERE email=? ";
        $stmt = mysqli_stmt_init($db_con);
        if(!mysqli_stmt_prepare($stmt , $sql)){
            header("Location: ../signup.php?error=sqlerror");  // Redirect with sql error message
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //mysqli_stmt_store_result($stmt);
            //$resultcheck = mysqli_stmt_num_rows($stmt);
            if($row = mysqli_fetch_assoc($result)){
                if($email == $row['email'] ){
                    // generate a unique random token of length 100
                    $token = bin2hex(random_bytes(50));
                    $expire = date("U") + 1800;
                    $sql = "INSERT INTO password_reset(email, token , expire_token) VALUES (?, ?, ?)";  //insert value using statement
                    $stmt = mysqli_stmt_init($db_con);
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: ../reset_password.php?error=sqlerror");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "sss", $email , $token, $expire);
                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_close($stmt);
                        mysqli_close($db_con);

                        // Send email to user with the token in a link they can click on
                        $to = $email;
                        $subject = "Reset your password on online-travel-agency.com";
                        $msg = "Hi there, click on this <a href='../set_new_pass.php?token='" . $token . "'>link</a> to reset your password on our site";
                        $msg .= "If you didn't then ignore this email";
                        $headers = "From: MDMONIRHOSSAN01820.com";
                        mail($to, $subject, $msg, $headers);

                        header("Location: ../reset_password.php?success=email");  //Reirect with success message
                    
                    }

                }
                else{
                    
                    header("Location: ../reset_password.php?error=noemail=".$email);
                    exit();
                }
            }
        }
        
    }
?>