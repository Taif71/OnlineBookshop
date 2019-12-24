<?php
    session_start();
    if(isset($_POST["search-submit"])){

        require 'config.php';  //Required DB configuration
        // check login status
        if(!isset($_SESSION['email'])){
            header("Location: ../search_booking.php?error=loginerror");
            echo "You must login first";
            exit();
        }
        else{
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $sql ="SELECT * FROM bookng_request WHERE email like'%$email%' AND phone = '$phone' ";  //compare email and number

            $stmt = mysqli_stmt_init($db_con);
            if(!mysqli_stmt_prepare($stmt , $sql)){
                header("Location: ../search_booking.php?error=sqlerror");   //Redirect to same page
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $email , $phone );
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){  //Fetch all row from Db
                    echo "<br/><h1>Result found </h1><br/>";
                    $name = $row['fullname'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    
                    $no_of_books = $row['num_of_person'];
                    $room = $row['rooms'];
                    echo  "<br/><h3> Name:" .$name. "<br/> Email :" .$email. "<br/> Phone Number:" .$phone. "<br/>" . "<br/> No of Copies:" .$no_of_books. "<br/>". "</h3><br/> ";
                }
                else{
                    header("Location: ../search_booking.php?error=infoerror");
                }

            }
        }
        
        //Close DB Connection
        mysqli_stmt_close($stmt);
        mysqli_close($db_con);
    }
?>
