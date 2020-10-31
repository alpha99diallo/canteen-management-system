<?php
  session_start();
  require_once('includes/dbh.inc.php');
  require_once("classes/order.class.php");

  $order = new Order($conn);

  $customerName = $_POST['orderCustomer'];
  $orderPayment = $_POST['customRadio'];
  $total = 0;
  $date = date('Y-m-d H:i:s');

  if(isset($_POST['place-order'])) {
    foreach($_SESSION["cart"] as $product){
      $total += ((float)$product['quantity']*(float)$product['price']);
    }
    $order->createOrder($customerName,$date,strval($total),'processing',$orderPayment);
    unset($_SESSION['cart']);
    header('Location: index.php?order=success');
  }

 ?>