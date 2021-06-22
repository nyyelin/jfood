<?php

  session_start();
  if(isset($_SESSION['login_user'])  && $_SESSION['login_user']["role"]=="admin"){

 include 'db_connect.php';
 require 'backend_header.php';

 $id = $_GET['id'];
 $sql = "SELECT * FROM items where id=:id";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $row=$stmt->fetch();

?>
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Items</h1>
        
    </div>

    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card shadow">
          <div class="card-header text-primary font-weight-bold">
            Edit Items
          </div>
          <div class="card-body">


            <form action="item_update.php" method="post" enctype="multipart/form-data">


              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Photo:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                  <div class="text-center">
                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                          
                        </div>
                      </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <img src="<?php echo $row['photo']?>" class="img-fluid" width="120px">
                      </div>

                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                        <input type="hidden" name="oldphoto" value="<?php echo $row['photo']?>">

                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        
                        <input type="file" name="newphoto" class="form-control-file">
                      </div>
                      
                    </div>


                </div>
                  
              </div>

              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Name:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                  <input type="text" name="name" class="form-control d-inline" value="<?php echo $row['name'] ?>">
                </div>
                
              </div>

              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Price:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                  <input type="number" name="price" class="form-control d-inline" value="<?php echo $row['price'] ?>">
                </div>
                
              </div>


              <div class="row form-group">
                <div class="col-md-2 mx-auto ">
                  <label>Category:</label>
                </div>
                <div class="col-md-8  mx-auto">
                 
                  <select class="form-control" name="category">
                      
                     <?php
                      $ids=$row['category_id'];
                      echo $ids;
                      $sql = "SELECT * FROM categories ";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                      $rows = $stmt->fetchAll();
                     
                      foreach($rows as $categories)
                      {
                        $id = $categories['id'];
                        $name = $categories['name'];
                      
                    ?>

                    <option value="<?php echo $id ?>" <?php if($ids==$id){ ?> selected <?php } ?>><?php echo $name ?></option>

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
                 
                  <textarea class="form-control" name="desc">
                    <?php echo $row['description']?>
                  </textarea>
                </div>
                
              </div>


              

              <div class="row form-group">
                <div class="col-md-6 offset-4">
                  <button class="btn btn-success float-right">Update</button>
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