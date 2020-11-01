<?php
	require_once('includes/dbh.inc.php');
	require_once('classes/categories.class.php');
	require_once('classes/dishes.class.php');

  if(!isset($_GET['day'])) {
    header('Location: index.php');
  }
	// creation of object
	$categories = new Categories($conn);
	$dishes = new Dishes($conn);

  $day = $_GET['day'];

	$dataFetched = $categories->fetchCategories();
	$fetchDishesPerDay = $dishes->fetchDishesPerDay($day);
	$fetchTodaySpecial = $dishes->fetchTodaySpecial($day);

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
	<title>Menu | Alpha's Canteen</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">

</head>

<body>
  <?php require 'header.php' ?>

  <!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
          <?php
            switch ($day) {
              case 'Mon':
                echo '
                  <h1>Menu(Monday)</h1>
                ';
                break;

              case 'Tues':
                echo '
                  <h1>Menu(Tuesday)</h1>
                ';
                break;

              case 'Wed':
                echo '
                  <h1>Menu(Wednesday)</h1>
                ';
                break;

              case 'Thu':
                echo '
                  <h1>Menu(Thursday)</h1>
                ';
                break;

              case 'Fri':
                echo '
                  <h1>Menu(Friday)</h1>
                ';
                break;

              case 'Sat':
                echo '
                  <h1>Menu(Saturday)</h1>
                ';
                break;

              case 'Sun':
                echo '
                  <h1>Menu(Sunday)</h1>
                ';
                break;

              default:
                echo '
                  <h1>Menu</h1>
                ';
                break;
            }
           ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

  <!-- Start Menu -->
  <div id="section-menu" class="menu-box">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <div class="heading-title text-center">
            <p>You will find in here a variety of dishes all available in the canteen</p>
          </div>
        </div>
      </div>
      <br>

      <div id="Mon" role="tabpanel" aria-labelledby="Mon" class="row inner-menu-box tab-pane fade show active">
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
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-todayspecial" role="tab" aria-controls="v-pills-todayspecial" aria-selected="false">Today's Special</a>
          </div>
        </div>
        <div class="col-10">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                <?php
                  for($i = 0; $i < count($fetchDishesPerDay); $i++) {
                    echo '
                    <div class="col-lg-4 col-md-6 special-grid drinks">
                      <div class="gallery-single fix">
                        <img src="'.$fetchDishesPerDay[$i]['dishImage'].'" class="img-fluid" alt="Image">
                        <div class="why-text">
                          <h4>'.$fetchDishesPerDay[$i]['dishName'].'</h4>
                          <p>'.$fetchDishesPerDay[$i]['dishDescription'].'</p>
                          <div class="remember-checkbox d-flex align-items-center justify-content-between">
                            <h5> Rs.'.$fetchDishesPerDay[$i]['dishPrice'].'</h5>
                            <a class="btn-cart btn btn-primary btn-animated mx-3" style="background-color:#900C3F;color: white;" href="includes/addToCart.inc.php?id='.$fetchDishesPerDay[$i]['dishId'].'&quantity=1&name='.$fetchDishesPerDay[$i]['dishName'].'&price='.$fetchDishesPerDay[$i]['dishPrice'].'">
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
                $fetchDishesPerCategory = $dishes->fetchDishesPerCategory($dataFetched[$i]["catId"],$day);
                for($j = 0; $j < count($fetchDishesPerCategory); $j++) {
                  echo '
                  <div class="col-lg-4 col-md-6 special-grid drinks">
                    <div class="gallery-single fix">
                      <img src="'.$fetchDishesPerCategory[$j]['dishImage'].'" class="img-fluid" alt="Image">
                      <div class="why-text">
                        <h4>'.$fetchDishesPerCategory[$j]['dishName'].'</h4>
                        <p>'.$fetchDishesPerCategory[$j]['dishDescription'].'</p>
                        <div class="remember-checkbox d-flex align-items-center justify-content-between">
                          <h5> Rs.'.$fetchDishesPerCategory[$j]['dishPrice'].'</h5>
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
						 <div class="tab-pane fade" id="v-pills-todayspecial" role="tabpanel" aria-labelledby="v-pills-todayspecial-tab">
               <div class="row">
                 <?php
                   for($i = 0; $i < count($fetchTodaySpecial); $i++) {
                     echo '
                     <div class="col-lg-4 col-md-6 special-grid drinks">
                       <div class="gallery-single fix">
                         <img src="'.$fetchTodaySpecial[$i]['dishImage'].'" class="img-fluid" alt="Image">
                         <div class="why-text">
                           <h4>'.$fetchTodaySpecial[$i]['dishName'].'</h4>
                           <p>'.$fetchTodaySpecial[$i]['dishDescription'].'</p>
                           <div class="remember-checkbox d-flex align-items-center justify-content-between">
                             <h5> Rs.'.$fetchTodaySpecial[$i]['dishPrice'].'</h5>
                             <a class="btn-cart btn btn-primary btn-animated mx-3" style="background-color:#900C3F;color: white;" href="includes/addToCart.inc.php?id='.$fetchTodaySpecial[$i]['dishId'].'&quantity=1&name='.$fetchTodaySpecial[$i]['dishName'].'&price='.$fetchTodaySpecial[$i]['dishPrice'].'">
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
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End Menu -->

  <!-- Start of cart -->

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
						<?php
							if(!isset($_SESSION["cart"])) {
								echo '
									<h3 class="card-header">Cart(0)</h3>
								';
							}
							else {
								echo '
									<h3 class="card-header">Cart('.count($_SESSION["cart"]).')</h3>
								';
							}
						 ?>
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
						<?php
							if(!isset($_SESSION["cart"]) || count($_SESSION["cart"])==0 ) {
							}
							else {
								echo '
									<a style="background-color: #900C3F;color: white;" data-toggle="modal" href="#exampleModalCenter" class="btn btn-primary btn-block">
										Order
									</a>
								';
							}
						 ?>
					</div>
				</div>
			</div>
		</div>
	</div>

  <!-- End of cart -->

  <?php require 'footer.php' ?>
  <?php require 'modal/order.modal.php'; ?>


</body>
</html>
