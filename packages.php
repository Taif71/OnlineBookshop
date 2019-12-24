<?php

	require "include/config.php";
    // include header and title
    include 'header.php';
    echo '<title>Packages</title>';
?>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
					// Show alert when added to cart.
					if(isset($_GET["success"])){ 
						if($_GET['success'] == "1"){
							echo '
								<div class="alert alert-success alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								Item Added into Cart
								</div>';
						} 
					} 
			
					//fetch value from DB
					$sql = "SELECT id ,title, image_direct, detail, price FROM packages ORDER BY id ASC";
					$result = mysqli_query($db_con, $sql);
					$sl_no= 1;
					foreach($result as $books) //Itteration for all booking
					{
						// $packages instead of books
				?>
				<div class="pckg-card">
					<h3><center><?php echo $books['title'];?></center></h3>
					<div class="row">
						<div class="col-md-4">
							<!-- image directory -->
							<img src="admin/uploads/<?php echo $books['image_direct'];?>" class="pckg-img">
						</div>
						<div class="col-md-8">
							<p> <?php echo $books['detail'];?></p>
							<b><?php echo $books['price'];?></b>
							<!-- <a href='bookform.php' class="book-btn btn">Book Now</a> -->
							<form action="pkg_cart.php" method="post">
								<input type="hidden" name="p_id" value="<?php echo $books['id'];?>">
								<input type="hidden" name="p_name" value="<?php echo $books['title'];?>">
								<input type="hidden" name="price" value="<?php echo $books['price'];?>">
								<input type="submit" name="add-to-cart" class="book-btn btn" value="Add to Cart" >
							</form>
							
						</div>
					</div>
				</div>
				<?php
						$sl_no++; //Increase count
					}
				?>
			</div>

			

		</div>
	</div>
	<!-- Footer -->
	<?php
		include 'footer.php';
	?>
</body>
