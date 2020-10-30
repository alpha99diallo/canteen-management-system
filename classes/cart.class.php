<?php

session_start();

class Cart implements Countable, Iterator{
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

      header("Location: ".$_SERVER['HTTP_REFERER']."?action=exists&id='$id'");
    }
    // else, add the item to the array
    else{
    $_SESSION['cart'][$id] = $cart_item;

    // redirect to product list and tell the user it was added to cart
      header('Location: '.$_SERVER["HTTP_REFERER"].'?action=added');
    }
	}

	public function removeItem($id){

      // remove the item from the array
      unset($_SESSION['cart'][$id]);
	}

	public function updateItem($id){

    $cart_item = $_SESSION['cart'][$id];

		// Throw an exception if there is no id
			if (!$id) throw new Exception ('The cart requires item with unique ID values');

		// Delete or update item quantity
			if (1 === 0) {
				$this->deleteItem($item);
			} else {
        echo $cart_item;
				$this->$cart_item[$id]['quantity'] = (int)$cart_item[$id]['quantity'] + 1;
        $_SESSION['cart'][$id] = $cart_item;
			}
	}

	public function deleteItem(Dish $item){
		// Get the item id
			$id = $item->getId();

		// Throw an exception if there is no id
			if (!$id) throw new Exception ('The cart requires item with unique ID values');

		// Remove item from shopping cart
			if (isset($this->items[$id])) {
				unset($this->items[$id]);
			}

			$index = array_search($id, $this->ids);
			unset($this->ids[$index]);
			$this->ids = array_values($this->ids);
	}

	public function getTotal(){
		$total = 0;

		foreach ($this->items as $id) {
						$subtotal = $id['qty'] * ($id['item']->getPrice());
						$total += $subtotal;
					}

		return $total;
	}

	// $items array is protected so we implement Countable and Iterable interfaces using the following methods
		// Countable interface: Function to count number of items in our cart
			public function count(){
				$count = 0;

				foreach ($this->items as $item) {
					$count += $item['qty'];
				}

				return $count;
			}

		// Iterator interface: Function to return the key of the current element
			public function key(){
				return $this->position;
			}

		// Iterator interface: Function to move forward to the next element
			public function next(){
				$this->position++;
			}

		// Iterator interface: Function to rewind the iterator to the first element
			public function rewind(){
				$this->position = 0;
			}

		// Iterator interface: Function to check if the current position is valid
			public function valid(){
				return (isset($this->ids[$this->position]));
			}

		// Iterable interface: Function to return the current item
			public function current(){
				$index = $this->ids[$this->position];
				return $this->items[$index];
			}

}
