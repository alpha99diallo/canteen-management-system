<?php
	require_once('includes/dbh.inc.php');
	require_once('classes/order.class.php');

	if(!isset($_SESSION['userLoginStatus'])) {
    header('Location: index.php');
  }

	$order = new Order($conn);

	$listOrders = $order->displayMyOrders($_SESSION['userId']);

	if(isset($listOrders)) {
		$totalOrders = count($listOrders);
	}
	else {
		$totalOrders = 0;
	}

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
	<title>My Orders | Alpha's Canteen</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">

</head>

<body>
  <header id="pb-navbar" class="top-navbar">
    <nav  class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <span class="img-fluid" style="padding-right:20px">
            <a href="index.php">
              <span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;font-size: 30px;">Alpha's</span><span style="font-family: snellroundhandw01-scrip,cursive;font-size: 30px;">Canteen</span>
            </a>
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars-rs-food">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <?php
                if(!isset($_SESSION['userLoginStatus'])) {
                  echo '
                    <li class="nav-item"><a class="nav-link" href="signin.php">Sign Up</a></li>
                  ';
                } else {
                  echo '
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" id="dropdown-a" data-toggle="dropdown">
                      <span style="font-family: snellroundhandw01-scrip,cursive;color: #181818;">Hello</span>
                      ,&nbsp;<span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;"> '.$_SESSION['userName']."
                      </span>
                      </a>
                      <div class='dropdown-menu' aria-labelledby='dropdown-a'>
        								<a class='dropdown-item' href='myOrders.php'>Orders</a>
        								<a class='dropdown-item' href='includes/logout.inc.php?logout'>Log out</a>
        							</div>
                    </li>
                    ";
                }
              ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>My Orders(<?php echo $totalOrders; ?>)</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

  <section>
        <div class="container" style="padding:50px;">
          <div class="row">
            <!-- <div class="col-lg-8"> -->
              <div class="table-responsive">
                <table class="table cart-table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
											<th scope="col">#orderId</th>
                      <th scope="col">Date</th>
                      <th scope="col">Price(Rs)</th>
                      <th scope="col">Payment</th>
                      <th scope="col">Status</th>
											<th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php
											if(isset($listOrders)) {
												for($i = 0; $i < count($listOrders); $i++) {
			                    $id = $i + 1;
													$orderId = $listOrders[$i]["orderId"];
			                    $date = $listOrders[$i]["orderDate"];
			                    $amount = $listOrders[$i]["orderAmount"];
			                    $status = $listOrders[$i]["orderStatus"];
			                    $payment = $listOrders[$i]["orderPayment"];
			                    echo '
			                      <tr>
			                        <td>'.$id.'</td>
															<td>#'.$orderId.'</td>
			                        <td>'.$date.'</td>
			                        <td>'.$amount.'</td>
			                        <td>'.$payment.'</td>
			                        <td>'.$status.'</td>
			                        <td><a href="">details</a></td>
			                      </tr>
			                    ';
			                  }
											}
		                 ?>
                  </tbody>
              </table>
            </div>
          <!-- </div> -->
          </div>
        </div>
      </section>


  <?php require 'footer.php' ?>

</body>
</html>
