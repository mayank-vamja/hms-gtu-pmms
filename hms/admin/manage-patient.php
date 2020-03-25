<?php include('include/header.php'); ?>
<?php 
function getRandomColor() {
  $bgColors = ['#FF5479', '#CC54FF', '#54A1FF', '#F9C03C', '#13BB8D', '#5C59E3', '#75BA30'];
  return $bgColors[rand(0,6)];
}
?>
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Admin > View Patients</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Admin</span>
          </li>
          <li class="active">
            <span>View Patients</span>
          </li>
        </ol>
      </div>
    </section>
    <div class="container-fluid container-fullw bg-white">
      <div class="row">
        <div class="col-md-12">
          <h5 class="over-title margin-bottom-15">View <span class="text-bold">Patients</span></h5>

          <table class="table table-hover" id="sample-table-1">
            <thead>
              <tr>
                <th>Patient</th>
                <th>Updation Date </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $sql = mysqli_query($con, "select * from tblpatient");
              $cnt = 1;
              while ($row = mysqli_fetch_array($sql)) {
              ?>
                <tr>
                  <td>
                    <div class="media">
                      <div class="media-left">
                        <div src="img_avatar1.png" class="media-object media-initial" style="background-color: <?php echo getRandomColor() ?>">
                          <?php echo substr($row['PatientName'], 0, 1); ?>
                        </div>
                      </div>
                      <div class="media-body" style="width: fit-content;">
                        <h4 class="media-heading"><?php echo $row['PatientName']; ?>
                          <small><i>created on <?php echo $row['CreationDate']; ?></i></small>
                        </h4>
                        <p><i class="fa fa-mars"></i> <?php echo $row['PatientGender']; ?>
                          <br /><span class="text-success"><i class="fa fa-phone"></i> <?php echo $row['PatientContno']; ?></span></p>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $row['UpdationDate']; ?>
                  </td>
                  <td align="center">

                    <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye"></i></a>

                  </td>
                </tr>
              <?php
                $cnt = $cnt + 1;
              } ?></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->