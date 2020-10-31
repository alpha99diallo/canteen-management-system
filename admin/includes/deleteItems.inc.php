<?php

  require_once("../../includes/dbh.inc.php");
  require_once("../../classes/dishes.class.php");

  $item = new Dishes($conn);

  $item_id = $_GET['id'];

  $item->deleteDishes($item_id);

  header('Location: ../menu.php');

?>
