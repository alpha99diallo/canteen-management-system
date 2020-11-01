<?php
  require_once('dbh.inc.php');
  require_once("../classes/order.class.php");

  $order = new Order($conn);

  $id = $_GET['id'];

  $response = $order->cancelOrder($id);

  header('Location: ../index.php?order='.$response.'#section-cart');

 ?>
