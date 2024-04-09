<?php
ob_start();
require('../includes/header_user.php');

if(!isset($_SESSION['usercvgfth'])){
    header('location:login_user.php');
} 
if (isset($_POST['pay'])) {
    $id=$_SESSION['ordersydffdf'];
    $payment_method=$_POST['payment_method'];
    $orderId=rand(111111,999999);
    $qsy="update cars set payment_method='$payment_method',orderId='$orderId' where id='$id'";
    $qsy_run=mysqli_query($con,$qsy);
    if($qsy_run){
      $_SESSION['booked']=$vn;
      $_SESSION['orderId']=$orderId;
      header('location:user_order.php');
    }
    else {
     echo "error".mysqli_error($con);
    }
}
ob_end_flush(); 
?>

<div class="container">
<div class="jumbotron">
<h2>Pay Now</h2>
<p>Please Make The Payment through the payment method given below</p>
<table class="table table-bordered" style="background-color:white">
        <thead class="table-dark">
            <tr>
               <th> Vehicle </th>
               <th> Vehicle Number </th>
               <th> Pickup Date </th>
               <th> Total Payable </th>
            </tr>
        </thead>
<?php
    $qry="select * from cars where id='{$_SESSION['ordersydffdf']}'";
        $qry_run=mysqli_query($con,$qry);
          while($rtw=mysqli_fetch_array($qry_run)){
        $vn=$rtw['vehicle_nmbr']; 
?>
        <tbody>
            <td> <?php echo '<img src="../images/'.$rtw['vehicle_image'].'" width="120px" height="100px">'?></td>
            <td> <?php echo $rtw['vehicle_nmbr']?></td>
            <td> <?php echo $rtw['from_date']?></td>
            <td> <?php echo '₹'.'&nbsp'.$rtw['payment']?></td>
        </tbody>
<?php
}
?>
</table>

<form action="payment_user.php" method="post">
<div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" id="gridRadios1" value="online method" disabled>
          <div class="alert alert-danger" role="alert">
          <label class="form-check-label" for="gridRadios1">
            Online(upi,debit card,credit card) **coming soon :)**.
          </label>
           </div>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" id="gridRadios2" value="cash on delhivery" >
          <label class="form-check-label" for="gridRadios2">
           Cash On delivery
          </label>
        </div>
        <div class="form-group row">
         <div class="col-sm-10">
         <button type="submit" class="btn btn-primary" name="pay">Pay Now</button>
       </div>
         </div>
      </div>
    </div>
</form>
