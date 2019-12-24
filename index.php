<?php
    
  // include header and title
  include 'header.php';
  echo '<title>Home Page</title>';
?>

<body>
  	<div class="container-fluid" id="page-container">
  		<div class="row">
        	<!-- Home Page Crasue -->
  			<div class="col-md-12 slider">
  				<?php
	  				// Show alert when logged out.
					if(isset($_GET["logout"])){
						if($_GET['logout'] == "success"){
							echo '
								<div class="alert alert-success alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								Loggout successfully..
								</div>';
						}
					}
  				?>
  				<div id="demo" class="carousel slide" data-ride="carousel">
					<ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
						<li data-target="#demo" data-slide-to="2"></li>
					</ul>   
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="images/slidex1.jpg" class="" alt="Los Angeles" width="100%" height="600">
							<div class="carousel-caption">
								
							</div>   
						</div>
						<div class="carousel-item">
							<img src="images/slidex2.jpg" class="" alt="Chicago" width="100%" height="600">
							<div class="carousel-caption">
								
							</div>   
						</div>
						<div class="carousel-item">
							<img src="images/slidex3.jpg" class="" alt="New York" width="100%" height="600">
							<div class="carousel-caption">
								
							</div>   
						</div>
              		</div>
              		<a class="carousel-control-prev" href="#demo" data-slide="prev">
                		<span class="carousel-control-prev-icon"></span>
              		</a>
              		<a class="carousel-control-next" href="#demo" data-slide="next">
                		<span class="carousel-control-next-icon"></span>
              		</a>
            	</div>
  			</div>
  		</div>
    	<hr>
		<h1 class="text-center">Some OF OUR BOOKS IN COLLECTION</h1><br>
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="card">
					<img src="images/book1.jpg" height=200 class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Models</h5>
						<p class="card-text">Some quick example text to build on the card title and make up 
							the bulk of the card's content. <span id="dots">...</span><span id="more" style="display:none;">Lorem ipsum, dolor sit amet consectetur 
							adipisicing elit. Cupiditate fugit commodi placeat autem deserunt itaque asperiores aliquid ut labore incidunt?</span></p>
							<button onclick="more_btn()" id="more-btn" class="btn btn-primary">Read More</button>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card"  >
					<img src="images/bold.jpg" height=200 class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Bold</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span id="dots">...</span><span id="more" style="display:none;">Lorem ipsum, dolor sit amet consectetur 
							adipisicing elit. Cupiditate fugit commodi placeat autem deserunt itaque asperiores aliquid ut labore incidunt?</span></p>
							<button onclick="more_btn()" id="more-btn" class="btn btn-primary">Read More</button>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card"  >
					<img src="images/ego.jpg" height=200 class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Ego</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span id="dots">...</span><span id="more" style="display:none;">Lorem ipsum, dolor sit amet consectetur 
							adipisicing elit. Cupiditate fugit commodi placeat autem deserunt itaque asperiores aliquid ut labore incidunt?</span></p>
							<button onclick="more_btn()" id="more-btn" class="btn btn-primary">Read More</button>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card"  >
					<img src="images/subtle.png" height=200 class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">The Subtle Art of Not Giving a F*</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary"> See more..</a>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h1 class="text-center">SOME OF OUR NEW BOOKS IN OUR COLLECTION</h1><br>
		<div class="row mb-5">
			<div class="col-md-3 col-sm-6">
				<div class="card"  >
					<img src="images/harry.jpg" height=200 class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary"> See more..</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card"  >
					<img src="images/musk.jpg" height=200 class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary"> See more..</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card"  >
					<img src="images/Nietzsche.jpg" height=200 class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary"> See more..</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card"  >
					<img src="images/php.jpg" height=200 class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary"> See more..</a>
					</div>
				</div>
			</div>
		</div>
		<?php
		include 'footer.php';
		?>
	</div>
</body>
</html>