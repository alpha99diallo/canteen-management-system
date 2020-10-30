<?php
	require_once('includes/dbh.inc.php');
	require_once('classes/categories.class.php');
	require_once('classes/dishes.class.php');

	// error_reporting(E_ALL & ~E_NOTICE);

	// creation of object
	$categories = new Categories($conn);
	$dishes = new Dishes($conn);

	$dataFetched = $categories->fetchCategories();
	$fetchingAllDishes = $dishes->fetchAllDishes();
	$total=0;


 ?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>Home | Canteen Management System</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

</head>

<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">
	<!-- Start header -->
	<?php require 'header.php' ?>
	<!-- End header -->

	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="images/slider-01.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Alpha's Canteen</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view <br>
								trends to see any changes in performance over time.</p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="images/slider-01.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Alpha's Canteen</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view <br>
								trends to see any changes in performance over time.</p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->

	<!-- Start About -->
	<div id="section-about" class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Welcome To <span>Alpha's Canteen</span></h1>
						<h4>Little Story</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et
							sem. </p>
						<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/about-img.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

	<!-- Start Menu -->
	<div id="section-menu" class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Menu</h2>
						<p>You will find in here a variety of dishes all available in the canteen</p>
					</div>
				</div>
			</div>

			<div class="row inner-menu-box">
				<div class="col-2">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
						<?php
							for($i = 0; $i < count($dataFetched); $i++) {
								echo '
								<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-'.$dataFetched[$i]["catSlug"].'" role="tab" aria-controls="v-pills-'.$dataFetched[$i]["catSlug"].'" aria-selected="false">'.$dataFetched[$i]["catName"].'</a>
								';
							}
						 ?>
						<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Today's Special</a>
					</div>
				</div>

				<div class="col-8">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<?php
									for($i = 0; $i < count($fetchingAllDishes); $i++) {
										echo '
										<div class="col-lg-4 col-md-6 special-grid drinks">
											<div class="gallery-single fix">
												<img src="'.$fetchingAllDishes[$i]['dishImage'].'" class="img-fluid" alt="Image">
												<div class="why-text">
													<h4>'.$fetchingAllDishes[$i]['dishName'].'</h4>
													<p>'.$fetchingAllDishes[$i]['dishDescription'].'</p>
													<div class="remember-checkbox d-flex align-items-center justify-content-between">
														<h5> $'.$fetchingAllDishes[$i]['dishPrice'].'</h5>
														<a class="btn-cart btn btn-primary btn-animated mx-3" style="background-color:#900C3F;color: white;" href="includes/addToCart.inc.php?id='.$fetchingAllDishes[$i]['dishId'].'&quantity=1&name='.$fetchingAllDishes[$i]['dishName'].'&price='.$fetchingAllDishes[$i]['dishPrice'].'">
															<i class="fa fa-shopping-cart"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
										';
									}
								 ?>
							</div>
						</div>
						<?php
							for($i = 0; $i < count($dataFetched); $i++) {
								echo '
								<div class="tab-pane fade" id="v-pills-'.$dataFetched[$i]["catSlug"].'" role="tabpanel" aria-labelledby="v-pills-'.$dataFetched[$i]["catSlug"].'-tab">
									<div class="row">
										<!-- breakfast -->
								';
								$fetchDishesPerCategory = $dishes->fetchDishesPerCategory($dataFetched[$i]["catId"]);
								for($j = 0; $j < count($fetchDishesPerCategory); $j++) {
									echo '
									<div class="col-lg-4 col-md-6 special-grid drinks">
										<div class="gallery-single fix">
											<img src="'.$fetchDishesPerCategory[$j]['dishImage'].'" class="img-fluid" alt="Image">
											<div class="why-text">
												<h4>'.$fetchDishesPerCategory[$j]['dishName'].'</h4>
												<p>'.$fetchDishesPerCategory[$j]['dishDescription'].'</p>
												<div class="remember-checkbox d-flex align-items-center justify-content-between">
													<h5> $'.$fetchDishesPerCategory[$j]['dishPrice'].'</h5>
													<a class="btn-cart btn btn-primary btn-animated mx-3" style="background-color:#900C3F;color: white;" name="addcart">
														<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									';
								}
								echo '
									</div>
								</div>
								';
							}
						 ?>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="card text-center" style="width: 100%;">
						<div class="card-title">
							<h3 class="card-header">Cart</h3>
						</div>
						<div class="">
							<table>
								<thead>
									<tr>
										<th>Product</th>
										<th>Q</th>
										<th>Price(rs)</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($_SESSION["cart"] as $product){
										$dishQuantity=$product['quantity'];
                    $dishId = $product['pid'];
										$dishName = $product['name'];
										$dishPrice = $product['price'];
										$total += ((float)$dishQuantity*(float)$dishPrice);

										echo '
										<tr>
											<td>'.$dishName.'</td>
											<td>'.$dishQuantity.'</td>
											<td> '.$dishPrice.'</td>
										</tr>
										';
									}
									 ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Total(rs): <?php echo $total; ?></th>
									</tr>
								</tfoot>
							</table>
							<a style="background-color: #900C3F;color: white;" href="includes/deleteCart.inc.php?id=4" class="btn btn-primary btn-block">Order</a>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
	<!-- End Menu -->

	<!-- Start Contact info -->
	<div id="section-contact" class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone" style="color: #900C3F;"></i>
					<div class="overflow-hidden">
						<h4>Help Line</h4>
						<p class="lead">
							+91 9886837714
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope" style="color: #900C3F;"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							alpha2779@gmail.com
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->

	<!-- Start Footer -->
	<?php require 'footer.php' ?>
	<!-- End Footer -->

</body>

</html>
