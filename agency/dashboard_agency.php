<?php
require("../includes/header_agency.php");

if (!isset($_SESSION['agencyxy'])) {
  header('location:login_agency.php');
}
?>

<!--end of navbar-->

<!-- add car  Modal for add the value of cars table-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Car Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form for adding a car -->
        <form method="post" action="add_new_car.php" enctype="multipart/form-data">
          <div class="form-group">
            <label>Vehicle Model</label>
            <input type="text" class="form-control" name="vehicle_mdl" placeholder="Vehicle Model" required>
          </div>

          <div class="form-group">
            <label>Vehicle Number</label>
            <input type="text" class="form-control" name="vehicle_nmbr" placeholder="Vehicle Number" required>
          </div>

          <div class="form-group">
            <label>Vehicle Image</label>
            <input type="file" class="form-control" name="vehicle_image" placeholder="Vehicle Image" required>
          </div>

          <div class="form-group">
            <label>Seat Capacity</label>
            <input type="text" class="form-control" name="seat_capacity" placeholder="Seat Capacity" required>
          </div>

          <div class="form-group">
            <label>Rent Per Day</label>
            <input type="text" class="form-control" name="rentpday" placeholder="Rent Per Day" required>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add">ADD CAR </button>
      </div>
      </form>
      <!-- form ended -->

    </div>
  </div>
</div>
<!-- END OF ADD CAR DETAILS-->

<!-- Delete Modal for Delete the value of cars table-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="eDITModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!--starting of cars dashboard table-->

<div class="container">
  <div class="jumbotron">
    <h2> Welcome To Car Agency Dashboard</h2>
    <!--add alert for adding data -->
    <?php
    if (isset($_SESSION['data_add/delete']) && $_SESSION['data_add/delete'] != '') {
      echo '<div class="alert alert-success" role="alert">';
      echo '<h>' . $_SESSION['data_add/delete'] . '</h>';
      echo '</div>';
      unset($_SESSION['data_add/delete']);
    }

    ?>
    <!--add new car-->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"> ADD NEW CAR </button></th>
    <hr>
    <?php
    $query = "select * from cars where vehicle_agency='{$_SESSION['agencyxy']}'";
    $query_run = mysqli_query($con, $query);

    ?>
    <table class="table table-bordered" style="background-color:white">
      <thead class="table-dark">
        <tr>
          <th> ID </th>
          <th> Vehicle Model </th>
          <th> Vehicle Number </th>
          <th> Vehicle Image </th>
          <th> Seat Capacity </th>
          <th> Rent Per Day </th>
          <th> Creation Date </th>
          <th> Status </th>
          <th> EDIT </th>
          <th> DELETE </th>


        </tr>

      </thead>
      <?php
      if (mysqli_num_rows($query_run) > 0) {

        while ($row = mysqli_fetch_array($query_run)) {


      ?>
          <tbody>
            <tr>
              <th> <?php echo $row['id']; ?> </th>
              <th> <?php echo $row['vehicle_mdl']; ?> </th>
              <th> <?php echo $row['vehicle_nmbr']; ?> </th>
              <th> <?php echo '<img src="../images/' . $row['vehicle_image'] . '" width="120px" height="100px">' ?> </th>
              <th> <?php echo $row['seat_capacity']; ?> </th>
              <th> <?php echo $row['rentpday']; ?> </th>
              <th> <?php echo $row['date']; ?> </th>
              <th> <?php echo $row['status']; ?> </th>
              <form action="editcar.php" method="post">
                <input type="hidden" name='id' value="<?php echo $row['id'] ?>">
                <th><button type="submit" class="btn btn-primary" name="edit_btn"> EDIT </button></th>
              </form>
              <form action="delete_cars.php" method="post">
                <input type="hidden" name='id' value="<?php echo $row['id'] ?>">
                <th><button type="delete" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"> DELETE </button></th>
              </form>
              </form>
            </tr>
          </tbody>
      <?php
        }
      } else {
        echo "No record found";
      }

      ?>
    </table>

  </div>
</div>