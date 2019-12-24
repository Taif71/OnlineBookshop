<?php
	session_start();
	if(isset($_SESSION['email']) || isset($_SESSION['userId'])){
		header("Location: index.php?error=alreadysignin");
		echo "You must login first";
		exit();
	}

    // include header and title
    include 'header.php';
    echo '<title>SignUp Page</title>';
?>
<body>
	<div id="page-container">
		<div class="row" >
			<div class="col-md-3"></div>
			<div class="col-md-5 center-content">
				<h2><center>Registration</center></h2>
				<?php
        			//Get all error message from url
					$error_msg = $error_pass = $email_taken = $uname_taken = "";
					if(isset($_GET['error'])){
						if ($_GET['error'] == "nameerror") {
							$error_msg = "Name can have only alphabet!";
						}
						else if ($_GET['error'] == "passwordcheck") {
							$error_pass = "Check Password!";
						}
						else if ($_GET['error'] == "namepass") {
							$error_msg = "Name can have only alphabet!";
							$error_pass = "Check Password!";
						}
						else if ($_GET['error'] == "unametaken") {
							$uname_taken = "User Nameis already taken!";

						}
						else if ($_GET['error'] == "emailtaken") {
							$email_taken = "Email is already taken!";

						}
						else if ($_GET['error'] == "emailuname") {
							$uname_taken = "User Nameis already taken!";
							$email_taken = "Email is already taken!";

						}
						
					}
				?>
				<form name="signup" action="include/signup.inc.php" class="loginForm" onsubmit="return verifyForm()" method="post">
					<div class="form-group">
				    	<label for="fullName">Full Name:</label>
				    	<input type="text" class="form-control" id="fullnamne" placeholder="Enter Full Name" name="full-name" required>
						<?php
							echo "<div class='invalid-feedback' style='display:block;'>".$error_msg."</div>";  //Show error message
						?>
				    </div>
					<div class="form-group">
				    	<label for="uname">User Name :</label>
				    	<input type="text" class="form-control" id="uname" placeholder="Enter user name" onkeyup="check(this.value)" name="uname" required>
						<span id="inavalid_feed" ></span>
						<?php
							echo "<div class='invalid-feedback' style='display:block;'>".$uname_taken."</div>";  //Show error message
						?>
				    </div>
				    <div class="form-group">
				      <label for="email">Email:</label>
				      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
					<?php
						echo "<div class='invalid-feedback' style='display:block;'>".$email_taken."</div>";  //Show error message
					?>
				    </div>
				    <div class="form-group">
				      <label for="pwd">Password:</label>
				      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
				    </div>
					
				    <div class="form-group">
				      <label for="Rpwd">Retype Password:</label>
				      <input type="password" class="form-control" id="Rpwd" placeholder="Retype password" name="repass" required>
					  <div id="feedback"></div>
				    </div>
				    <button type="submit" name="signup-submit" id="register-btn" class="btn  btn-block">Register</button><hr>
					<p>Have an account? <a href="login.php">Sign in</a> </p>
			  </form>
			</div>
			<div class="col-md-3">
				<div class="form-group" id="pswd_info" style="margin-bottom:100px">
					<h4>Password must meet the following requirements:</h4>
					<ul id='info-list'>
						<li id="letter" class="invalid">At least one letter</li>
						<li id="capital" class="invalid">At least one capital letter</li>
						<li id="number" class="invalid">At least one number</li>
						<li id="length" class="invalid">At least 6 characters</li>
					</ul>
				</div>
			</div>

		</div>


	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/pswd.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/check.js"></script>
  <!-- Footer -->
	<?php
		include 'footer.php';
	?>
</body>
