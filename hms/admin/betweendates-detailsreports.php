<?php include('include/header.php');?>
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
          <h4 class="tittle-w3-agileits mb-4">Between dates reports</h4>
          <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
          <h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>

          <table class="table table-hover" id="sample-table-1">
            <thead>
              <tr>
                <th class="center">#</th>
                <th>Patient Name</th>
                <th>Patient Contact Number</th>
                <th>Patient Gender </th>
                <th>Creation Date </th>
                <th>Updation Date </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

$sql=mysqli_query($con,"select * from tblpatient where date(CreationDate) between '$fdate' and '$tdate'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
              <tr>
                <td class="center"><?php echo $cnt;?>.</td>
                <td class="hidden-xs"><?php echo $row['PatientName'];?></td>
                <td><?php echo $row['PatientContno'];?></td>
                <td><?php echo $row['PatientGender'];?></td>
                <td><?php echo $row['CreationDate'];?></td>
                <td><?php echo $row['UpdationDate'];?>
                </td>
                <td>

                  <a href="view-patient.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>

                </td>
              </tr>
              <?php 
$cnt=$cnt+1;
 }?></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->