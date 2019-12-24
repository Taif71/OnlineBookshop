<?php
	session_start();
	if(!isset($_SESSION['userId'])) {
		header("Location: ../index.php?error=loginerror");
		echo "You must login first";
		exit();
	}
    // include header and title
    include 'header.php';
    echo '<title>Booking request</title>';
?>
<body>
    


    <?php
		include 'footer.php';
	?>
</body>