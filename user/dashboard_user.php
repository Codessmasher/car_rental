<?php
require('../includes/header_user.php');

if (!isset($_SESSION['usercvgfth'])) {
  header('location:login_user.php');
}
