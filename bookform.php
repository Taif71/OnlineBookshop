<?php

    // include header and title
    include 'header.php';
    echo '<title>Order Form</title>';
?>
<body>
    <div id="page-container">
        <div class="row" >
            <div class="col-md-4">	</div>
            <div class="col-md-4 center-content">
                <h2><center>Order Info</center></h2><hr>
                <?php
                  //Get error message from url
                    $error_name = $error_phone = "";
                    if(isset($_GET['error'])){
                        if ($_GET['error'] == "nameerror") {
                            $error_name = "Name can have only alphabet!";
                        }
                        else if ($_GET['error'] == "invalidphone") {
                            $error_phone = "Invalid Phone Number!";
                        }
                        else if($_GET['error'] == "namephone"){
                            $error_name = "Name can have only alphabet!";
                            $error_phone = "Invalid Phone Number!";
                        }
                    }
                ?>
                <div class="text-center">
                    <?php 
                        //echo '<h5>Your Packages</h5>';
                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                        $cart_data = json_decode($cookie_data, true);
                        foreach($cart_data as $keys => $values)
                    {
                        echo $values['name']."<br>";
                    }
                    ?>
                </div>
                <form name="bookform" action="include/booking.inc.php" class="loginForm"  method="post">
                    <div class="form-group">
                        <label for="fullName">Full Name:</label>
                        <input type="text" class="form-control" id="fullnamne" placeholder="Enter Full Name" name="fullname" required>
                        <?php
                        //Show error message
                            echo "<div class='invalid-feedback' style='display:block;'>".$error_name."</div>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone" required>
                        <?php
                        //Show error message
                            echo "<div class='invalid-feedback' style='display:block;'>".$error_phone."</div>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Your Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Type your address.." name="address">
                        <?php
                            // echo "<div class='invalid-feedback' style='display:block;'>".$error_pass."</div>";
                        ?>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="person">Number of copies:</label>
                        <select class="selectbox" name="person" required>
                            <option value="blank">0</option>
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4"> 4 </option>
                            <option value="5"> 5 </option>
                            <option value="6"> 6 </option>
                            <option value="above6"> Above 6 </option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <?php $amount = $_GET['total']; ?>
                        <label for="amount">Amount:</label>
                        <input type="text" class="form-control" id="amount" placeholder="" name="amount" value="$<?php echo $amount ; ?>" readonly>
                    </div>
                    <button type="submit" name="booking-submit" id="book-btn" class="btn btn-block">Order Now</button>
                </form>
            </div>
            <div class="col-md-4">	</div>

        </div>


    </div>
    <!-- //include footer -->
    <?php
		  include 'footer.php';
	   ?>
</body>
