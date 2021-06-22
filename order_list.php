<?php

  session_start();
  if(isset($_SESSION['login_user'])  && $_SESSION['login_user']["role"]=="admin"){

 include 'db_connect.php';
 require 'backend_header.php';

?>
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Order List</h1>
        
    </div>

    
    <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Order</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Photo</th>
                      <th>Menu</th>
                      <th>Price</th>
                      <th>Qty</th> 
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Photo</th>
                      <th>Menu</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $sql = "SELECT order_details.*, items.name as itemsname FROM order_details INNER JOIN items on items.id=order_details.item_id";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                      $rows = $stmt->fetchAll();
                      $i = 1;
                      foreach($rows as $orders)
                      { 
                        $id = $orders['id'];
                        $name = $orders['itemsname'];
                        $price = $orders['price'];
                        $photo = $orders['photo'];
                        $qty = $orders['qty'];
                        $voucher = $orders['voucherno'];

                      
                    ?>


                    <tr>
                      <td><?php echo $i ?></td>
                      <td><img src="<?php echo $photo; ?>" class="img-fluid" width="120px"></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $price; ?></td>
                      <td><?php echo $qty; ?></td>

                      <td>
                        <a href="order_detail.php?voucher=<?php echo $voucher ?>" class="btn btn-info">
                          <i class="fas fa-scroll"></i>
                          Detail
                        </a>
                        <a href="order_delete.php?id=<?php echo $id ?>" class="btn btn-danger" onclick="return confirm('Are You sure to delete!!!')"><i class="fas fa-trash"></i>Delete</a>

                      </td>
                    </tr>

                    <?php
                    $i++;
                      }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
      </div>


<?php
 require 'backend_footer.php';
}
else{


?>
<h1>
  404 error not fonund
</h1>
<?php
}
?>