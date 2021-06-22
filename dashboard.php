<?php

  session_start();
  if(isset($_SESSION['login_user'])  && $_SESSION['login_user']["role"]=="admin"){

 include 'db_connect.php';
 require 'backend_header.php';

?>

   <div class="row">

            <!-- Earnings (daily) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                          <?php
                          $order_date = date('Y-m-d');
                          // echo $order_date;
                          // $sql = "SELECT * FROM order_details where order_date=:order_date";
                          $sql = "SELECT count(id) as daycount FROM order_details where order_date=:order_date";
                          $stmt = $pdo->prepare($sql);
                          $stmt->bindParam(':order_date',$order_date);
                          // $stmt->bindParam(':enddate',$dates);
                          $stmt->execute();
                          $rows=$stmt->rowCount();
                          // var_dump($rows);
                          $rows=$stmt->fetch();
                          

                          // var_dump($rows) ;
                          // die();
                        ?>
                        <?php echo $rows['daycount']; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (weeky) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">This Week</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                          $order_date = date('Y-m-d');
                          $dates = date('Y-m-d',strtotime('last week'));
                          // echo $order_date;
                          // echo "date is ".$dates;
                          $sql = "SELECT count(id) as weekcount FROM orders where DATE(order_date) BETWEEN :enddate AND :day";
                          $stmt = $pdo->prepare($sql);
                          $stmt->bindParam(':day',$order_date);
                          $stmt->bindParam(':enddate',$dates);
                          $stmt->execute();
                          $rows=$stmt->fetch();
                          

                          // var_dump($rows) ;
                          // die();
                        ?>
                          
                        <?php echo $rows['weekcount']; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Monthly</div>
                     
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                          $order_date = date('m');
                          // $dates = date('Y-m-d',strtotime('last month'));
                          // echo $order_date;
                          // echo "date is ".$dates;
                          $sql = "SELECT count(id) as mounthcount FROM orders where MONTH(order_date)=:day";
                          $stmt = $pdo->prepare($sql);
                          $stmt->bindParam(':day',$order_date);
                          // $stmt->bindParam(':enddate',$dates);
                          $stmt->execute();
                          $rows=$stmt->fetch();
                          

                          // var_dump($rows) ;
                          // die();
                        ?>
                          
                        <?php  echo $rows['mounthcount']; ?>
                      </div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Order List</h1>
        
    </div>

    
    <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tday Order</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Voucher No</th>
                      <th>Order Date</th>
                      <!-- <th>Noti</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Voucher No</th>
                      <th>Order Date</th>
                     <!--  <th>Noti</th> -->
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $order_date = date('Y-m-d');
                      $sql = "SELECT * FROM orders where order_date = :dates";
                      $stmt = $pdo->prepare($sql);
                      $stmt->bindParam(':dates',$order_date);
                      $stmt->execute();
                      $rows = $stmt->fetchAll();
                      $i = 1;
                      foreach($rows as $orders)
                      {
                        $id = $orders['id'];
                        $voucherno = $orders['voucherno'];
                        $orderdate = $orders['order_date'];
                        $status = $orders['status'];
                        $noti = $orders['noti'];
                        

                      
                    ?>


                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $voucherno; ?></td>
                      <td><?php echo $orderdate; ?></td>
                      <!--<td><?php echo $noti; ?></td>  -->
                      

                      <td>

                        <a href="order_detail.php?id=<?php echo $id ?>" class="btn btn-info">
                          <i class="fas fa-scroll"></i>
                          Detail
                        </a>
                       
                        <a href="category_delete.php?id=<?php echo $id ?>" class="btn btn-danger" onclick="return confirm('Are You sure to delete!!!')"><i class="fas fa-trash"></i>Delete</a>

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