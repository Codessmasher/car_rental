<?php
require("../includes/header_agency.php");
if (isset($_SESSION['agencyxy'])) {
	header('location:dashboard_agency.php');
}
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$pass = $_POST['pass'];

	$query = "select * from car_agency where username='$username' and agent_pass='$pass'";
	$query_run = mysqli_query($con, $query);
	if (mysqli_num_rows($query_run) > 0) {
		$_SESSION['agencyxy'] = $_POST['username'];
		header('location:dashboard_agency.php');
	} else {
		echo "error";
	}
}

?>
<link rel="stylesheet" href="login_style.css" class="css">
<!--Coded with love by Mutiullah Samim-->

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../images/car3.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post" action="login_agency.php">
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
							<button type="submit" name="login" class="btn login_btn">Agency Login</button>
						</div> 
					</form>
				</div>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="new_agency.php" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>