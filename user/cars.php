<?php
require('../includes/header_user.php');
?>

<!--end of navbar-->
<div class="container">
  <div class="row justify-content-center">

    <?php
    $upq = "select * from cars";

    $ruq = mysqli_query($con, $upq);

    while ($rpw = mysqli_fetch_array($ruq)) {
    ?>
      <div class="card col-2 m-3" style="width: 20rem;">
        <?php echo '<img src="../images/' . $rpw['vehicle_image'] . '" width="120px" height="100px">' ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo "Vehicle No:" . $rpw['vehicle_nmbr'] ?></h5>
          <p class="card-text">Rent per Day:<?php echo '₹' . '&nbsp' . $rpw['rentpday'] . "/-" ?></p>
          <p class="card-text">DESCRIPTION:<?php echo '<br>' ?><?php echo $rpw['car_desc'] ?></p>
          <form action="checkout_user.php" method="post">
            <input type="hidden" name="id" value="<?php echo $rpw['id']; ?>">
            <?php
            if ($rpw['orderId'] != "") {
            ?>
              <span class="text-primary">BOOKED</span>
            <?php

            }else if($rpw['status']!='AVAILABLE'){
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>