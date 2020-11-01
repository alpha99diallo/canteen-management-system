<?php

  require_once "../classes/cart.class.php";

  $cart = new Cart();

  $dish_id = $_GET['id'];

  $cart->removeItem($dish_id);

  header('Location: ../menu.php?deleted=success#section-cart');

?>
