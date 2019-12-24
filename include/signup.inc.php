<?php
if(isset($_POST["signup-submit"])){

    require 'config.php';  //DB configure

    $fullname = $_POST['full-name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $is_admin = false;

    //Check empty field
    if(empty($fullname) || empty($uname) || empty($email) || empty($pass) || empty($repass)){
        header("Location: ../signup.php?error=emptyfields&name=".$fullname. "&email=".$email);   //Redirect to smae page with value
        exit();
    }
    // check email and name pattern
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-z A-Z]*$/", $fullname)){
        header("Location: ../signup.php?error=invalidname&email");  //Redirect to smae page
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=emptyfields&name=".$fullname);
        exit();
    }
    else if(!preg_match("/^[a-z A-Z]*$/", $fullname) && $pass !== $repass ){
        header("Location: ../signup.php?error=namepass&email=".$email);
        exit();
    }
    else if(!preg_match("/^[a-z A-Z]*$/", $fullname)){
        header("Location: ../signup.php?error=nameerror&email=".$email);
        exit();
    }
    //Check password
    else if(strlen($pass) < 6 || !preg_match("#.*^(?=.{6,20})(?=.*[A-Z])(?=.*[0-9]).*$#", $pass)){
        header("Location: ../signup.php?error=passwordpattern&name=".$fullname. "&email=".$email);
        exit();
    }
    else if($pass !== $repass){
        header("Location: ../signup.php?error=passwordcheck&name=".$fullname. "&email=".$email);
        exit();
    }
    else{

        $sql = "SELECT email , uname FROM users WHERE email=? OR uname=?";
        $stmt = mysqli_stmt_init($db_con);
        if(!mysqli_stmt_prepare($stmt , $sql)){
            header("Location: ../signup.php?error=sqlerror");  // Redirect with sql error message
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $email , $uname );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //mysqli_stmt_store_result($stmt);
            //$resultcheck = mysqli_stmt_num_rows($stmt);
            if($row = mysqli_fetch_assoc($result)){
                if($uname == $row['uname'] ){
                    header("Location: ../signup.php?error=unametaken&uname=".$uname);
                    exit();
                }
                else if($email == $row['email'] ){
                    header("Location: ../signup.php?error=emailtaken&email=".$email);
                    exit();
                }
                else if($uname == $row['uname'] || $email == $row['email'] ){
                    header("Location: ../signup.php?error=emailuname&email=".$email. "&uname=".$uname);
                    exit();
                }
                
                
            }
            // if($resultcheck > 0){   //check email for uniqness
            //     header("Location: ../signup.php?error=emailtaken&email=".$email);
            //     exit();
            // }
            else{
                $sql = "INSERT INTO users (fullName , uname , email , pass , is_admin) VALUES (?, ?, ?, ?, ?)";  //insert value using statement
                $stmt = mysqli_stmt_init($db_con);
                if(!mysqli_stmt_prepare($stmt , $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else{
                    $hash_pass = password_hash($pass , PASSWORD_DEFAULT );  //Password hash
                    mysqli_stmt_bind_param($stmt, "sssss", $fullname , $uname , $email, $hash_pass, $is_admin);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?signup=success");  //Reirect with success message
                    exit();
                }

            }
        }
    }
    //Close Db connection
    mysqli_stmt_close($stmt);
    mysqli_close($db_con);
}
// else{
//     header("Location: ../signup.php");
//     echo "error";
//     exit();
// }

?>
