<?php
  session_start();
  error_reporting(0);
  include('include/config.php');
  include('include/checklogin.php');
  check_login();
  
  if($_GET['id']) {
    $ret = mysqli_query($con, "select * from departments where id = '" . $_GET['id'] . "'");
    while ($row = mysqli_fetch_array($ret)) {
      $response = $row;
      echo json_encode($response);
    break;
    }
  }
