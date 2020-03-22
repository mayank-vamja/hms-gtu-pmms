<?php include('include/header.php'); ?>

<div class="main-content">
  <div class="wrap-content container" id="container">
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Patients > Appointment History</h1>
        </div>
      </div>
    </section>
    
    <div class="container-fluid container-fullw bg-white">


      <div class="row">
        <div class="col-md-12">

          <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
            <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
          <table class="table table-hover" id="sample-table-1">
            <thead>
              <tr>
                <th class="center">#</th>
                <th class="hidden-xs">Doctor Name</th>
                <th>Patient Name</th>
                <th>Specialization</th>
                <th>Consultancy Fee</th>
                <th>Appointment Date / Time </th>
                <th>Appointment Creation Date </th>
                <th>Current Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = mysqli_query($con, "select doctors.doctorName as docname,users.fullName as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join users on users.id=appointment.userId ");
              $cnt = 1;
              while ($row = mysqli_fetch_array($sql)) {
              ?>

                <tr>
                  <td class="center"><?php echo $cnt; ?>.</td>
                  <td class="hidden-xs"><?php echo $row['docname']; ?></td>
                  <td class="hidden-xs"><?php echo $row['pname']; ?></td>
                  <td><?php echo $row['doctorSpecialization']; ?></td>
                  <td><?php echo $row['consultancyFees']; ?></td>
                  <td><?php echo $row['appointmentDate']; ?> / <?php echo
                                                                  $row['appointmentTime']; ?>
                  </td>
                  <td><?php echo $row['postingDate']; ?></td>
                  <td>
                    <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                      echo "Active";
                    }
                    if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                      echo "Cancel by Patient";
                    }
                    if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                      echo "Cancel by Doctor";
                    }
                    ?></td>
                  <td>
                    <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                      echo "No Action yet";
                    } else {
                      echo "Canceled";
                    } ?>
                  </td>
                </tr>

              <?php
                $cnt = $cnt + 1;
              } ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- end: BASIC EXAMPLE -->
    <!-- end: SELECT BOXES -->

  </div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->