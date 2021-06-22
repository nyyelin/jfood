<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="shorticon" type="text/css" href="image/logo.jpg"> -->
  <title>JFood Shop</title>

  <!-- site logo -->
  <link rel="icon" type="text/css" href="image/pinterest_profile_image.png">
  <!-- Bootstrap core CSS -->
  <link href="frontend/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="backend/back/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template -->
  <link href="frontend/front/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="image/logo1.png" class="img-fluid" width="50px">
      Foods From Jp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
            
          </li> -->

          <li class="nav-item item_count">
            <a class="nav-link" href="cart.php">
              <i class="fas fa-shopping-cart text-white"></i>
              <span class="badge badge-pill badge-danger count_num">0</span></a>
            
          </li>

          <?php
            if(isset($_SESSION["login_user"])){

          ?>


            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 lg">
                  <?php echo $_SESSION['login_user']['name'] ?>
                </span>
                <img class="rounded-circle" width="25px" src="<?php echo $_SESSION['login_user']['profile'] ?>">
              </a>
              <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a href="profile.php?id=<?php echo $_SESSION['login_user']['id'] ?>" class="dropdown-item">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <!-- 
                  <button class="dropdown-item profile_modal" data-target="#profile" data-toggle="modal" data-name="<?php echo $_SESSION['login_user']['name'] ?>" date-image="<?php echo $_SESSION['login_user']['profile'] ?>" data-email="<?php echo $_SESSION['login_user']['email'] ?>" data-address="<?php echo $_SESSION['login_user']['address'] ?>" data-phone="<?php echo $_SESSION['login_user']['phone'] ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </button> -->
                  <a class="dropdown-item" href="#">
                    <a href="#" data-target="#password" data-toggle="modal" class="dropdown-item"> Change Password </a>
                 
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php" onclick="return confirm('Are you ready to end the process!!')">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>



          <?php
            }
            else{

          ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Regiseter</a>
            
          </li>

          <?php

            }
          ?>

          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    
    <!-- /.row -->

 
  <!-- /.container -->

  <!-- Footer -->
  
