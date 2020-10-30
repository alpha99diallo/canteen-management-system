<?php
  class Categories
  {
    //initialise the connection
    private $db;

    public function __construct ($conn) {

        $this->db = $conn;

    }

    //Fetch the categories from the database
    public function fetchCategories() {
      $arrayResult = array();
      $stmt = "SELECT * FROM categories;";
      $result = mysqli_query($this->db,$stmt);
      while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
      }
      return $array;
    }

  }


 ?>
