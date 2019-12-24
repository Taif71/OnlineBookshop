<?php
    session_start();
    require 'include/config.php'; //DB configuration & connect

    // check login status
    if(!isset($_SESSION['email'])){
		header("Location: ../index.php?error=loginerror");
		echo "You must login first";
		exit();
	}
    // include header and title
    include 'header.php';
    echo '<title>User Profile</title>';
?>
<body>
    <div id="page-container">
		<div class="row" >
			<div class="col-md-4"></div>
			<div class="col-md-4 center-content ">
				<?php
        			//Get all error message from url
					$error_msg = $error_pass = $email_taken = "";
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
						else if ($_GET['error'] == "emailtaken") {
							$email_taken = "Email is already taken!";

						}
					}
					$sql = "SELECT * FROM users WHERE  id=?";
					$stmt = mysqli_stmt_init($db_con);
					if (!mysqli_stmt_prepare($stmt , $sql)) {
						header("Location: profile.php?error=sqlerror");   //Redirect to smae page
						exit();
					}
					else{
						mysqli_stmt_bind_param($stmt, "s", $_SESSION['userId']);
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						if ($row = mysqli_fetch_assoc($result)) {
							$name = $row['fullName'];
							$uname = $row['uname'];
							$email = $row['email'];
							$pic = $row['picture'];
						}
						else{
							header("Location: profile.php?error=nouser");
							exit();
						}
					}
					//Close Db connection
					mysqli_stmt_close($stmt);
					mysqli_close($db_con);
				?>
				<center><img class="rounded-circle mb-5" src="profile_pic/<?php echo $pic;  ?>" alt="img" height=120 width=120 ></center>
                <center><b>User Name : </b><span><?php echo $uname; ?></span></center> </b>
                <center><b>Email : </b><span><?php echo $email; ?></span></center> </b>
				<form name="signup" action="include/update_prof.inc.php" class="loginForm"  method="post" enctype="multipart/form-data">
                    <h2>Account Info</h2><hr>
					<?php echo $_COOKIE['email']; ?>
					<div class="form-group">
				    	<label for="fullname">Full Name:</label>
				    	<input type="text" class="form-control" id="fullname" value="<?php echo $name; ?>"  name="fullname" required>
						<?php
							echo "<div class='invalid-feedback' style='display:block;'>".$error_msg."</div>";  //Show error message
						?>
				    </div>
                    <div class="form-group">
				    	<label for="uname">User Name : </label>
				    	<input type="text" class="form-control" id="uname" value="<?php echo $uname; ?>" name="uname" required>
						<?php
							echo "<div class='invalid-feedback' style='display:block;'>".$error_msg."</div>";  //Show error message
						?>
				    </div>
				    <div class="form-group">
				      <label for="email">Email:</label>
				      <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email" required>
					<?php
						echo "<div class='invalid-feedback' style='display:block;'>".$email_taken."</div>";  //Show error message
					?>
				    </div>
				    <input type="file" name="pro-pic" id="pro-pic" ><hr>
				    <button type="submit" name="update-submit" id="update-btn" class="btn  btn-block">Update Profile</button>
			  </form>
			</div>

		</div>
	</div>

   <?php
		include 'footer.php';
	?> 
</body>