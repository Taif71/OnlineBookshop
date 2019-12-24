<?php
    
    // include header and title
    include 'header.php';
    echo '<title>Search Booking</title>';
?>
<body>
    <div id="page-container">
        <div class="row" >
            <div class="col-md-4">	</div>
            <div class="col-md-3 center-content">
                <h2><center>Search Your Book Order</center></h2>
                <?php
				//Get all error message from url
					$error_msg = $error_info = "";
					if(isset($_GET['error'])){
						if ($_GET['error'] == "infoerror") {
							$error_info = "Please check your email or phone.May be you don't booked yet!";
                        }
                        else if($_GET['error'] == "loginerror"){
                            $error_info = "You have to log in first to check your booking!";
                        }
					}
				?>
                <form action="include/search_booking.inc.php" class="loginForm" method="post">
                    <?php
						echo "<div class='invalid-feedback' style='display:block;'>".$error_info."</div>";  //Show error message
					?>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone" required>
                    </div>
                    <button type="submit" name="search-submit" class="btn btn-block">Search</button>
                </form>
            </div>
            <div class="col-md-4">	</div>
        </div>
    </div> 
      <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>