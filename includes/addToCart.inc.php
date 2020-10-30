<?php

  require_once "../classes/cart.class.php";

  $cart = new Cart();

  $dish_id = $_GET['id'];
  $dish_quantity = $_GET['quantity'];
  $dish_name = $_GET['name'];
  $dish_price = $_GET['price'];

  $cart->addItem($dish_id,$dish_quantity, $dish_name, $dish_price);

?>
