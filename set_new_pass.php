<?php
    session_start();
    require 'include/config.php'; //DB configuration & connect

    // check login status
    if(isset($_SESSION['email'])){
		header("Location: ../index.php?error=youareloggedin");
		exit();
	}
    // include header and title
    include 'header.php';
    echo '<title>User Profile</title>';
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 center-content">
                <form class="login-form" action="include/reset_password.inc.php" method="post">
                    <h2 class="form-title">Reset password</h2><hr>
                    <div class="form-group">
                        <label for="pwd">New Password</label>
				        <input type="password" class="form-control" id="pwd" placeholder="Enter Email" name="pwd" required>
                    </div>
                    <div class="form-group">
                        <label for="cpwd">Confirm Password</label>
				        <input type="password" class="form-control" id="cpwd" placeholder="Enter Email" name="cpwd" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="reset-password" class="login-btn">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    
</body>