<?php
  class Dishes
  {
    //initialise the connection
    private $db;

    public function __construct ($conn) {

        $this->db = $conn;

    }

    //Fetch the categories from the database
    public function fetchAllDishes() {
      $arrayResult = array();
      $stmt = "SELECT * FROM dishes;";
      $result = mysqli_query($this->db,$stmt);
      while ($row = mysqli_fetch_assoc($result)) {
        $arrayResult[] = $row;
      }
      return $arrayResult;
    }

    public function fetchDishesPerCategory($catId,$day) {
      $arrayResult = array();
      $stmt = "SELECT * FROM dishes WHERE dishCategory=$catId;";
      $result = mysqli_query($this->db,$stmt);
      if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $res = preg_match("/{$day}/i", $row['dayAvailable']);
          if ($res) {
            $arrayResult[] = $row;
          }
        }
      }
      return $arrayResult;
    }

    public function fetchDishesPerDay($day) {
      $arrayResult = array();
      $stmt = "SELECT * FROM dishes";
      $result = mysqli_query($this->db,$stmt);
      if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $res = preg_match("/{$day}/i", $row['dayAvailable']);
          if ($res) {
            $arrayResult[] = $row;
          }
        }
      }
      return $arrayResult;
    }

    public function fetchTodaySpecial($day) {
      $arrayResult = array();
      $stmt = "SELECT * FROM dishes WHERE today_special = 1";
      $result = mysqli_query($this->db,$stmt);
      if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $res = preg_match("/{$day}/i", $row['dayAvailable']);
          if ($res) {
            $arrayResult[] = $row;
          }
        }
      }
      return $arrayResult;
    }

    public function deleteDishes($id)
    {
      $stmt = $this->db->prepare("DELETE FROM dishes WHERE dishId=?");
      $stmt->bind_param("s", $id);

      if($stmt->execute()) {
          return true;
      } else {
          return $stmt->error;
      }
    }

  }


 ?>
