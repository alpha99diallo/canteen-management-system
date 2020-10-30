<?php
class Dish
{
    protected $dishId;
    protected $dishName;
    protected $dishPrice;

    function __construct($id, $name, $price)
    {
      $this->dishId = $id;
      $this->dishName = $name;
      $this->dishPrice = $price;

    }
    public function getId() {
      return $this->dishId;
    }


    public function getName() {
      return $this->dishName;
    }

    public function getPrice() {
      return $this->dishPrice;
    } 
  }

 ?>
