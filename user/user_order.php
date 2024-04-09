<?php
require('../includes/header_user.php');
if (!isset($_SESSION['usercvgfth'])) {
  header('location:login_user.php');
}

?>

<div class="d-flex flex-column justify-content-center align-items-center">

  <?php
  $currUser = $_SESSION['usercvgfth'];
  $upq = "SELECT * FROM cars WHERE user = '$currUser'";
  $ruq = mysqli_query($con, $upq);

  if (mysqli_num_rows($ruq) > 0) { // Check if there are any rows returned
    while ($rpw = mysqli_fetch_assoc($ruq)) { 
      echo "<img class='m-2 rounded-circle' src='../images/" . $rpw['vehicle_image'] . "' width='200px' height='200px'>";
      echo " <h2> vehicle number is " . $rpw['vehicle_nmbr'] . " </h2>";
      echo "<h1>You have booked and your order id is " . $rpw['orderId'] . " </h1> <br>";
      echo "<h1>You have booked from " . $rpw['from_date'] . " to " . $rpw['to_date'] . " </h1>";
    }
  } else {
    echo "<h1>You have not booked any car</h1>";
  }
  ?>
  <!-- <img src="images/car1.webp" alt=""> -->
</div>

</h1>
</div>