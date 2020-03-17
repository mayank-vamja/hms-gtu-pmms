<?php error_reporting(0);
  $userId = $_SESSION['id'];
  $query = mysqli_query($con,"select count(*) from notification where userId=".$_SESSION['id']." and isRead = '0'");
  if($query) {
    $row=mysqli_fetch_array($query);
    $notificationCount = $row[0];
  } 
?>

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
    <!-- <h2>HMS </h2> -->
    <ul class="nav navbar-right">
      <!-- start: MESSAGES DROPDOWN -->
      <li class="nav-item mr-auto fa-2x" style="padding-top:8%;">
        <span onclick="showNotifications()"><i class="fa fa-bell"></i></span>
        <?php if($notificationCount > 0) echo "<span class='badge badge-pill badge-danger'>".$notificationCount."</span>" ?>
      </li>


      <li class="dropdown current-user">
        <a href class="dropdown-toggle" data-toggle="dropdown">
          <img src="assets/images/images.jpg"> <span class="username">



            <?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
	echo $row['fullName'];
}
									?> <i class="ti-angle-down"></i></i></span>
        </a>
        <ul class="dropdown-menu dropdown-light">
          <li>
            <a href="edit-profile.php">
              My Profile
            </a>
          </li>

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
    <h2 style="display: inline;" class="text-white">
      Notifications
      <?php if($notificationCount > 0) echo "<span class='badge badge-pill badge-danger'>".$notificationCount."</span>" ?>
    </h2>
  </div>
  <ul class="notification-list">
    <?php 
			$query = mysqli_query($con,"select doctors.doctorName as docname,notification.*  from notification join doctors on doctors.id=notification.doctorId where notification.userId='".$_SESSION['id']."' order by createdAt DESC");
			if($query) {
				while($row=mysqli_fetch_array($query))
				{ ?>
    <!-- <a href="<?php echo $row['link'] ?>"> -->
    <?php if(!$row['isRead']) { ?>
    <a href="">
      <li class="notification-item unread-notification"
        onClick="clickNotification('<?php echo $row['link'] ?>', '<?php echo $row['id'] ?>')">
        <?php
    } else { ?>
        <a href="<?php echo $row['link'] ?>">
      <li class="notification-item">
        <?php } ?>
        <p><?php echo $row['message'] ?></p>
        <p>To doctor <strong><?php echo $row['docname'] ?></strong></p>
        <p class="notification-date">
          <?php echo date("F j, Y, g:i a",strtotime($row['createdAt'])); ?>
        </p>
      </li>
    </a>
    <!-- </a> -->
    <?php }
			} ?>
  </ul>
</div>

<script>
function clickNotification(link, id = null) {
  id ? $.ajax({
      type: "POST",
      url: 'notifications.php',
      data: {
        patient: true,
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