<?php
if (isset($_POST['submit'])) {
  $vid = $_GET['viewid'];
  $bp = $_POST['bp'];
  $bs = $_POST['bs'];
  $weight = $_POST['weight'];
  $temp = $_POST['temp'];
  $pres = $_POST['pres'];
  $query .= mysqli_query($con, "insert into tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
  if ($query) {
    // echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>
<?php include('include/header.php'); ?>

<style>
  #beds {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    border: 1px solid #ddd;
    padding: 4px;
    margin: 4px;
    justify-content: center;
  }

  #beds .btn {
    width: 50px;
    border-radius: 0;
  }

  .modal-content .btn[type="submit"] {
    border-radius: 50px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;
    margin: 8px;
  }

  .custom-badge {
    padding: 10px 0;
    color: white;
    height: 40px;
    min-width: 40px;
    font-size: 16px;
    overflow: hidden;
    text-align: center;
    background-color: #00E4DF;
    border-radius: 40px;
  }
</style>

<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Doctor > Manage Patients</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Doctor</span>
          </li>
          <li class="active">
            <span>Manage Patients</span>
          </li>
        </ol>
      </div>
    </section>
    <div class="container-fluid container-fullw bg-white">
      <div class="row">
        <div class="col-md-12">
          <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
          <?php
          $vid = $_GET['viewid'];
          $ret = mysqli_query($con, "select * from tblpatient where ID='$vid'");
          $cnt = 1;
          while ($row = mysqli_fetch_array($ret)) {
          ?>
            <table border="1" class="table table-bordered">
              <tr align="center">
                <td colspan="4" style="font-size:20px;color:blue">
                  Patient Details</td>
              </tr>

              <tr>
                <th scope>Patient Name</th>
                <td><?php echo $row['PatientName']; ?></td>
                <th scope>Patient Email</th>
                <td><?php echo $row['PatientEmail']; ?></td>
              </tr>
              <tr>
                <th scope>Patient Mobile Number</th>
                <td><?php echo $row['PatientContno']; ?></td>
                <th>Patient Address</th>
                <td><?php echo $row['PatientAdd']; ?></td>
              </tr>
              <tr>
                <th>Patient Gender</th>
                <td><?php echo $row['PatientGender']; ?></td>
                <th>Patient Age</th>
                <td><?php echo $row['PatientAge']; ?></td>
              </tr>
              <tr>

                <th>Patient Medical History(if any)</th>
                <td><?php echo $row['PatientMedhis']; ?></td>
                <th>Patient Reg Date</th>
                <td><?php echo $row['CreationDate']; ?></td>
              </tr>

            <?php } ?>
            </table>
            <?php if (!$row['isAdmit']) { ?>
              <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Admit Patinet</button>
            <?php } ?>
            <?php
            $ret = mysqli_query($con, "select * from tblmedicalhistory  where PatientID='$vid'");
            ?>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <tr align="center">
                <th colspan="8">Medical History</th>
              </tr>
              <tr>
                <th>#</th>
                <th>Blood Pressure</th>
                <th>Weight</th>
                <th>Blood Sugar</th>
                <th>Body Temprature</th>
                <th>Medical Prescription</th>
                <th>Visit Date</th>
              </tr>
              <?php
              while ($row = mysqli_fetch_array($ret)) {
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['BloodPressure']; ?></td>
                  <td><?php echo $row['Weight']; ?></td>
                  <td><?php echo $row['BloodSugar']; ?></td>
                  <td><?php echo $row['Temperature']; ?></td>
                  <td><?php echo $row['MedicalPres']; ?></td>
                  <td><?php echo $row['CreationDate']; ?></td>
                </tr>
              <?php $cnt = $cnt + 1;
              } ?>
            </table>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content bg-white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="text-primary text-center"> Admit Patient</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="bedNo"> Department </label>
            <select value="" name="department" class="form-control" onChange="selectDepartment(this.value);" required="required">
              <option disabled selected value="">Select Department</option>
              <?php $ret = mysqli_query($con, "select * from departments where type != 'OT'");
              while ($row = mysqli_fetch_array($ret)) { ?>
                <option value="<?php echo htmlentities($row['id']); ?>">
                  <?php echo htmlentities($row['name'] . ' (' . $row['type'] . ')'); ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="bedNo"> Bed number </label>
            <div id="currentBed" style="float: right;" class="custom-badge">N/A</div>
            <p>Select from Available beds
              <a 
                tabindex="0" 
                data-html="true" 
                data-toggle="popover" 
                data-trigger="hover" 
                data-content="<svg height='10' width='10'><circle cx='5' cy='5' r='5' fill='#7033ff' /></svg> Available<br /><svg height='10' width='10'><circle cx='5' cy='5' r='5' fill='#f69487' /></svg> Occupied">
                <i class="fa fa-info-circle"></i>
              </a>
            </p>
            <div style="display:none;" id="beds"></div>
            <input disabled required type="number" min="1" class="form-control hidden" name="bedNo" placeholder="Enter Bed Number">
          </div>
          <div class="center"><button type="submit" class="btn btn-lg btn-primary">Submit</button></div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function selectDepartment(dept) {
    $("#beds").hide(0);
    $.ajax({
      type: "GET",
      url: './department-details.php?id=' + dept,
      success: function(data) {
        let response = JSON.parse(data);
        let booked = response.booked ? response.booked.split(' ') : [];
        let bedsHtml = '';
        for (let i = 1; i <= response.maxPatients; i++) {
          if (!booked.includes('' + i))
            bedsHtml = bedsHtml + '<button type="button" class="btn btn-primary" onclick="selectBed(' + i + ')">' + i + '</button>';
          else
            bedsHtml = bedsHtml + '<button disabled type="button" class="btn btn-danger" onclick="selectBed(' + i + ')">' + i + '</button>';
        }

        $("#beds").html(bedsHtml);
        $("#beds").show(200);
      }
    });
  }

  function selectBed(bed) {
    $("#currentBed").text(bed);
  }

  function admitPatient(id) {

  }

  // $(function() {
  //   $("[data-toggle=popover]").popover();
  // });
</script>
<!-- start: FOOTER -->
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->