<?php
  session_start();

  require_once('../includes/dbh.inc.php');
  require_once('../classes/dishes.class.php');

  if(!isset($_SESSION['adminLoginStatus'])) {
    header('Location: login.php');
  }

  $dishes = new Dishes($conn);

  $listMenuItems = $dishes->fetchAllDishes();

  // TODO: implement add items and delete items

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
	<title>Menu | Canteen Management System</title>

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

  <div class="all-page-title page-breadcrumb" style="background: grey; padding:120px;">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Menu(<?php echo count($listMenuItems); ?>)</h1>
				</div>
			</div>
		</div>
	</div>

  <div class="container form-group mt-4 mb-5">
    <div class="remember-checkbox d-flex align-items-center justify-content-between">
      <div class="checkbox">
      </div>
      <a class="btn-cart btn btn-primary btn-animated mx-3" data-toggle="modal" href="#exampleModalCenter" style="background-color:#900C3F;color: white;" name="addcart">
        <i class="fa fa-shopping-cart"></i>
        <p>Add Items</p>
      </a>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="row">
        <!-- <div class="col-lg-8"> -->
          <div class="table-responsive">
            <table class="table cart-table">
              <thead>
                <tr>
                  <th scope="col">#id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Price(Rs)</th>
                  <th scope="col">Availability</th>
                  <th scope="col">Date Added</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  for($i = 0; $i < count($listMenuItems); $i++) {
                    $id = $listMenuItems[$i]["dishId"];
                    $dishName = $listMenuItems[$i]["dishName"];
                    $dishCategory = $listMenuItems[$i]["dishCategory"];
                    $dishPrice = $listMenuItems[$i]["dishPrice"];
                    $dishAvailable = $listMenuItems[$i]["dishAvailability"];
                    $dateAdded = $listMenuItems[$i]["dishDateAdded"];
                    echo '
                      <tr>
                        <td>'.$id.'</td>
                        <td>'.$dishName.'</td>
                        <td>'.$dishCategory.'</td>
                        <td>'.$dishPrice.'</td>
                        <td>'.$dishAvailable.'</td>
                        <td>'.$dateAdded.'</td>
                        <td><a href="includes/deleteItems.inc.php?id='.$id.'">delete</a></td>
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

  <?php include 'includes/footer.inc.php';  ?>
  <?php include 'includes/addItems.inc.php'; ?>

</body>
</html>
