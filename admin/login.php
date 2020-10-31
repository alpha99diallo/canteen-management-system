<?php
  session_start();

  require_once('../includes/dbh.inc.php');
  require_once('../classes/admin.class.php');

  // creation of the user object
  $user = new Admin($conn);

  //if already logged in, redirect to home page
  if ($user->isLoggedIn())
  {
    $user->redirect('admin.php');
  }

  //When login button pressed, login
  if (isset($_POST['admin-login']))
  {
    $email = $_POST['uname'];
    $pass = $_POST['pwd'];
    $login = $user->login($email, $pass);

    if ($login === true)
    {
        $user->redirect('admin.php?signin=success');
    }
    else
    {
        echo $login;
    }
  }

 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Admin</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #900C3F;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.container {
  padding: 20px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

  <div class="row">
    <div class="col-lg-12">
      <div class="container" style="width: 40%;">
        <h2>Admin Login</h2>

        <form method="post">
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pwd" required>

            <button type="submit" name="admin-login">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
