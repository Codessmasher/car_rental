<?php
require("../includes/header_agency.php");
?>
<!--end of navbar-->

<table class="table table-bordered" style="background-color:white">
  <div class="card" style="width: 18rem;">
    <?php
    $upq = "select * from cars";

    $ruq = mysqli_query($con, $upq);

    while ($rpw = mysqli_fetch_array($ruq)) {
    ?>
      <?php echo '<img src="../images/' . $rpw['vehicle_image'] . '" width="120px" height="100px">' ?>
      <div class="card-body">
        <form action="cars.php" method="post">
          <select class="form-select" aria-label="Default select example">
            <option selected>No. Of Days</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <input type="text" name="start_date" placeholder="start date :dd/mm/yy">

          </select>
          <h5 class="card-title"><?php echo $rpw['vehicle_nmbr'] ?>₹</h5>
          <p class="card-text">Rent per Day:<?php echo $rpw['rentpday'] ?>₹</p>
          <button type="submit" class="btn btn-primary" name="rent_car"> RENT CAR </button>
        </form>
      </div>
  </div>
</table>

<?php
    }
?>