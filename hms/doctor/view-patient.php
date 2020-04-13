<?php include('include/header.php'); ?>
<?php

if (isset($_POST['submit_mh'])) {
  $vid = $_GET['viewid'];
  $bp = $_POST['bp'];
  $bs = $_POST['bs'];
  $weight = $_POST['weight'];
  $temp = $_POST['temp'];
  $pres = $_POST['pres'];
  $disease = $_POST['disease'];
  $otherData = null;
  if ($disease) {
    switch ($disease) {
      case "DIABETES":
        if ($_POST['diabetes']) {
          $temp = array("diabetes" => $_POST['diabetes']);
          $otherData = json_encode($temp);
        }
        break;
    }
  }

  $query = mysqli_query($con, "insert into tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,OtherData,MedicalPres) values('$vid','$bp','$bs','$weight','$temp','$otherData','$pres')");
  if ($query) {
    // echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
} else if (isset($_POST['submit_rr'])) {
  $vid = $_GET['viewid'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $priority = $_POST['priority'];
  $requestedBy = $_SESSION['id'];

  $query = mysqli_query($con, "insert into tblreports(PatientId,ReportType,ReportDescription,Priority,RequestedBy) values('$vid','$type','$description','$priority','$requestedBy')");
  if ($query) {
    // echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}

function getInputTableForDisease($data)
{
  switch ($data) {
    case "DIABETES":
      return "<tr><th>Diabetes Count :</th><td><input type='hidden' name='disease' value='DIABETES'><input name='diabetes' placeholder='Diabetes' class='form-control wd-450'></td></tr>";
    default:
      return "<tr><th>'$data' Count :</th><td><input type='hidden' name='disease' value='$data'><input name='$data' placeholder='$data' class='form-control wd-450'></td></tr>";
  }
}

function getOtherData($type, $data)
{
  switch ($type) {
    case "DIABETES":
      if ($data) {
        $d_data = json_decode($data);
        if ($d_data->diabetes) {
          return $d_data->diabetes;
        } else {
          return "- -";
        }
      }
      return "- -";
  }
}

?>
<script>
  var diseasesData = null;
  var chartData = [];

  function drawChart() {
    let data = google.visualization.arrayToDataTable(chartData);

    let options = {
      title: 'Diabetes Analysis',
      hAxis: {
        title: "Date",
        baseline: 1,
        baselineColor: '#283290',
        legend: {
          maxLines: 1
        },
        maxTextLines: 0,
        showTextEvery: 4
      },
      vAxis: {
        minValue: 0,
        gridlines: {
          count: 0,
        },
        baselineColor: '#283290',
      },
      legend: {
        maxLines: 1,
        alignment: 'center',
        position: 'top'
      },
      tooltip: {
        isHtml: true
      },
      colors: ['#283290', '#A962FF'],
      pointsVisible: true,
      animation: {
        duration: 500,
        easing: 'ease-in',
        startup: true
      },
      annotations: {
        boxStyle: {
          stroke: '#322E46',
          strokeWidth: 1,
          rx: 10,
          ry: 10,
          gradient: {
            color1: '#00C987',
            color2: '#00E4DF',
            x1: '0%',
            y1: '0%',
            x2: '100%',
            y2: '100%',
            useObjectBoundingBoxUnits: true
          }
        }
      }
    };

    let chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }

  function createChart(array) {

    chartData = array.map((item) => {
      let date = new Date(item.date);
      let MONTHS = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
      let strDate = `${date.getDate()} ${MONTHS[date.getMonth()]}, ${date.getFullYear()}`;
      return [strDate, parseInt(item.diabetes)]
    });
    chartData.unshift(['Date', 'Diabetes']);
    google.charts.load('current', {
      'packages': ['corechart']
    });

    google.charts.setOnLoadCallback(drawChart);
  }
</script>

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
          $jsonArray = array();
          while ($row = mysqli_fetch_array($ret)) {
            $diseaseId = $row['DiseaseId'];
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
            <?php
            if ($diseaseId) {
              $diseaseQuery = mysqli_query($con, "select * from tbldisease where id='$diseaseId'");
              while ($disease_row = mysqli_fetch_array($diseaseQuery)) {
                $disease = $disease_row["Disease"];
                break;
              }
            }
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
                <?php
                if ($disease) echo "<th>" . $disease . "</th>"
                ?>
                <th>Medical Prescription</th>
                <th>Visit Date</th>
              </tr>
              <?php
              while ($row = mysqli_fetch_array($ret)) {
                // create json for analysis
                $temp['bloodPressure'] = $row['BloodPressure'];
                $temp['weight'] = $row['Weight'];
                $temp['bloodSugar'] = $row['BloodSugar'];
                $temp['temperature'] = $row['Temperature'];
                $temp[strtolower($disease)] = getOtherData($disease, $row['OtherData']);
                $temp['date'] = $row['CreationDate'];
                array_push($jsonArray, $temp);
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['BloodPressure']; ?></td>
                  <td><?php echo $row['Weight']; ?></td>
                  <td><?php echo $row['BloodSugar']; ?></td>
                  <td><?php echo $row['Temperature']; ?></td>
                  <td><?php echo getOtherData($disease, $row['OtherData']); ?></td>
                  <td><?php echo $row['MedicalPres']; ?></td>
                  <td><?php echo $row['CreationDate']; ?></td>
                </tr>
              <?php
                $cnt = $cnt + 1;
              }
              $jsonData = json_encode($jsonArray);
              echo "<script> diseasesData = " . $jsonData . "; createChart(diseasesData);</script>"
              ?>
            </table>

            <p align="center">
              <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">
                Add Medical History
              </button>
            </p>

            <?php 
              $vid = $_GET['viewid'];
              $report_query = mysqli_query($con, "select * from tblreports  where PatientId='$vid'");
            ?>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <tr align="center">
                <th colspan="6">Reports History</th>
              </tr>
              <tr>
                <th>#</th>
                <th>Report Typr</th>
                <th>Description</th>
                <th>Report</th>
                <th>Report Date</th>
                <th>Generated on</th>
              </tr>
              <?php
              $cnt = 1;
              while ($row = mysqli_fetch_array($report_query)) {
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['ReportType']; ?></td>
                  <td><?php echo $row['ReportDescription']; ?></td>
                  <td><?php if($row['ReportData']) echo $row['ReportData']; else echo "- -"; ?></td>
                  <td><?php echo $row['RequestDate']; ?></td>
                  <td><?php if($row['UploadDate']) echo $row['UploadDate']; else echo "- -"; ?></td>
                </tr>
              <?php
                $cnt = $cnt + 1;
              }
              ?>
            </table>

            <p align="center">
              <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#addReportRequestModal">
                Request Report
              </button>
            </p>

            <div id="chart_div" style="width: 100%; height: 500px;"></div>


            <!-- MODAL FOR FORM Add MedicalHistory -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-bordered table-hover data-tables">

                      <form method="post" name="submit_mh">

                        <tr>
                          <th>Blood Pressure :</th>
                          <td>
                            <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true">
                          </td>
                        </tr>
                        <tr>
                          <th>Blood Sugar :</th>
                          <td>
                            <input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true">
                          </td>
                        </tr>
                        <tr>
                          <th>Weight :</th>
                          <td>
                            <input name="weight" placeholder="Weight" class="form-control wd-450" required="true">
                          </td>
                        </tr>
                        <tr>
                          <th>Body Temprature :</th>
                          <td>
                            <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
                        </tr>

                        <?php
                        if ($disease) {
                          $diseaseQuery = mysqli_query($con, "select * from tbldisease where id='$diseaseId'");
                          while ($disease_row = mysqli_fetch_array($diseaseQuery)) {
                            $disease = $disease_row["Disease"];
                            break;
                          }
                          echo getInputTableForDisease($disease);
                        }
                        ?>

                        <tr>
                          <th>Prescription :</th>
                          <td>
                            <textarea name="pres" placeholder="Medical Prescription" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
                        </tr>

                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit_mh" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addReportRequestModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content bg-white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="text-primary text-center"> Add Report Request </h3>
      </div>
      <div class="modal-body">
        <form method="POST" name="submit_rr">
          <div class="form-group">
            <label for="type">Report/Test type</label>
            <input type="text" name="type" class="form-control" required="true">
          </div>
          <div class="form-group">
            <label for="description">Report/Test description</label>
            <textarea row="4" name="description" class="form-control" required="true"></textarea>
          </div>
          <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" class="form-control" value="0">
              <option value="0" selected>General</option>
              <option value="1">High</option>
              <option value="2">Extremely High</option>
            </select>
          </div>
          <p align="center">
            <button type="submit" name="submit_rr" class="btn btn-lg btn-primary">Submit</button>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>


<style>
  div.google-visualization-tooltip {
    border-radius: 10px;
    color: #6b2c91 !important;
    box-shadow: 0 0 8px rgba(112, 51, 255, 0.9);
    transform: translate(-20px, 0px);
  }
</style>



<!-- start: FOOTER -->
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->