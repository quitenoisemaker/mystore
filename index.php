<?php
include ("function/function.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>

  <html lang="eng">
  <meta charset="utf-8">
  <meta name="viewpoint" content="width=device-width" initial-scale="1">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css" >
   <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.grid.css">
   <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.grid.min.css" >
  <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
  <script src="bootstrap-4.5.0-dist/js/bootstrap.js"></script>
  <script src="bootstrap-4.5.0-dist/js/bootstrap.bundle.js"></script>
  <script src="bootstrap-4.5.0-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.13.0-web/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/simple-lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="css/style4.css">
</head>

<body id="home">


	<nav class="navbar">
		<div class="container">
			<h1 class="logo">Phono</h1>
			<ul class="nav">
				<li><a href="#home">Home</a></li>
				<li><a href="#about">About</a></li>
			</ul>
		</div>
	</nav>

	<!-- showcase -->

	<section class="section-a">
		<div class="container">
			<div>
				<h1><b><?php echo getTitle(); ?></b></h1>
				<p> <?php echo getDes(); ?></p>

				<span style="color: red"><i><b>Get it for the promo price</b></i></span>

				<h2 style="padding: 10px"><b>NGN <?php echo getPrice(); ?></b></h2>

				<a href="order_page.php" class="btn">Order yours now</a>
			</div>

			<?php getMainPic(); ?>
			<!-- <img src="img/1.jpg"> -->
		</div>
	</section>

	<section class="section-b">
		<div class="overlay">
			<div class="section-b-inner container">
				<h2 style="">Reasons to by this product</h2>
				<ul>
					<li><i class=""></i><?php echo getReason1(); ?></li>
				
					<li><i class=""></i><?php echo getReason2(); ?></li>
				
					<li><i class=""></i><?php echo getReason3(); ?></li>
				
					<li><i class=""></i><?php echo getReason4(); ?></li>
					
					<li><i class=""></i><?php echo getReason5(); ?></li>
					
				</ul>
				<div class="bt">

					<span style="color: red"><i><b>Get it for the promo price</b></i></span>

				<h2 style="padding: 5px; font-size: 2rem"><b>NGN 3,000.00</b></h2>

			<a href="order_page.php" class="btn" style="">Order yours now</a>
			</div>
			</div>
		</div>

			
			
	</section>

	<!-- overlay text -->


	<!-- Gallery -->
	<section class="section-c">
		<div class="gallery">

			<?php getPic1(); ?>
			<?php getPic2(); ?>
			<?php getPic3(); ?>
			<?php getPic4(); ?>
			<?php getPic5(); ?>

		</div>
	</section>
	<!-- footer -->

	<footer class="section-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					
				</div>
			<div class="col-sm-6 text-center">
				<h3>Subscribe</h3>
				<p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<form name="email-form" method="POST">
					<div class="email-form">
						<span class="form-control-wrap">
							<input type="email" name="email" id="email" size="40" class="form-control" placeholder="Email">
						</span>
						<button type="submit" class="form-control submit">
							<i class="fas fa-chevron-right"></i>
						</button>
					</div>
					
				</form>
			</div>

			<div class="col-sm-3">
					
				</div>
			</div>

		</div>
	</footer>





	
	<script src="js/simple-lightbox.min.js"></script>
	<script>
		var lightbox = new SimpleLightbox('.gallery a', { /* options */ });
	</script>
</body>
</html>