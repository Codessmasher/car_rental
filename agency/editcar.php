<?php
require("../includes/header_agency.php");

// Check if user is logged in
if (!isset($_SESSION['agencyxy'])) {
  header('location:login_agency.php');
}

// Update car details
if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $vehicle_mdl = $_POST['vehicle_mdl'];
  $vehicle_nmbr = $_POST['vehicle_nmbr'];
  $vehicle_image = $_FILES["vehicle_image"]["name"];
  $seat_capacity = $_POST['seat_capacity'];
  $rentpday = $_POST['rentpday'];
  $status = $_POST['status'];

  // Get today's date in d/m/Y format
  $today_date = date("d/m/Y");

  // Update query only if to_date is greater than today's date
  $query = "UPDATE cars 
          SET 
            vehicle_mdl='$vehicle_mdl',
            vehicle_nmbr='$vehicle_nmbr',
            vehicle_image='$vehicle_image',
            seat_capacity='$seat_capacity',
            rentpday='$rentpday',
            status='$status',
            nodays='',
            from_date='',
            user='',
            dist='',
            city='',
            pin='',
            contact='',
            payment_method='',
            payment='',
            order_date='',
            orderId='',
            to_date=''
          WHERE 
            id='$id'
            AND (to_date = '' OR STR_TO_DATE(to_date, '%d/%m/%Y') < STR_TO_DATE('$today_date', '%d/%m/%Y'))";



  $qry_run = mysqli_query($con, $query);
  if ($qry_run) {
    move_uploaded_file($_FILES["vehicle_image"]["tmp_name"], "../images/" . $_FILES["vehicle_image"]["name"]);
    $_SESSION['data_add/delete'] = "Data Updated Successfully";
    header('location:dashboard_agency.php');
  } else {
    $_SESSION['data_add/delete'] = "Data Not Updated,Try Again";
    header('location:dashboard_agency.php');
  }
}

if (isset($_POST['close'])) {
  header('location:dashboard_agency.php');
}

?>

<!--end of navbar-->
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Car Details</h5>

    </div>
    <div class="modal-body">
      <form method="post" action="editcar.php" enctype="multipart/form-data">

        <?php
        if (isset($_POST['edit_btn'])) {
          $id = $_POST['id'];
          $upq = "select * from cars where id='$id'";

          $ruq = mysqli_query($con, $upq);

          while ($rpw = mysqli_fetch_array($ruq)) {
        ?>
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $rpw['id'] ?>">
            </div>
            <div class="form-group">
              <label>Vehicle Model</label>
              <input type="text" class="form-control" name="vehicle_mdl" placeholder="<?php echo $rpw['vehicle_mdl'] ?>" value="<?php echo $rpw['vehicle_mdl'] ?>">
            </div>

            <div class="form-group">
              <label>Vehicle Number</label>
              <input type="text" class="form-control" name="vehicle_nmbr" placeholder="<?php echo $rpw['vehicle_nmbr'] ?>" value="<?php echo $rpw['vehicle_nmbr'] ?>">
            </div>

            <div class="form-group">
              <label>Vehicle Image</label>
              <input type="file" class="form-control" name="vehicle_image" value="<?php echo '../images/' . $rpw['vehicle_image'] ?>">
              <tr>
                <td><?php echo '<img src="../images/' . $rpw['vehicle_image'] . '" width="120px" height="100px">' ?></td>
              </tr>
            </div>

            <div class="form-group">
              <label>Seat Capacity</label>
              <input type="text" class="form-control" name="seat_capacity" placeholder="<?php echo $rpw['seat_capacity'] ?>" value="<?php echo $rpw['seat_capacity'] ?>">
            </div>

            <div class="form-group">
              <label>Rent Per Day</label>
              <input type="text" class="form-control" name="rentpday" placeholder="<?php echo $rpw['rentpday'] ?>" value="<?php echo $rpw['rentpday'] ?>">
            </div>

            <div class="form-group">
              <label>Creation Date</label>
              <input type="text" class="form-control" name="date" placeholder="<?php echo $rpw['date'] ?>" readonly>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control" required>
                <option value="AVAILABLE" selected>AVAILABLE</option>
                <option value="NOT AVAILABLE">NOT AVAILABLE</option>
              </select>
            </div>



    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
      </form>
      <form action="editcar.php" method="post">
        <button type="close" class="btn btn-secondary" name="close">Close</button>
      </form>
    </div>
<?php
          }
        }
?>
  </div>
</div>