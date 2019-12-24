<?php
 // session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>
  
  <!-- Navigation -->
<nav class="navbar navbar-expand-lg static-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.jpg" width=50 height=50 alt="Logo">
            <span><i>TheBookShop</i></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="images/menu.png" height=50 width=50 alt="">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Packages.php">Books</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="booking_flight.php">Flight</a>
                </li> -->
                
                <li class="nav-item">
                    <a class="nav-link" href="pkg_cart.php"><img src="images/cart.png" height=30 width=30> Cart</a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">More</button>
                        <div class="dropdown-content">
                            <a href="search_booking.php">See Your Booking</a>
                            <!-- if user is admin then show admin panel link -->
                            <?php
                                if($_SESSION['user_type'] == 1 && isset($_SESSION['email'])) {
                                    echo "<a href='admin/booking_req.php'>Admin Panel</a>";
                                    // echo "<a href='show-cart.php'>Your Cart</a>";
                                }
                                else if($_SESSION['user_type'] == 0 || isset($_SESSION['email']) ){
                                    // echo "<a href='show-cart.php'>Your Cart</a>";
                                }
                            ?>
                        </div>
                    </div>
                </li>


                

                <?php
                  //Check session variable
                    if(isset($_SESSION['userId'])) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="profile_pic/<?php echo $_SESSION['pic']; ?>" width="30" height="30" class="rounded-circle">
                        </a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="profile.php">My Account</a>
                            <a class="dropdown-item" href="include/logout.inc.php">Log Out</a>
                        </div>
                    </li>
                <?php
                    }
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

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
