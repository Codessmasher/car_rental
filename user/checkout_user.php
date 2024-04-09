<?php
require('../includes/header_user.php');
if (!isset($_SESSION['usercvgfth'])) {
  header('location:login_user.php');
}

if (isset($_POST['rent_car'])) {
  $rentpday = $_POST['rentpday'];
  $id = $_POST['id'];
  $dist = $_POST['dist'];
  $city = $_POST['city'];
  $pin = $_POST['pin'];
  $contact = $_POST['contact'];
  $trom_date = strtotime($_POST['from_date']);
  $from_date = $_POST['from_date'];
  $nodays = $_POST['nodays'];
  $day_diff = $nodays * 60 * 60 * 24;
  $do_date = $trom_date + $day_diff;
  $to_date = date("d/m/Y", $do_date);
  $user = $_SESSION['usercvgfth'];
  $payment = $rentpday * $nodays;
  $t = time();
  $ts = date("d/m/Y", $t);
  $car = $user . " rented";
  $order = "update cars set from_date='$from_date',to_date='$to_date',nodays='$nodays',user='$user',payment='$payment',dist='$dist',city='$city',pin='$pin',contact='$contact',order_date='$ts',status='$car' where id='$id'";
  $order_run = mysqli_query($con, $order);
  if ($order_run) {
    $_SESSION['ordersydffdf'] = $_POST['id'];
    header('location:payment_user.php');
  } else {
    echo "error" . mysqli_error($con);
  }
}

?>

<!--end of navbar-->
<div class="table table-bordered d-flex justify-content-center" style="background-color:white">
  <div class="card" style="width: 20rem;">
    <div class="card-body">
      <?php if (isset($_POST['rent'])) {
        $id = $_POST['id'];
        $upq = "select * from cars where id='$id'";
        $ruq = mysqli_query($con, $upq);
        while ($rpw = mysqli_fetch_array($ruq)) {
      ?>
          <?php echo '<img src="../images/' . $rpw['vehicle_image'] . '" width="120px" height="100px">' ?>
          <h5 class="card-title"><?php echo "Vehicle No:" . $rpw['vehicle_nmbr'] ?></h5>
          <p class="card-text">Rent per Day:<?php echo $rpw['rentpday'] ?>₹</p>

          <form method="post" action="checkout_user.php">
            <input type="hidden" name="id" value="<?php echo $rpw['id'] ?>">
            <input type="hidden" name="rentpday" value="<?php echo $rpw['rentpday'] ?>">
            <label for="exampleInputEmail1">Enter Start Date</label>
            <input type="date" class="form-control" name="from_date" placeholder="DD/MM/YYYY" required>
            <label for="exampleInputEmail1">Select Number Of Days</label>
            <select name="nodays" class="form-select" aria-label="Default select example" required>
              <option value="1" selected>one</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
              <option value="4">four</option>
              <option value="5">five</option>
              <option value="6">six</option>
              <option value="7">seven</option>
            </select>
            <label for="exampleInputEmail1">Enter District</label>
            <input type="text" class="form-method" name="dist" required>
            <label for="exampleInputEmail1">Enter City</label>
            <input type="text" class="form-method" name="city" required>
            <label for="exampleInputEmail1">Enter pincode</label>
            <input type="text" class="form-method" name="pin" required>
            <label for="exampleInputEmail1">Enter Contact Number</label>
            <input type="text" class="form-method" name="contact" required>
            <button type="submit" class="btn btn-primary m-1 align-center" name="rent_car">Rent Car</button>
          </form>
      <?php
        }
      } ?>
    </div>
  </div>
</div> 
 