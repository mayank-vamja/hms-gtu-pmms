<?php include('include/header.php'); ?>

<!-- end: TOP NAVBAR -->
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Admin > Dashboard</h1>
        </div>
        <!-- <ol class="breadcrumb">
          <li>
            <span>Admin</span>
          </li>
          <li class="active">
            <span>Dashboard</span>
          </li>
        </ol> -->
      </div>
    </section>

    <div class="container-fluid container-fullw">
      <div class="row">

        <div class="col-sm-6 col-md-4">
          <a href="manage-users.php">
            <div class="panel panel-white text-center fixed-height-card">
              <div class="panel-body h-card">
                <span class="StepTitle">Users</span>
                <?php $result = mysqli_query($con, "SELECT * FROM users ");
                $num_rows = mysqli_num_rows($result);
                echo '<h4 class="badge" style="font-size:24px">' . $num_rows . '</h4>';
                ?>
              </div>
              <div class="panel-footer ">
                <p>Manage User of the system.</p>
              </div>
            </div>
          </a> </div>
        <div class="col-sm-6 col-md-4">
          <a href="manage-doctors.php">
            <div class="panel panel-white text-center fixed-height-card">
              <div class="panel-body h-card">
                <span class="StepTitle">Doctors</span>
                  <?php $result1 = mysqli_query($con, "SELECT * FROM doctors ");
                  $num_rows1 = mysqli_num_rows($result1);
                  echo '<h4 class="badge" style="font-size:24px">' . $num_rows1 . '</h4>';
                  ?>
              </div>
              <div class="panel-footer ">
                <p>View and manage doctor profiles and specializations.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="appointment-history.php">
            <div class="panel panel-white text-center fixed-height-card">
              <div class="panel-body h-card">
                <span class="StepTitle" style="display: inline !important;"> Appointments</span>
                <?php $sql = mysqli_query($con, "SELECT * FROM appointment");
                $num_rows2 = mysqli_num_rows($sql);
                echo '<h4 class="badge" style="font-size:24px">' . $num_rows2 . '</h4>';
                ?>
              </div>
              <div class="panel-footer ">
                <p>View appointment history.</p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-md-4">
          <a href="manage-patient.php">
            <div class="panel panel-white text-center fixed-height-card">
              <div class="panel-body h-card">
                <span class="StepTitle">Patients</span>
                <?php $result = mysqli_query($con, "SELECT * FROM tblpatient ");
                $num_rows = mysqli_num_rows($result);
                echo '<h4 class="badge" style="font-size:24px">' . $num_rows . '</h4>';
                ?>
              </div>
              <div class="panel-footer ">
                <p>View, manage and edit patient profiles.</p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-sm-6 col-md-4">
          <a href="unread-queries.php">
            <div class="panel panel-white text-center fixed-height-card">
              <div class="panel-body h-card">
                <span class="StepTitle"> New Queries</span>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM tblcontactus where  IsRead is null");
                $num_rows22 = mysqli_num_rows($sql);
                echo '<h4 class="badge" style="font-size:24px">' . $num_rows22 . '</h4>';
                ?>
              </div>
              <div class="panel-footer ">
                <p>Read and respond to queries.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->