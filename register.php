<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="backend/back/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="backend/back/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(to left,#928dab,#3fada8);">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block" style="background-image: url('image/dessert.jpeg'); background-position: center;background-size: cover;"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="create_acc.php" enctype="multipart/form-data">
                
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" name="name">
                  </div>
                  <!-- <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Name">
                  </div> -->
                
                  <?php
                    // $status=$_REQUEST['status'];
                    if(isset($_REQUEST['status'])){
                      echo '<label class="text-danger">Email Alerady Exit</label>';
                    }
                  ?>

                  <div class="form-group row">
                      <div class="col-md-6 col-sm-12">
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email">
                      </div>

                      <div class="col-md-6 col-sm-12">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                      </div>
                  </div>
                  

                  <div class="form-group row">
                      <div class="col-md-6 col-sm-12">
                        <input type="text" class="form-control form-control-user" id="phone" placeholder="Phone Number" name="phone">
                      </div>

                      <div class="col-md-6 col-sm-12">
                        <input type="file" class="form-control-file form-control-user" id="image" name="profile">
                      </div>
                  </div>
                     

                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control"  name="address">
                      
                    </textarea>
                  </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block mx-3">
                  Register Account
                </button>
                <hr>
                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="backend/back/vendor/jquery/jquery.min.js"></script>
  <script src="backend/back/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="backend/back/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="backend/back/js/sb-admin-2.min.js"></script>

</body>

</html>
