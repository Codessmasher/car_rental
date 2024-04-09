<?php
require('../includes/header_user.php');
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $query = "INSERT INTO `user`(`name`, `phone`, `email`, `username`, `pass`, `address`, `photo`) VALUES ('$name','$phone','$email','$username','$password','$address','')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['usercvgfth'] = $username;
        header('location:../index.php');
        exit();
    } else {
        echo "error";
    }
}

?>

<div class="container h-100">
    <div class="d-flex mt-5 justify-content-center h-80">
        <div class="user_card h-100">
            <div class="d-flex justify-content-center form_container">
                <div class="brand_logo_container">
                    <img src="../images/car3.jpg" class="brand_logo" alt="Logo">
                </div>
                <form method="post" action="user_regn.php">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="name" class="form-control input_user" value="" placeholder="name">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="number" name="phone" class="form-control input_pass" value="" placeholder="phone">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control input_pass" value="" placeholder="email">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control input_pass" value="" placeholder="username">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="text" name="address" class="form-control input_pass" value="" placeholder="address">
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="signup" class="btn login_btn">User Signup</button>
                    </div>
                </form>

            </div>
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Have an account? <a href="login_user.php" class="ml-2">Log in</a>
                </div>
            </div>
        </div>

    </div>
</div>