<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin</title>
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
  <link href="../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
  <link href="../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
  <link href="../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
  <link href="../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
  <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
  <link href="../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
  <link href="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/plugins.css">
  <link rel="stylesheet" href="../assets/css/themes/theme-1.css" id="skin_color" />
  <!-- jQuery -->
  <script id="jQueryScript" src="../vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript">
    function valid() {
      if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.adddoc.cfpass.focus();
        return false;
      }
      return true;
    }

    function checkemailAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'emailid=' + $("#docemail").val(),
        type: "POST",
        success: function(data) {
          $("#email-availability-status").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {}
      });
    }
  </script>
</head>

<body>
  <div id="app">
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">
      <header class="navbar navbar-default navbar-static-top">

        <div class="navbar-header">
          <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
            <i class="ti-align-justify"></i>
          </a>
          <a class="navbar-brand" href="#">
            <h2 style="padding-top:20% ">H M <span style="color:#20d34a;">S</span></h2>
            <h2 class="logo_box">+</h2>
          </a>
          <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
            <i class="ti-align-justify"></i>
          </a>
          <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="ti-view-grid"></i>
          </a>
        </div>

        <div class="navbar-collapse collapse">
          <a class="navbar-brand hidden-xs hidden-sm" href="#">
            <h2>Hospital Management System </h2>
          </a>
          <ul class="nav navbar-right">
            <!-- start: MESSAGES DROPDOWN -->
            <li class="nav-item dropdown current-user">
              <a href class="dropdown-toggle" data-toggle="dropdown">
                <img src="../assets/images/images.jpg"> <span class="username">
                  Admin
                  <i class="ti-angle-down"></i></i></span>
              </a>
              <ul class="dropdown-menu dropdown-light">
                <li>
                  <a href="change-password.php">
                    Change Password
                  </a>
                </li>
                <li>
                  <a href="logout.php">
                    Log Out
                  </a>
                </li>
              </ul>
            </li>
          </ul>

          <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
            <div class="arrow-left"></div>
            <div class="arrow-right"></div>
          </div>

        </div>
      </header>