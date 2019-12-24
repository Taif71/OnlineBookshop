<?php
  session_start(); //Session start.
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
  </head>


  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg  static-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo.jpg" alt="Logo" width=50 height=50 alt="Logo">
                <span><i>Travel</i></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="../images/menu.png" height=50 width=50 alt="">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="booking_req.php">Requests <span class="sr-only">(current)</span>  <!-- Active nav link when logged in -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register_user.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_package.php">Add Books</a>
                    </li>
                    
                    
                    <?php
                        //Check session status.
                        if(isset($_SESSION['userId'])) {
                    ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../profile_pic/<?php echo $_SESSION['pic']; ?>" width="30" height="30" class="rounded-circle">
                                </a>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="../profile.php">My Account</a>
                                    <a class="dropdown-item" href="../include/logout.inc.php">Log Out</a>
                                </div>
                            </li>
                    <?php
                        }
                        // if session in not set.
                        else{
                            echo ' 
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="signup.php">Sign Up</a>
                            </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>