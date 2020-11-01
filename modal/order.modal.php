<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Order</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="checkout-form box-shadow white-bg">
          <form class="cart-detail" method="post" action="includes/place-order.inc.php">
            <?php
              if(!isset($_SESSION['userLoginStatus'])) {
                echo '
                <h3 class="mb-4">1. Guest Customer</h3>
                <label for="uname"><b>Customer Name</b></label>
                <input type="text" placeholder="Enter Your Name" name="orderCustomer">
                <h3 class="mb-4">2. Payment</h3>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Credit/Debit Card</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio3">Cash</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" style="background-color:#900C3F;" name="place-order" class="btn btn-primary">
                  Place Order
                  </button>
                </div>
                ';
              }
              else {
                echo '
                <h3 class="mb-4">1. Payment</h3>
                <input type="text" value="'.$_SESSION['userId'].'" name="orderCustomer" hidden>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="customRadio" value="Credit/Debit Card" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadio2">Credit/Debit Card</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio3" name="customRadio"  value="Cash"  class="custom-control-input">
                    <label class="custom-control-label" for="customRadio3">Cash</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" style="background-color:#900C3F;" name="place-order" class="btn btn-primary">Place Order</button>
                </div>
                ';
              }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
