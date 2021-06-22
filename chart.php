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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="mychart"></canvas>
                  </div>
                  <hr>
                  Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
                </div>
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