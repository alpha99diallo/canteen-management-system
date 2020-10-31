<?php

  session_start();

  require_once('../../includes/dbh.inc.php');
  require_once('../../classes/admin.class.php');

  $user = new Admin($conn);

  //Logout out user and redirect to login page
  if (isset($_GET['logout']))
  {
    $user->logout();
    $user->redirect('../login.php');
  }
  //If user is still signed in, will redirect to index.php which will redirect to home.php
  else
  {
    $user->redirect('login.php');
  }

?>
