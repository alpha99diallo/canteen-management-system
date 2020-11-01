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
            return $order_id;
          } else {
            return $stmt->error;
          }
        }
      } else {
          return $stmt->error;
      }
    }

    public function cancelOrder($id)
    {

      //Query database for info based on username or email
      $stmt = $this->db->prepare("SELECT orderStatus FROM orders WHERE orderId = ? ");
      $stmt->bind_param("s", $id);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows == 1) {
        $stmt->bind_result($orderStatus);
        $result = $stmt->fetch();

        if ($orderStatus !== 'completed') {
          // if the status != completed then cancel it
          $stmt = $this->db->prepare("UPDATE orders SET orderStatus='cancel' WHERE orderId=?");
          $stmt->bind_param("s", $id);

          if($stmt->execute()) {
              return 'cancel';
          } else {
              return $stmt->error;
          }
        }
        else {
           return 'completed';
        }

      }
      else {
        return 'empty';
      }


    }

    public function displayOrders()
    {
      $arrayResult = array();
      $stmt = "SELECT * FROM orders;";
      $result = mysqli_query($this->db,$stmt);
      while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
      }
      return $array;
    }

    public function displayMyOrders($id)
    {
      $arrayResult = array();
      $stmt = "SELECT * FROM orders WHERE orderCustomer = '$id';";
      $result = mysqli_query($this->db,$stmt);
      if(mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $array[] = $row;
        }
        return $array;
      }
      else {
        return null;
      }

    }


  }

 ?>
