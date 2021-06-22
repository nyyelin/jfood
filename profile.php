<?php
	require 'frontend_header.php';
?>

	<div class="container mt-5">
		<div class="row mx-5 px-5">
			<div class="col-4">
				<img src="<?php echo $_SESSION['login_user']['profile'];?>" class="img-fluid">
			</div>

			<div class="col-8">
				<h4> <?php echo $_SESSION['login_user']['name'];?> </h4>

				<p class="mt-5">
					<i class="fas fa-home mr-3"></i>

					<?php echo $_SESSION['login_user']['address'];?>
				</p>

				<p>
					<i class="fas fa-mobile-alt mr-4"></i>

					<?php echo $_SESSION['login_user']['phone'];?>
				</p>

				<p>
					<i class="fas fa-inbox mr-3"></i>

					<?php echo $_SESSION['login_user']['email'];?>
				</p>

				<div class="row">
					<div class="col-6">
						<a href="#" class="btn btn-primary" data-target="#profile" data-toggle="modal"> Profile Update </a>
					</div>

					<div class="col-6">
						<a href="#" data-target="#password" data-toggle="modal" class="btn btn-info"> Change Password </a>
					</div>

				</div>

			</div>
		</div>
	</div>



	 <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
   		<form action="changepassword.php" method="post">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
		          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">×</span>
		          </button>
		        </div>
		        <div class="modal-body">
		        	<input type="hidden" name="id" value="<?php echo $_SESSION['login_user']['id'] ?>">
		        	<input type="password" name="pass" class="form-control rounded" >
		        </div>
		        <div class="modal-footer">
		          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		         <button class="btn btn-info" type="submit">
		         	Change
		         </button>
		        </div>
		      </div>
		</form>
    </div>
  </div>


<?php
	require 'frontend_footer.php';
?>