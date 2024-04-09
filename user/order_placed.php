<?php
require('../includes/header_user.php');
if (!isset($_SESSION['usercvgfth'])) {
  header('location:login_user.php');
}

if (isset($_POST['rent'])) {

  $id = $_POST['id'];
  $from_date = $_POST['from_date'];
  $nodays = $_POST['nodays'];
  $user = $_SESSION['usercvgfth'];
  $order = "insert into cars(id,nodays,user) values('$id','$nodays','$user') ";
  $order_run = mysqli_query($con, $order);
  if ($order_run) {
    $_SESSION['ordersydffdf'] = $_POST['id'];
    header('location:dashboard_user.php');
  } else {
    echo "error";
  }
}
?>
