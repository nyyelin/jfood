<?php

  session_start();
  if(isset($_SESSION['login_user'])  && $_SESSION['login_user']["role"]=="admin"){

 include 'db_connect.php';
 require 'backend_header.php';

?>
   <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Item</h1>
      <a href="create_item.php" class="btn btn-info rounded-bottom"><i class="fas fa-plus"></i>Add New</a>
        
    </div> -->

    <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Customer List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM users";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                      $rows = $stmt->fetchAll();
                      $i = 1;
                      foreach($rows as $users)
                      {
                        $id = $users['id'];
                        $name = $users['name'];
                        $photo = $users['profile'];
                        $email = $users['email'];
                        $phone = $users['phone'];
                        $address = $users['address'];
                      
                    ?>


                    <tr>
                      <td><?php echo $i ?></td>
                      <td><img src="<?php echo $photo; ?>" class="img-fluid rounded-circle" width="110px"></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $phone; ?></td>
                      <td><?php echo $address; ?></td>
                      
                      <td>
                        
                        <a href="users_delete.php?id=<?php echo $id ?>" class="btn btn-danger" onclick="return confirm('Are You sure to delete!!!')"><i class="fas fa-trash"></i>Delete</a>

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