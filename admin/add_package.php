<?php
    session_start();
    require '../include/config.php'; //DB configuration & connect

    // Authenticate user.
	if($_SESSION['user_type'] != 1) {
		header("Location: ../index.php?error=loginerror"); //Redirect to home page.
		print_r("<script>alert('You must login first!');</script>");
		exit();
    }
    // check login status
	else if(!isset($_SESSION['email'])){
		header("Location: ../index.php?error=loginerror");
		echo "You must login first";
		exit();
	}
    // include header and title
    include 'admin_header.php';
    echo '<title>Add Package</title>';
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="admin_include/package_upload.php" class="" method="post" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="title">Title:</label>
				      <input type="text" class="form-control" id="title" placeholder="Set title.." name="title" required>
				    </div>
				    <div class="form-group">
                      <label for="info">Details:</label>
                      <textarea class="form-control" name="detail" id="detail" cols="30" rows="10" placeholder="Add details.." required></textarea>
				    </div>
				    <div class="form-group">
				      <label for="price">Price:</label>
				      <input type="text" class="form-control" id="price" placeholder="Add price" name="price" required>
                    </div>
                    <input type="file" name="fileToUpload" id="fileToUpload">
				    <button type="submit" name="package-submit" class="btn add-btn">Add</button>
			    </form>
            </div>
        </div>
    </div>

	<?php
        include "admin_footer.php";
    ?>
</body>
