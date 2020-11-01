<?php
  session_start();

  require_once('../includes/dbh.inc.php');
  require_once('../classes/user.class.php');

  if(!isset($_SESSION['adminLoginStatus'])) {
    header('Location: login.php');
  }

  $user = new User($conn);

  $listUsers = $user->displayUsers();

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

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="../css/responsive.css">

</head>

<body>
  <?php include 'includes/header.inc.php' ?>

  <div class="all-page-title page-breadcrumb" style="background: grey;padding:120px;">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Customer(<?php echo count($listUsers); ?>)</h1>
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
                </tr>
              </thead>
              <tbody>
                <?php
                  for($i = 0; $i < count($listUsers); $i++) {
                    $id = $listUsers[$i]["userId"];
                    $name = $listUsers[$i]["userName"];
                    $email = $listUsers[$i]["userEmail"];
                    echo '
                      <tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
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
