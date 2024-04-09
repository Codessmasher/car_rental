<?php
require("../includes/header_agency.php");

if (isset($_POST['signup'])) {
	$agent_name = $_POST['agent_name'];
	$agent_email = $_POST['agent_email'];
	$agent_address = $_POST['agent_address'];
	$agent_phone = $_POST['agent_phone'];
	$username = $_POST['username'];
	$agent_pass = $_POST['agent_pass'];
	$qry = "select * from user where email='$agent_email'";
	$qry_run = mysqli_query($con, $qry);

	$quy = "select * from user where username='$username'";
	$quy_run = mysqli_query($con, $quy);

	$qpy = "select * from user where pass='$agent_pass'";
	$qpy_run = mysqli_query($con, $qpy);

	if (mysqli_num_rows($qry_run) > 0) {
		$_SESSION['data'] = "sorry,email id already exists with a customer **You are a staff** :) ";
		header('location:new_agency.php');
	} elseif (mysqli_num_rows($quy_run) > 0) {
		$_SESSION['data'] = "sorry,userid already exists with a customer **You are a staff** :) ";
		header('location:new_agency.php');
	} elseif (mysqli_num_rows($qpy_run) > 0) {
		$_SESSION['data'] = "sorry,Phone number already exists with a customer **You are a staff** :) ";
		header('location:new_agency.php');
	} else {
		$query = "insert into car_agency(agent_name,agent_email,agent_address,agent_phone,username,agent_pass)values('$agent_name','$agent_email','$agent_address','$agent_phone','$username','$agent_pass')";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			$_SESSION['agencyxy'] = $_POST['username'];
			header('location:../index.php');
		} else {
			echo "error";
		}
	}
}

?>
<!-- login css -->
<link rel="stylesheet" href="login_style.css" class="css">

<body>
	<div class="container mt-5 h-100">
		<div class="d-flex justify-content-center h-80">
			<div class="user_card h-100">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../images/car3.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">

					<form method="post" action="new_agency.php">
						<div class="input-group mb-3">
							<?php
							if (isset($_SESSION['data']) && $_SESSION['data'] != '') {
								echo '<div class="alert alert-danger" role="alert">';
								echo '<h>' . $_SESSION['data'] . '</h>';
								echo '</div>';
								unset($_SESSION['data']);
							}
							?>
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>

							<input type="text" name="agent_name" class="form-control input_user" value="" placeholder="Agent name
                            " required>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="email" name="agent_email" class="form-control input_user" value="" placeholder="Agent Email" required>
						</div>


						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="mobile number" name="agent_phone" class="form-control input_user" value="" placeholder="Mobile Number" required>
						</div>


						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="agent_address" class="form-control input_user" value="" placeholder="address" required>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username" required>
						</div>

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="agent_pass" class="form-control input_pass" placeholder="password" required>
						</div>

						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="signup" class="btn login_btn">Agency Signup</button>
						</div>
					</form>
				</div>


				<div class="d-flex justify-content-center links">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>