<?php

session_start();

class Cart implements Countable{
	// The items in the shopping cart
		private $cart_item = array();

	// Variables for our iterator functions
		protected $position = 0;
		protected $ids = array();

		public function isEmpty(){
			return (empty($this->items));
		}

	public function addItem($dish_id,$dish_quantity,$dish_name, $dish_price){

    $id = $dish_id;
    $quantity = $dish_quantity;
    $name = $dish_name;
    $price = $dish_price;

    // make quantity a minimum of 1
    $quantity=$quantity<=0 ? 1 : $quantity;

    // add new item on array
    $cart_item=array(
      'pid'=>$id,
      'name'=>$name,
      'price'=>$price,
      'quantity'=>$quantity,
    );

    /*
      * check if the 'cart' session array was created
      * if it is NOT, create the 'cart' session array
    */
    if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
    }

    // check if the item is in the array, if it is, do not add
    if(array_key_exists($id, $_SESSION['cart'])){
      // redirect to product list and tell the user it was added to cart
      $this->updateItem($id);

      header("Location: ".$_SERVER['HTTP_REFERER']."?action=exists&id='$id'#section-menu");
    }
    // else, add the item to the array
    else{
    $_SESSION['cart'][$id] = $cart_item;

    // redirect to product list and tell the user it was added to cart
      header('Location: '.$_SERVER["HTTP_REFERER"].'&action=added#section-menu');
    }
	}

	public function updateItem($id){

		// Throw an exception if there is no id
		if (!$id) throw new Exception ('The cart requires item with unique ID values');

		foreach ($_SESSION["cart"] as $product) {
			$_SESSION["cart"][$id]['quantity']++;
		}
	}

	public function removeItem($id){

      // remove the item from the array
      unset($_SESSION['cart'][$id]);
	}

	public function count(){
		$count = 0;

		foreach ($this->items as $item) {
			$count += $item['qty'];
		}

		return $count;
	}

}
