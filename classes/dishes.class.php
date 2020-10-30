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

    public function fetchDishesPerCategory($catId) {
      $arrayResult = array();
      $stmt = "SELECT * FROM dishes WHERE dishCategory=$catId;";
      $result = mysqli_query($this->db,$stmt);
      if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $arrayResult[] = $row;
        }
      }
      return $arrayResult;
    }

  }


 ?>
