<?php
  require_once('../includes/dbh.inc.php');
  require_once('../classes/order.class.php');

  if(!isset($_SESSION['adminLoginStatus'])) {
    header('Location: login.php');
  }

  $order = new Order($conn);

  $listOrders = $order->displayOrders();

  // TODO: implement details for orders using a modal
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
	<title>Orders | Canteen Management System</title>

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="../css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css">

</head>

<body>
  <?php include 'includes/header.inc.php' ?>

  <div class="all-page-title page-breadcrumb" style="background: grey;padding:120px;">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Orders(<?php echo count($listOrders); ?>)</h1>
				</div>
			</div>
		</div>
	</div>

  <section>
    <div class="container" style="padding:50px;">
      <div class="row">
        <!-- <div class="col-lg-8"> -->
          <div class="table-responsive">
            <table class="table cart-table">
              <thead>
                <tr>
                  <th scope="col">#id</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Date</th>
                  <th scope="col">Price(Rs)</th>
                  <th scope="col">Status</th>
                  <th scope="col">Payment</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  for($i = 0; $i < count($listOrders); $i++) {
                    $id = $listOrders[$i]["orderId"];
                    $customer = $listOrders[$i]["orderCustomer"];
                    $date = $listOrders[$i]["orderDate"];
                    $amount = $listOrders[$i]["orderAmount"];
                    $status = $listOrders[$i]["orderStatus"];
                    $payment = $listOrders[$i]["orderPayment"];
                    echo '
                      <tr>
                        <td>'.$id.'</td>
                        <td>'.$customer.'</td>
                        <td>'.$date.'</td>
                        <td>'.$amount.'</td>
                        <td>'.$status.'</td>
                        <td>'.$payment.'</td>
                        <td><a href="">details</a></td>
                      </tr>
                    ';
                  }
                 ?>
              </tbody>
            </table>
          </div>
        <!-- </div> -->
      </div>
    </div>
  </section>

  <?php include 'includes/footer.inc.php' ?>
</body>
</html>
