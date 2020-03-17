<?php 
  error_reporting(0);
  session_start();
  error_reporting(0);
  require('config.php');
  require('checklogin.php');
  check_login();
  
  $userId = $_SESSION['id'];
  $query = mysqli_query($con,"select count(*) from notification where doctorId=".$_SESSION['id']." and isReadDoc = '0'");
  if($query) {
    $row=mysqli_fetch_array($query);
    $notificationCount = $row[0];
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Doctor | Dashboard</title>

  <!-- LODASH & D3 & GOOGLE_CHARTS LIBRARY : TODO CHANGE WITH vendor/... 
      AND Install via Composer 
  -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
  <script src="https://d3js.org/d3.v5.min.js"></script> -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <link
    href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
    rel="stylesheet" type="text/css" />
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


</head>

<body>
  <div id="app">
    <?php include('include/sidebar.php');?>
    <div class="app-content">
      <header class="navbar navbar-default navbar-static-top">
        <!-- start: NAVBAR HEADER -->
        <div class="navbar-header">
          <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle"
            data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
            <i class="ti-align-justify"></i>
          </a>
          <a class="navbar-brand" href="#">
            <h2 style="padding-top:20% ">HMS</h2>
          </a>
          <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed"
            data-toggle-target="#app">
            <i class="ti-align-justify"></i>
          </a>
          <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse"
            href=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="ti-view-grid"></i>
          </a>
        </div>
        <!-- end: NAVBAR HEADER -->
        <!-- start: NAVBAR COLLAPSE -->
        <div class="navbar-collapse collapse">
          <a class="navbar-brand" href="#">
            <h2>HMS </h2>
          </a>
          <ul class="nav navbar-right">
            <!-- start: MESSAGES DROPDOWN -->
            <li class="nav-item mr-auto fa-2x" style="padding-top:8%;">
              <span onclick="showNotifications()"><i class="fa fa-bell"></i></span>
              <?php if($notificationCount > 0) echo "<span class='badge badge-pill badge-danger'>".$notificationCount."</span>" ?>
            </li>

            <li class="dropdown current-user">
              <a href class="dropdown-toggle" data-toggle="dropdown">
                <img src="../assets/images/images.jpg"> <span class="username">
                  <?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
                        while($row=mysqli_fetch_array($query))
                        {echo $row['fullName'];}
									?> <i class="ti-angle-down"></i></i></span>
              </a>
              <ul class="dropdown-menu dropdown-light">
                <li><a href="edit-profile.php">My Profile</a></li>
                <li> <a href="change-password.php"> Change Password </a> </li>
                <li> <a href="logout.php"> Log Out </a> </li>
              </ul>
            </li>
            <!-- end: USER OPTIONS DROPDOWN -->
          </ul>
          <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
          <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
            <div class="arrow-left"></div>
            <div class="arrow-right"></div>
          </div>
          <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
        </div>


        <!-- end: NAVBAR COLLAPSE -->
      </header>

      <div id="notifications-popup" class="notifications-popup" style="">
        <div class="notification-header">
          <span onclick="hideNotifications()" style="color:white"><i class="fa fa-close fa-3x"></i></span>
          <h2 style="display: inline;" class="text-white"> Notifications
            <?php if($notificationCount > 0) echo "<span class='badge badge-pill badge-danger' style='font-size: large'>".$notificationCount."</span>" ?>
          </h2>
        </div>
        <ul class="notification-list">
          <?php 
      $userId = $_SESSION['id'];
			$query = mysqli_query($con,"select users.fullName as userName,notification.*  from notification join users on users.id=notification.userId where notification.doctorId='".$_SESSION['id']."' order by createdAt DESC");
			if($query) {
				while($row=mysqli_fetch_array($query))
        {  ?>

          <?php if(!$row['isReadDoc']) { ?>
          <a href="">
            <li class="notification-item unread-notification"
              onclick="clickNotification('<?php echo $row['link'] ?>', '<?php echo $row['id'] ?>')">
              <?php
	    	} else { ?>
              <a href="<?php echo $row['link'] ?>">
            <li class="notification-item">
              <?php } ?>
              <p><strong><?php echo $row['userName']." " ?></strong><?php echo $row['messageDoc'] ?></p>
              <p class="notification-date">
                <?php echo date("F j, Y, g:i a",strtotime($row['createdAt'])); ?>
              </p>
            </li>
          </a>
          <?php }
			} ?>
        </ul>
      </div>

      <!-- <script src="../vendor/jquery/jquery.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="../vendor/modernizr/modernizr.js"></script>
      <script src="../vendor/jquery-cookie/jquery.cookie.js"></script>
      <script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script src="../vendor/switchery/switchery.min.js"></script> -->

      <script>
      function clickNotification(link, id = null) {
        id ? $.ajax({
            type: "POST",
            url: 'notifications.php',
            data: {
              doctor: true,
              link: link,
              id: id
            },
            success: function(html) {
              // alert(html);
              window.location.href = link;
            }
          }) :
          window.location.href = link;
      }

      function showNotifications() {
        $("#notifications-popup").animate({
          right: 0
        });
        // $("#notifications-popup").toggle("slow");
      }

      function hideNotifications() {
        $("#notifications-popup").animate({
          right: "-=360px"
        });
        // $("#notifications-popup").toggle("slow");
      }
      </script>