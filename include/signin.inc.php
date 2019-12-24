<?php
if(isset($_POST["signin-submit"])){

    require 'config.php';    //DB Configure

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $remember = $_POST['remember'];

    if (empty($email) || empty($pass)) {  //Check empty field
        header("Location: ../login.php?error=emptyfields");  //Redirect to same page
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($db_con);
        if (!mysqli_stmt_prepare($stmt , $sql)) {
            header("Location: ../login.php?error=sqlerror");   //Redirect to same page
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passcheck = password_verify($pass, $row['pass']);
                if ($passcheck == false) {
                    header("Location: ../login.php?error=wrongpassword");  //Redirect to smae page
                    exit();
                }
                else if($passcheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_type'] = $row['is_admin'];
                    $_SESSION['name'] = $row['fullName'];
                    $_SESSION['uname'] = $row['uname'];
                    $_SESSION['pic'] = $row['picture'];


                    if(!empty($remember)){
                        setcookie("email" , $row['email'] , time()+60*60 , "/" );
                        //setcookie("pass" , $row['pass'] , time()+60*60 );
                    }
                    else{

                    }
                    // setcookie("uid" , $row['email'] , time()+60 );
                    // Check user admin or not admin
                   if($_SESSION['user_type'] == 1){
                        header("Location: ../admin/booking_req.php?login=success");  //Redirect to booking request
                        exit();
                   }
                   else{
                        header("Location: ../index.php?login=success");  //Redirect to home page
                        exit();
                   }

                }
                else{
                    header("Location: ../login.php?error=loginerror");   //Redirect to smae page
                    exit();
                }
            }
            else{
                header("Location: ../login.php?error=nouserfound");  //Redirect to smae page
                exit();
            }
        }
    }
}
else{
    header("Location: ../login.php?error=loginerror");  //login unsuccessful
    exit();
}

?>
