<?php
	// session_start();
	// if($_SESSION['user_type'] != 1 && !isset($_SESSION['email'])) {
	// 	header("Location: ../index.php?error=loginerror");
	// 	echo "You must login first";
	// 	exit();
	// }
	// else if(!isset($_SESSION['email'])){
	// 	header("Location: ../index.php?error=loginerror");
	// 	echo "You must login first";
	// 	exit();
	// }
    // include header and title
    include 'header.php';
    echo '<title>Contact Page</title>';
?>
<body>
	<div class="container-fluid">
		<h1 class="text-center">Contact With Us</h1>
		<div class="row contact">
			<!-- <div class="col-md-1"></div> -->
			<div class="col-md-5">
				<h2><center>Contact</center></h2>
				<form name="commentForm" action="include/comment.inc.php" class="" onsubmit="return verifyComment()" method="post">
					<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
					<!-- <div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div> -->
					</div>
					<div class="form-group">
					<label for="comments">Comments:</label>
					<textarea type="text" class="form-control" rows="6" id="comments" placeholder="Type Your Message.." name="comment" required></textarea>
					<div id="feedback"></div>
					</div>
					<button type="submit" name="comment-submit" class="btn btn-block">Submit</button>
				</form>
			</div>
			<div class="col-md-7">
				<!-- <div id="map"></div> -->
				<div class="mapouter">
					<div class="gmap_canvas">
						<iframe width="797" height="579" id="gmap_canvas" src="https://maps.google.com/maps?q=northsouth&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"></iframe>
						<a href="https://www.whatismyip-address.com"></a>
					</div>
					<style>
					.mapouter{position:relative;text-align:right;}
					.gmap_canvas {overflow:hidden;background:none!important;}
					</style>
				</div>
			</div>
		</div>
	</div>
	<script>
    	var map;
    	function initMap() {
	        map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: -23.684994, lng: 90.356331},
	          zoom: 8
	        });
    	}
    </script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAKcAkDvv6dsATz8BJNj4dciYmElHRfz4&callback=initMap"
	    async defer></script>
	<script type="text/javascript" src="js/main.js"></script>
	<?php
		include 'footer.php';
	?>
</body>