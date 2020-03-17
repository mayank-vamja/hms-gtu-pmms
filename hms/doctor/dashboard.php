<?php include('include/header.php');?>

<!-- end: TOP NAVBAR -->
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Doctor | Dashboard</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>User</span>
          </li>
          <li class="active">
            <span>Dashboard</span>
          </li>
        </ol>
      </div>
    </section>
    <div class="container-fluid container-fullw bg-white">
      <div class="row">
        <a href="edit-profile.php">
          <div class="panel panel-white no-radius text-center">
            <div class="panel-body d-flex flex-row">
              <!-- <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i
                class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span> -->
              <span class="StepTitle">My Profile</span>

              <!-- <p class="links cl-effect-1">
                Update Profile
              </p> -->
            </div>
        </a>
      </div>
      <div class="row">
        <div class="panel panel-white no-radius text-center">
          <div class="panel-body  d-flex flex-row">
            <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i
                class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
            <h2 class="StepTitle">My Appointments</h2>

            <p class="cl-effect-1">
              <a href="appointment-history.php">
                View Appointment History
              </a>
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>

<?php include('include/footer.php');?>