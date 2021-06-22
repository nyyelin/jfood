<?php
  include 'db_connect.php';
  require 'frontend_header.php';
?>
  <div class="row">

        <div class="col-lg-3">

          <h5 class="my-4">
          JFoods</h5>


          <div class="list-group">
            <?php
              $sql = "SELECT * FROM categories";
              $stmt = $pdo->prepare($sql);
              $stmt->execute();
              $rows=$stmt->fetchAll();
              foreach ($rows as $category) {
                $id = $category['id'];
               
                $sql1 = "SELECT count(id) as count FROM items where category_id=:id";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->bindParam(':id',$id);
                $stmt1->execute();
                $row=$stmt1->fetch();
                // $stmt2=count($stmt1);
                // var_dump($stmt1);
                // die();
                // $sql1->rowCount();       
            ?>
            <a href="category_detail.php?id=<?php echo $category['id'] ?>" class="list-group-item"><?php echo $category['name'] ?>
              <span>
                (<?php echo $row['count'] ?>)
              </span>
            </a>
            
            <?php
          
              }
            ?>
          </div>

         


        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="image/sushi1.jpg" alt="First slide" >
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="image/tempura1.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="image/pancakes.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">

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


            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" height="200px" src="<?php echo $photo ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <h4><?php echo $name ?></h4>
                  </h4>
                  <h5><?php echo $price ?>ks</h5>
                  <p class="card-text"><?php echo $description ?></p>
                </div>
                <div class="card-footer">
                  <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
                  <?php
                    if(isset($_SESSION['login_user']))
                    {
                  ?>
                  <button class="btn btn-secondary float-right btn_add" data-id="<?php echo $id ?>" data-name="<?php echo $name ?>" data-price="<?php echo $price ?>" data-photo="<?php echo $photo ?>"><i class="fas fa-shopping-cart"></i>Add to cart</button>
                  <?php
                    }else{
                  ?>
                    <button class="btn btn-secondary float-right" onclick="return alert('You are not login yet!!')">Add to card</button>
                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>

           <?php
              $i++;
                }

              ?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

  </div>

<?php
  require 'frontend_footer.php';
?>