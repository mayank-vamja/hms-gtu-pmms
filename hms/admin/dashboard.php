<?php include('include/header.php');?>

<!-- end: TOP NAVBAR -->
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Admin > Dashboard</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Admin</span>
          </li>
          <li class="active">
            <span>Dashboard</span>
          </li>
        </ol>
      </div>
    </section>

    <div class="container-fluid container-fullw bg-white">
      <div class="row">

        <div class="row">
          <div class="panel panel-white text-center">
            <div class="panel-body d-flex flex-row">
              <span class="StepTitle">Manage Users</span>

              <p class="links clcl-effect-1">
                <a href="manage-users.php">
                  <?php $result = mysqli_query($con,"SELECT * FROM users ");
                        $num_rows = mysqli_num_rows($result);
                        {
                  ?>
                  Total Users :<?php echo htmlentities($num_rows);  } ?>
                </a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="panel panel-white text-center">
            <div class="panel-body d-flex flex-row">
              <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i
                  class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
              <span class="StepTitle">Manage Doctors</h2>

                <p class="cl-effect-1">
                  <a href="manage-doctors.php">
                    <?php $result1 = mysqli_query($con,"SELECT * FROM doctors ");
$num_rows1 = mysqli_num_rows($result1);
{
?>
                    Total Doctors :<?php echo htmlentities($num_rows1);  } ?>
                  </a>

                </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="panel panel-white text-center">
            <div class="panel-body d-flex flex-row">
              <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i
                  class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
              <span class="StepTitle" style="display: inline !important;"> Appointments</span>

              <p class="links cl-effect-1">
                <a href="book-appointment.php">
                  <a href="appointment-history.php">
                    <?php $sql= mysqli_query($con,"SELECT * FROM appointment");
$num_rows2 = mysqli_num_rows($sql);
{
?>
                    Total Appointments :<?php echo htmlentities($num_rows2);  } ?>
                  </a>
                </a>
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="panel panel-white text-center">
            <div class="panel-body d-flex flex-row">
              <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i
                  class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
              <span class="StepTitle">Manage Patients</span>

              <p class="links cl-effect-1">
                <a href="manage-patient.php">
                  <?php $result = mysqli_query($con,"SELECT * FROM tblpatient ");
$num_rows = mysqli_num_rows($result);
{
?>
                  Total Patients :<?php echo htmlentities($num_rows);  
} ?>
                </a>
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="panel panel-white no-radius text-center">
            <div class="panel-body d-flex flex-row">
              <span class="fa-stack fa-2x"> <i class="ti-files fa-1x text-primary"></i> <i
                  class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
              <span class="StepTitle"> New Queries</span>

              <p class="links cl-effect-1">
                <a href="book-appointment.php">
                  <a href="unread-queries.php">
                    <?php 
											$sql= mysqli_query($con,"SELECT * FROM tblcontactus where  IsRead is null");
											$num_rows22 = mysqli_num_rows($sql);
										?>
                    Total New Queries :<?php echo htmlentities($num_rows22);   ?>
                  </a>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->