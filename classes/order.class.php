<?php
  session_start();
  class Order {

    private $db;

    public function __construct ($conn) {

        $this->db = $conn;

    }

    public function createOrder($oCust, $date, $oAmount, $orderStatus, $orderPayment)
    {

      $stmt = $this->db->prepare("INSERT INTO orders (orderCustomer, orderDate, orderAmount, orderStatus, orderPayment) VALUES (?,?,?,?,?)");
      $stmt->bind_param("sssss", $oCust, $date, $oAmount, $orderStatus, $orderPayment);

      if($stmt->execute()) {
        $order_id = $this->db->insert_id;

        $stmt2 = $this->db->prepare("INSERT INTO order_item (dishId, orderId, order_item_status_code, order_item_quantity,order_item_price)
        VALUES (?,?,?,?,?)");
        foreach($_SESSION["cart"] as $product){
          $dishQuantity=$product['quantity'];
          $dishId = $product['pid'];
          $dishName = $product['name'];
          $dishPrice = $product['price'];
          $stmt2->bind_param("sssss", $dishId, $order_id, $orderStatus, $dishQuantity,$dishPrice);
          if($stmt2->execute()) {
            return true;
          } else {
            return $stmt->error;
          }
        }
      } else {
          return $stmt->error;
      }
    }

    public function updateOrder()
    {
      // TODO: update order
    }

    public function deleteOrder()
    {
      // TODO: delete order
    }

    public function displayOrders()
    {
      // TODO: display orders
    }


  }

 ?>
