<?php
  include 'db_connect.php';
  require 'frontend_header.php';
?>
  <div class="row">

    <div class="col-md-10 mx-auto my-4">
    <h3 class="text-capitalize text-center">Your Shopping Cart</h3>
      <hr>
      <marquee behavior="slide">
        Thank you for your orders From us!!!  <i class="fas fa-box"></i>
      </marquee>


      <a href="index.php">
          <button class="btn btn-outline-success float-right my-5">
            <i class="fas fa-shoppin-cart"></i>
            Continue Shopping
          </button>
      </a>

      <div class="table table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Photo</th>
              <th>Menu</th>
              <th>Price</th> 
              <th>Qty</th>
              <th>Total</th>

            </tr>
          </thead>

          <tbody id="show_body">
            
          </tbody>
          <tfoot id="show_footer">
            
        </table>
      </div>


      <div class="row mb-3 check">
        <div class="col-md-6 my-2">
          <textarea class="form-control noti" placeholder="Comment">
            
          </textarea>
        </div>
        <div class="col-md-2 my-2">
          <button class="btn btn-success rounded order">
            <i class="fas fa-pager">Check Out</i>
          </button>
        </div>
      </div>


    </div>

  </div>

<?php
  require 'frontend_footer.php';
?>