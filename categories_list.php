<?php

  session_start();
  if(isset($_SESSION['login_user'])  && $_SESSION['login_user']["role"]=="admin"){

 include 'db_connect.php';
 require 'backend_header.php';

?>
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Category</h1>
        
    </div>
<!-- add category -->
    <div class="row div_add">
      <div class="col-md-12 mx-auto">
        <div class="card shadow">
          <div class="card-header text-primary font-weight-bold">
            Add new Categories
          </div>
          <div class="card-body">


            <form action="category_add.php" method="post">

              <div class="row form-group">
                <div class="col-md-10">
                  <input type="text" name="name" class="form-control d-inline" placeholder="name">
                </div>
                <div class="col-md-2">
                  <button class="btn btn-secondary rounded float-right">Save Change</button>
                </div>
              </div>
              
            </form>
          </div>
        </div>
      </div>

    </div>


  <!-- edit category -->

     <div class="row div_edit">
      <div class="col-md-12 mx-auto">
        <div class="card shadow">
          <div class="card-header text-primary font-weight-bold">
            Edit Categories
          </div>
          <div class="card-body">

            
            <form action="category_edit.php" method="post">

              <div class="row form-group">
                <div class="col-md-10">
                  <input type="hidden" name="id" class="id">
                  <input type="text" name="name" class="form-control d-inline name" value="">
                </div>
                <div class="col-md-2">
                  <button class="btn btn-secondary rounded float-right">Update</button>
                </div>
              </div>
              
            </form>
          </div>
        </div>
      </div>

    </div>


    <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM categories";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                      $rows = $stmt->fetchAll();
                      $i = 1;
                      foreach($rows as $categories)
                      {
                        $id = $categories['id'];
                        $name = $categories['name'];
                      
                    ?>


                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $name; ?></td>
                      <td>
                        <button class="btn btn-warning btn-edit" data-id='<?php echo $id ?>' data-name="<?php echo $name ?>"> <i class="fas fa-edit"></i>Edit</button>
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