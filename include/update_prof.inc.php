<?php
    session_start();
    $name = $_POST['fullname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];

    $target_dir = "../profile_pic/";  //image directory
    $target_file = $target_dir . basename($_FILES["pro-pic"]["name"]);
    $uploadOk = 1;  //upload status
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["update-submit"])) {

        require "config.php";  //DB connect & configure

        //Check if it is an image
        $check = getimagesize($_FILES["pro-pic"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["pro-pic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["pro-pic"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["pro-pic"]["name"]). " has been uploaded.";
                $filename = basename( $_FILES["pro-pic"]["name"]);

                // Insert into DB with php statement
                $sql = "UPDATE users SET uname=? , fullName=? , email=? , picture=? WHERE id=?";
                //$sql = "INSERT INTO packages (title , detail , price , image_direct) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($db_con);
                if(!mysqli_stmt_prepare($stmt , $sql)){
                    header("Location: ../profile.php?error=sqlerror");
                    exit();
                }
                else{
                    $id = $_SESSION['userId'];
                    mysqli_stmt_bind_param($stmt, "sssss", $uname , $name, $email, $filename ,$id );
                    mysqli_stmt_execute($stmt);
                    header("Location: ../profile.php?upload=success");
                    exit();
                }


            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        //Close DB Connection
         mysqli_stmt_close($stmt);
         mysqli_close($db_con);
    }

?>