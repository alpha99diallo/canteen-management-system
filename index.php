<?php
	require_once('includes/dbh.inc.php');
	require_once('classes/categories.class.php');
	require_once('classes/dishes.class.php');

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

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">

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
							<p class="m-b-40">
								See and enjoy the best dishes all week long.
							</p>
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
							<p class="m-b-40">
								See and enjoy the best dishes all week long.
							</p>
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
						<p>You can find in alpha's canteen all the best dishes all around the
						world from the continent of America to the coninent of Australia / oceania
					 	going through the amazing continents of Asia and Africa.</p>
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
				<div class="col-lg-12">
					<div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Monday</a>
						<a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Tuesday</a>
						<a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Wednesday</a>
						<a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Thursday</a>
						<a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Friday</a>
						<a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Saturday</a>
						<a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Sunday</a>
					</div>
				</div>
			</div>

			<br>

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

				<div class="col-10">
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
													<a class="btn-cart btn btn-primary btn-animated mx-3" style="background-color:#900C3F;color: white;" href="includes/addToCart.inc.php?id='.$fetchDishesPerCategory[$j]['dishId'].'&quantity=1&name='.$fetchDishesPerCategory[$j]['dishName'].'&price='.$fetchDishesPerCategory[$j]['dishPrice'].'">
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

			</div>

		</div>
	</div>
	<!-- End Menu -->
	<?php
		if(isset($_GET['order'])) {
			if($_GET['order'] === 'success') {
				$orderId = $_GET['orderId'];
				echo '
				<div class="row">
					<div class="wrongpwd-box flash-error" style="width: 30%;background: #4fc879; border-color: #4a934a;">
						<center>
							<p class="error" style="color: black;">
								Your order has been placed successfully!<br>
								Order No: '.$orderId.'<br>
								<a href="includes/cancelOrder.inc.php?id='.$orderId.'" style="color: red;">Cancel Order</a>
							</p>
						</center>
					</div>
				</div>
				';
			}
			elseif ($_GET['order'] === 'cancel') {
				echo '
				<div class="row">
					<div class="wrongpwd-box flash-error" style="width: 30%;">
						<center>
							<p class="error" style="color: black;">
								Your order has been Cancelled!<br>
							</p>
						</center>
					</div>
				</div>
				';
			}
			elseif ($_GET['order'] === 'completed') {
				echo '
				<div class="row">
					<div class="wrongpwd-box flash-error" style="background: #4fc879; border-color: #4a934a; width: 30%;">
						<center>
							<p class="error" style="color: black;">
								Cannot cancel the order<br>
								Your order has been Completed!<br>
							</p>
						</center>
					</div>
				</div>
				';
			}
		}
	 ?>


	<div id="section-cart" class="row">
		<div class="col-lg-12">
			<div class="container h-100 d-flex justify-content-center align-items-center" >
				<div class="card text-center" style="width: 40%;">
					<div class="card-title">
						<h3 class="card-header">Cart</h3>
					</div>
					<div class="">
						<table class="table">
							<thead>
								<tr>
									<th>Product</th>
									<th>Q</th>
									<th>Price(rs)</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!isset($_SESSION["cart"])) {
									echo '<tr>Your cart is empty!</tr>';
								} else {
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
											<td>'.$dishPrice.'</td>
											<td><a href="includes/deleteCart.inc.php?id='.$dishId.'">delete</a></td>
										</tr>
										';
									}
								}
								 ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Total(rs): <?php echo $total; ?></th>
								</tr>
							</tfoot>
						</table>
						<a style="background-color: #900C3F;color: white;" data-toggle="modal" href="#exampleModalCenter" class="btn btn-primary btn-block">Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Start Footer -->
	<?php require 'footer.php' ?>
	<?php require 'order.php'; ?>
	<!-- End Footer -->

</body>

</html>
