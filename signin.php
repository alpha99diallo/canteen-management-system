<?php
  session_start();

  require_once('includes/dbh.inc.php');
  require_once('classes/user.class.php');

  // creation of the user object
  $user = new User($conn);

  //if already logged in, redirect to home page
  if ($user->isLoggedIn())
  {
    $user->redirect('index.php');
  }

  //When login button pressed, login
  $data;
  if (isset($_POST['login-submit']))
  {
    $email = $_POST['email'];
    $pass = $_POST['pwd'];
    $login = $user->login($email, $pass);

    if ($login === true)
    {
        $user->redirect('index.php?signin=success');
    }
    else
    {
        $data = $login;
    }
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
	<title>Sign In | Alpha's Canteen</title>

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
                    <a href="index.php"><span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;font-size: 30px;">Alpha's</span><span style="font-family: snellroundhandw01-scrip,cursive;font-size: 30px;">Canteen</span></a>
                </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars-rs-food">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="signin.php">Sign Up</a></li>
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
					<h1>Sign In</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

<div class="page-content" style="padding: 70px;">

<!--login start-->
<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 col-12" style="padding: 2em;">
        <h2>New user?</h2>
        <caption>Create an account and you'll be able to:</caption>
        <ul >
          <li>Check out faster and easier</li>
        </ul>
        <br>
        <a href="signup.php" style="background-color: #900C3F;width: 50%;" class="btn btn-primary btn-block">Create account</a>
      </div>
      <div class="col-lg-5 col-12">
        <div>
          <h2 class="text-center mb-3 text-uppercase">User Login</h2>
          <center>
            <?php
              if (isset($data)) {
                echo "
                  <div class='wrongpwd-box flash-error'>
                    <center>
                    <p class='error' style='color: black;'>$data</p>
                    </center>
                  </div>
                ";
              }
              elseif (isset($_GET['signup']) && ($_GET['signup'] == 'success')) {
                echo "
                  <div class='wrongpwd-box flash-error' style='background: #4fc879; border-color: #4a934a;'>
                    <center>
                    <p class='error' style='color: black;'>Successfully Joined!</p>
                    </center>
                  </div>
                ";
              }
            ?>
          </center>
          <form method="post" action="signin.php">
            <div class="messages"></div>
            <div class="form-group">
              <input id="form_name" type="text" name="email" class="form-control" placeholder="Adresse email" required="required">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <input id="form_password" type="password" name="pwd" class="form-control" placeholder="Mot de passe" required="required">
              <div class="help-block with-errors"></div>
            </div>
            <button style="background-color: #900C3F;" class="btn btn-primary btn-block" type="submit" name="login-submit">Login Now</button>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--login end-->

</div>

<!--body content end-->

  <?php require 'footer.php' ?>


</body>
</html>
