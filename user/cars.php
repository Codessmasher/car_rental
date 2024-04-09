<?php
require('../includes/header_user.php');
?>
<link rel="stylesheet" href="cars.css">
<!--end of navbar-->
    
<div class="container justify-content-center">
  <div class="row" id="responsive">

    <?php
    $upq = "select * from cars";

    $ruq = mysqli_query($con, $upq);

    while ($rpw = mysqli_fetch_array($ruq)) {
    ?>
      <div class="card col-2 m-3">
        <?php echo '<img src="../images/' . $rpw['vehicle_image'] . '" width="120px" height="100px">' ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo "Vehicle No:" . $rpw['vehicle_nmbr'] ?></h5>
          <p class="card-text">Rent per Day:<?php echo '₹' . '&nbsp' . $rpw['rentpday'] . "/-" ?></p>
          <p class="card-text">Agency Name: <span class="text-warning"><?php echo '<br>' ?><?php echo $rpw['vehicle_agency'] ?></span></p>
          <form action="checkout_user.php" method="post">
            <input type="hidden" name="id" value="<?php echo $rpw['id']; ?>">
            <?php
            if ($rpw['orderId'] != "") {
            ?>
              <span class="text-primary">BOOKED</span>
            <?php

            } else if ($rpw['status'] != 'AVAILABLE') {
            ?>
              <span class="text-danger">NOT AVAILABLE</span>
            <?php
            } else {
            ?>
              <button type="submit" class="btn btn-primary" name="rent">Rent Car</button>
            <?php
            }
            ?>
          </form>
        </div>
      </div>

    <?php
    } ?>
  </div>
</div>
 