<?php 

require('../includes/header_user.php');
if (isset($_SESSION['usercvgfth'])) {
	header('location:user_order.php');
}

if(isset($_POST['login'])) {
      $username=$_POST['username'];
      $pass=$_POST['pass'];
      
      $query="select * from user where username='$username' and pass='$pass'";
      $query_run=mysqli_query($con,$query);
      if(mysqli_num_rows($query_run)>0){
          $_SESSION['usercvgfth']=$_POST['username'];
          header('location:../index.php'); 
      }
      else{
          echo "<h1 align='center'  class='text-danger'>Wrong Username or Password</h1>";
      }
      
}
 
?>
 
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../images/car4.avif" class="brand_logo" alt="Logo" width="200px" height="200px">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post" action="login_user.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="login" class="btn login_btn">User Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="user_regn.php" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div> 
