<?php
  session_start();

  require_once('../includes/dbh.inc.php');
  require_once('../classes/user.class.php');

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
	<title>Customer | Canteen Management System</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

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
  <?php include 'header.php' ?>

  <div class="all-page-title page-breadcrumb" style="background: #181818;">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Customer</h1>
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
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">NA</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        <!-- </div> -->
      </div>
    </div>
  </section>

</body>
</html>
