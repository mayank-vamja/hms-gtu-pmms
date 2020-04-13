<?php include('include/header.php'); ?>

<!-- end: TOP NAVBAR -->
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Doctor > Dashboard</h1>
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
    <div class="container-fluid container-fullw">
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <a href="edit-profile.php">
            <div class="panel panel-white text-center fixed-height-card">
              <div class="panel-body h-card">
                <!-- <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i
                class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span> -->
                <span class="StepTitle">My Profile</span>
              </div>
              <div class="panel-footer ">
                <p>View and edit your profile.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="appointment-history.php">
            <div class="panel panel-white text-center fixed-height-card">
              <div class="panel-body h-card">
                <h2 class="StepTitle">My Appointments</h2>
              </div>
              <div class="panel-footer ">
                <p>View and manage your appointments which are booked and appointed to you.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('include/footer.php'); ?>