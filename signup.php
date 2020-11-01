<?php

session_start();

require_once('includes/dbh.inc.php');
require_once('classes/user.class.php');
require_once('classes/validate.class.php');

$user = new User($conn);

$validate = new Validate($conn);

//If user is already logged in, redirect to home page
if ($user->isLoggedIn())
{
    $user->redirect('index.php');
}

$errors = array();

//When register button is pressed, register
$data;
if (isset($_POST['signup-submit']))
{
    $uname = $_POST['firstname'] ;
    $email = $_POST['email'];
    $pass = $_POST['pwd1'];
    $pass2 = $_POST['pwd2'];

    //Validate user input
    if ($validate->usernameValidate($uname) != null)
    {
        $errors[] = $validate->usernameValidate($uname);
        $data = $validate->usernameValidate($uname);
    }
    if ($validate->emailValidate($email) != null)
    {
        $errors[] = $validate->emailValidate($email);
        $data = $validate->emailValidate($email);
    }
    if ($validate->passwordValidate($pass, $pass2) != null)
    {
        $errors[] = $validate->passwordValidate($pass, $pass2);
        $data = $validate->passwordValidate($pass, $pass2);
    }

    //If no validation errors register input, else display errors
    if (empty($errors))
    {
        if($user->register($uname, $email, $pass) === true)
        {
            $user->redirect('signin.php?signup=success');
        }
        else
        {
          $data = 'Error registering. please try again.';
        }
    }
    else
    {
        foreach ($errors as $error)
        {
            // printf ($error . "<br/>");
        }
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
	<title>Sign Up | Canteen Management System</title>

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
					<h1>Sign Up</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

<div class="page-content" style="padding:70px;">

<!--login start-->

<section class="register">
  <div class="container">
     <div class="row justify-content-center text-center">
      <div class="col-lg-8 col-md-12">
        <div class="mb-6">
          <h2>New User</h2>
          <br>
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
            ?>
          </center>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-10 ml-auto mr-auto">
        <div class="register-form text-center">
          <form action="signup.php" method="POST">
            <?php
            if (isset($_GET['firstname']) && isset($_GET['lastname'])) {
              $firstName = $_GET['firstname'];
              $lastName = $_GET['lastname'];
              echo '
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input id="form_name" type="text" name="firstname" value="'.$firstName.'" class="form-control" placeholder="First name" required="required">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input id="form_lastname" type="text" name="lastname" value="'.$lastName.'" class="form-control" placeholder="Last name" required="required">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              ';
            }else {
              echo '
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input id="form_name" type="text" name="firstname" class="form-control" placeholder="First name" required="required">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Last name" required="required">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              ';
            }
            if (isset($_GET['email'])) {
              $email = $_GET['email'];
              echo '
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input id="form_email" type="email" name="email" value="'.$email.'" class="form-control" placeholder="Email" required="required">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              ';
            }
            else {
              echo '
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required="required">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              ';
            }
            echo '
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input id="form_password" type="password" name="pwd1" class="form-control" placeholder="Password" required="required">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input id="form_password1" type="password" name="pwd2" class="form-control" placeholder="Confirm Password" required="required">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            ';
            ?>
            <div class="row">
              <div class="col-md-12">
                <button style="background-color: #900C3F;" class="btn btn-primary btn-block" type="submit" name="signup-submit">Sign Up</button>
              </div>
            </div>
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
