<?php

  session_start();

  require_once('dbh.inc.php');
  require_once('../classes/user.class.php');

  $user = new User($conn);

  //Logout out user and redirect to login page
  if (isset($_GET['logout']))
  {
    $user->logout();
    $user->redirect('../index.php');
  }
  //If user is still signed in, will redirect to index.php which will redirect to home.php
  else
  {
    $user->redirect('index.php');
  }

?>
