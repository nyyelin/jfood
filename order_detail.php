<?php

  session_start();
  if(isset($_SESSION['login_user'])  && $_SESSION['login_user']["role"]=="admin"){

 include 'db_connect.php';
 require 'backend_header.php';

 $voucher = $_GET['voucher'];
 $sql = "SELECT order_details.*, users.*, users.name as username,users.phone as uphone,users.address as uadd FROM order_details 
  INNER JOIN users ON users.id=order_details.user_id 
  WHERE order_details.voucherno=:voucher";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':voucher',$voucher);
 $stmt->execute();
 $order=$stmt->fetch();
 $name = $order['username'];
 $phone = $order['uphone'];
 $address = $order['uadd'];
 $order = $order['order_date'];
 $date = new DateTime($order);
 $orderdate = date_format($date,'d F,Y');
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
    
</div>

<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Vouchre no</h6>
    </div>

    <div class="card-body">
      <div class="row bg-secondary">
        <div class="col-lg-12">
          <h3 class="text-white text-center"> Inovie </h3>
        </div>
      </div>
      <!-- restaurant address -->
      <div class="row mt-3">

        <div class="col-md-5">
          <p><i class="fas fa-store"></i> Jfood restaurant</p>
          <p><i class="fas fa-home"></i> No.(5),War Oo Street,PhawtKan Qt,Insein Township,Yangon</p>
          <p><i class="fas fa-phone"></i> +95 9771465159</p>
        </div>

        <div class="col-md-7 mt-2" style="margin-top: -20px;">
          
            <img src="image/logo1.png" class="img-fluid" width="110px" style="transform: perspective(100px); transform: rotate(-20deg);">
            <h2 class="d-inline-flex">
              Japan Foods Restaurant
            </h2>
        </div>
      </div>
      <!-- end restaurant address -->

      <!-- customer detail who order this -->
      <div class="row mt-2">
        <div class="col-md-5">

          <div class="row ml-2">
            <h5>Name : </h5>
            <p ><?= $name ?></p>
          </div>

          <div class="row ml-2">
            <h5>Phone : </h5>
            <p><?= $phone ?></p>
          </div>

          <div class="row ml-2">
            <h5>Address : </h5>
            <p><?= $address ?></p>
          </div>

        </div>

        <div class="col-md-7">
          <table class="table table-bordered">

            <tr>
              <td>Invoice</td>
              <td><?= $voucher ?></td>
            </tr>

            <tr>
              <td>Date</td>
              <td><?= $orderdate ?></td>
            </tr>

          </table>
        </div>

      </div>
      <!-- end of customer detail who order this -->

      <!-- detail customer order -->
      <div class="row mt-2 mx-2">  
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th width="537px">Menu</th>
                <th>Price</th> 
                <th>Qty</th>
                <th>Total Price</th>

              </tr>
            </thead>

            <tbody>
              <?php
                $i=1;
                $orderdetail = "SELECT order_details.*,items.*,orders.*, items.name as itemname,orders.noti as noti FROM order_details
                  INNER JOIN orders on orders.voucherno=order_details.voucherno
                  INNER JOIN items on items.id=order_details.item_id 
                  WHERE order_details.voucherno=:voucher";

                  $detail = $pdo->prepare($orderdetail);
                  $detail->bindParam(':voucher',$voucher);
                  $detail->execute();
                  $row=$detail->fetchAll();
                  $totalamount = 0;
                  $total=0;
                  foreach ($row as $data) {
                    $noti=$data['noti'];
                    $message = trim($noti);
                    $price = $data['price'];
                    $qty=$data['qty'];
                    $total=$price*$qty;
                    $totalamount+=$total+25;
              ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $data['itemname'] ?></td>
                <td><?= $price ?></td>
                <td><?= $qty ?></td>
                <td><?= $total ?></td>
              </tr>
              <?php
              $i++;
                }
              ?>

              <tr>
                <td colspan="2" rowspan="2">
                  NOTI :: 
                  <?= $message ?>
                </td>
                <td colspan="2" class="text-danger font-weight-bold">
                  Tax
                </td>
                <td>
                  <p class="text-danger">5%</p>
                </td>
              </tr>
              <tr>
                </td>
                <td colspan="2" class="text-danger font-weight-bold">
                  Total 
                </td>
                <td>
                  <p class="text-danger"><?= $totalamount ?></p>
                </td>
              </tr>
              
            </tbody>
              
          </table>
      
      </div>
      <!-- end of detail customer order -->

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