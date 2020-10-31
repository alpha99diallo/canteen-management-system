<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Add Items</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="checkout-form box-shadow white-bg">
          <form class="cart-detail" method="post" action="place-order.php">
            <label for="uname"><b>Item Name</b></label>
            <input type="text" placeholder="Enter Item Name" name="orderCustomer"><br>
            <label for="uname"><b>Item Description</b></label>
            <input type="text" placeholder="Enter Item Description" name="orderCustomer"><br>
            <label for="uname"><b>Item Price</b></label>
            <input type="text" placeholder="Enter Item Price" name="orderCustomer"><br>
            <label for="uname"><b>Item Category</b></label>
            <input type="text" placeholder="Enter Item Category" name="orderCustomer"><br>
            <label for="uname"><b>Item Availability</b></label>
            <input type="text" placeholder="Enter Item Availability" name="orderCustomer"><br>
            <div class="modal-footer">
              <button type="submit" style="background-color:#900C3F;" name="place-order" class="btn btn-primary">Add Items</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
