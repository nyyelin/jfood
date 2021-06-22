<?php

  session_start();
  if(isset($_SESSION['login_user'])  && $_SESSION['login_user']["role"]=="admin"){

 include 'db_connect.php';
 require 'backend_header.php';

?>
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Items</h1>
        
    </div>

    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card shadow">
          <div class="card-header text-primary font-weight-bold">
            Add new Items
          </div>
          <div class="card-body">


            <form action="item_add.php" method="post" enctype="multipart/form-data">

              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Name:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                  <input type="text" name="name" class="form-control d-inline" placeholder="name">
                </div>
                
              </div>

              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Price:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                  <input type="number" name="price" class="form-control d-inline" placeholder="price">
                </div>
                
              </div>


              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Category:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                  <select class="form-control" name="category">
                      
                     <?php
                      $sql = "SELECT * FROM categories";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                      $rows = $stmt->fetchAll();
                     
                      foreach($rows as $categories)
                      {
                        $id = $categories['id'];
                        $name = $categories['name'];
                      
                    ?>

                    <option value="<?php echo $id ?>"><?php echo $name ?></option>

                    <?php
                   
                      }

                    ?>
                  </select>

                </div>
                
              </div>



              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Description:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                  <textarea class="form-control" placeholder="Descrption" name="desc"></textarea>
                </div>
                
              </div>


              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Photo:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                 <input type="file" name="photo" class="form-control-file">
                </div>
                
              </div>

              <div class="row form-group">
                <div class="col-md-6 offset-4">
                  <button class="btn btn-success float-right">Save</button>
                </div>
              </div>

              
            </form>
          </div>
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