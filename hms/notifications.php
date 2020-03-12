<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
  if (isset($_POST['patient'])) {
    $query=mysqli_query($con,"update notification set isRead = '1' where id = '".$_POST['id']."'");
  } else if (isset($_POST['doctor'])) {
    $query=mysqli_query($con,"update notification set isReadDoc = '1' where id = '".$_POST['id']."'");
  } 
?>