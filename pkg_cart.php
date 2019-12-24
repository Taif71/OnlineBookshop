<?php
	
	// include header and title
    include 'header.php';
	require "include/config.php";
    echo '<title>Packages</title>';
?>
<body>
	<div class="container">
		<div class="row">
			<?php 
			if(isset($_POST["add-to-cart"])){
				$message = '';
				if(isset($_COOKIE["shopping_cart"])){
					$cookie_data = stripslashes($_COOKIE['shopping_cart']);

					$cart_data = json_decode($cookie_data, true);
				}
				else{
					$cart_data = array();
				}

				$item_id_list = array_column($cart_data, 'id');

				if(in_array($_POST["p_id"], $item_id_list)){
					foreach($cart_data as $keys => $values){
						if($cart_data[$keys]["id"] == $_POST["p_id"]){
							$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
						}
					}
				}
				else{
					$pkg_array = array(
						"id" => $_POST['p_id'],
						"name" => $_POST['p_name'],
						"price" => $_POST['price']
					);
		
					$cart_data[] = $pkg_array;
				}
				
				$pkg_data = json_encode($cart_data);
				setcookie('shopping_cart', $pkg_data, time() + (86400 * 30), "/");
				header("location: packages.php?success=1");
				echo "<script>alert('Helloooo')</script>";
			}
			if(isset($_GET["action"])){
				if($_GET["action"] == "delete"){
					$cookie_data = stripslashes($_COOKIE['shopping_cart']);
					$cart_data = json_decode($cookie_data, true);
					foreach($cart_data as $keys => $values)
					{
						if($cart_data[$keys]['id'] == $_GET['id'])
						{
							unset($cart_data[$keys]);
							$item_data = json_encode($cart_data);
							setcookie("shopping_cart", $item_data, time() + (86400 * 30), "/");
							header("location:pkg_cart.php?remove=1");
						}
					}
				}
			}
			if(isset($_GET["success"])){
				$message = '
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Item Added into Cart
				</div>
				';
			}
			if(isset($_GET["remove"]))
			{
				$message = '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Item removed from Cart
				</div>
				';
			}
		?>
			<h3>Order Details</h3>
			<div class="table-responsive">
				<?php echo $message; ?>
				<table class="table table-bordered">
					<tr>
					<th width="40%">Package Name</th>
					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
					</tr>
				<?php
					if(isset($_COOKIE["shopping_cart"]))
					{
						$total = 0;
						$cookie_data = stripslashes($_COOKIE['shopping_cart']);
						$cart_data = json_decode($cookie_data, true);
						foreach($cart_data as $keys => $values)
						{
				?>
						<tr>
						<td><?php echo $values["name"]; ?></td>
						<td>$ <?php echo $values["price"]; ?></td>
						<td>$ <?php echo number_format($values["price"], 2);?></td>
						<td><a href="pkg_cart.php?action=delete&id=<?php echo $values["id"]; ?>"><span class="text-danger">Remove</span></a></td>
						</tr>
				<?php 
						$total = $total + ($values["price"]);
						}
				?>
						<tr>
						<td colspan="2" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
						</tr>
				<?php
					}
					else{
				?>
						<tr>
						<td colspan="5" align="center">No Item in Cart</td>
						</tr>
				<?php
					}
				?>
				</table>
				<a href="bookform.php?total=<?php echo number_format($total, 2); ?>" style="float:right;"><img src="images/cart.png"> Checkout</a>
			</div>
			<?php include "show-cart.php"; ?>
		</div>
	</div>
	<!-- Footer -->
	<?php
		include 'footer.php';
	?>
</body>
	