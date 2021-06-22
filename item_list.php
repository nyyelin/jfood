<?php

  session_start();
  if(isset($_SESSION['login_user'])  && $_SESSION['login_user']["role"]=="admin"){

 include 'db_connect.php';
 require 'backend_header.php';

?>
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Item</h1>
      <a href="create_item.php" class="btn btn-info rounded-bottom"><i class="fas fa-plus"></i>Add New</a>
        
    </div>

    <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Item List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>No</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $sql = "SELECT items.*, categories.name as cname FROM items INNER JOIN categories on categories.id=items.category_id";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                      $rows = $stmt->fetchAll();
                      $i = 1;
                      foreach($rows as $items)
                      {
                        $id = $items['id'];
                        $name = $items['name'];
                        $price = $items['price'];
                        $category = $items['cname'];
                        $description = $items['description'];
                        $photo = $items['photo'];
                      
                    ?>


                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $price; ?></td>
                      <td><?php echo $category; ?></td>
                      <td><?php echo $description; ?></td>
                      <td><img src="<?php echo $photo; ?>" class="img-fluid" width="120px"></td>
                      <td>
                        <a href="item_edit.php?id=<?php echo $id ?>" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                        <a href="item_delete.php?id=<?php echo $id ?>" class="btn btn-danger" onclick="return confirm('Are You sure to delete!!!')"><i class="fas fa-trash"></i>Delete</a>

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