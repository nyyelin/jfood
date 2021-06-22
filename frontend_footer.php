
 </div>

<!-- profile modal -->
<div class="modal" id="profile" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

  <form method="post" action="profile_update.php" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Profile Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row mx-4">
          <label>Photo:</label>
          <div class="col-md-8 ml-2">
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
                <img src="<?php echo $_SESSION['login_user']['profile'] ?>" class="img-fluid" width="120px">
              </div>

              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                <input type="hidden" name="oldphoto" value="<?php echo $_SESSION['login_user']['profile'] ?>">

                <input type="hidden" name="id" value="<?php echo $_SESSION['login_user']['id'] ?>">
                
                <input type="file" name="newphoto" class="form-control-file">
              </div>
              
            </div>
          </div>
          </div>

          <div class="form-group row mx-4">
            <label class="col-sm-2 col-form-label">Name:</label>
            <div class="col-md-8 ml-2">
              <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['login_user']['name'] ?>">
            </div>
          </div>

           <div class="form-group row mx-4">
            <label class="col-sm-2 col-form-label">Email:</label>
            <div class="col-md-8 ml-2">
              <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['login_user']['email'] ?>">
            </div>
          </div>

           <div class="form-group row mx-4">
            <label class="col-sm-2 col-form-label">Phone:</label>
            <div class="col-md-8 ml-2">
              <input type="text" name="phone" class="form-control" value="<?php echo $_SESSION['login_user']['phone'] ?>">
            </div>
          </div>

           <div class="form-group row mx-4">
            <label class="col-sm-2 col-form-label">Address:</label>
            <div class="col-md-8 ml-2">
              <textarea class="form-control" name="address">
                <?php echo $_SESSION['login_user']['address'] ?>
              </textarea>
            </div>
          </div>

      
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>

    </form>
  </div>
</div>



<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="frontend/front/vendor/jquery/jquery.min.js"></script>
  <script src="frontend/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


 <script type="text/javascript" src="custom.js"></script>


</body>

</html>