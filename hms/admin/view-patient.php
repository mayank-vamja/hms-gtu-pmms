<?php include('include/header.php'); ?>
<?php

if (isset($_POST['submit'])) {
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

  $query = mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,OtherData,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$otherData','$pres')");
  if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
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

  var selectedDates = [];
  $(window).load(() => {
    $('#datepickerBox').datepicker({
      multidate: 2,
      format: 'yyyy-mm-dd',
      maxViewMode: 0,
    });
    $('#datepickerBox').on('changeDate', function() {
      let from = $('#fromDate').val();
      let to = $('#toDate').val();
      let result = $('#datepickerBox').datepicker('getFormattedDate');
      if (!result || result.trim() == '') {
        $('#fromDate').val('');
        $('#toDate').val('');
      } else {
        selectedDates = $('#datepickerBox').datepicker('getFormattedDate').split(',');
        selectedDates.sort((a, b) => new Date(a) - new Date(b));

        selectedDates.length ? $('#fromDate').val(selectedDates[0]) : $('#fromDate').val('');
        selectedDates.length == 2 ? $('#toDate').val(selectedDates[1]) : $('#toDate').val('');
      }

      let temp1 = $('#fromDate').val() == '' ? 'Not Selected' : $('#fromDate').val();
      let temp2 = $('#toDate').val() == '' ? 'Not Selected' : $('#toDate').val();
      $('#datesText').html(`From : ${temp1} - To : ${temp2}`);

    });
  });

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
    $('#bedNo').val(bed);
    $('#beds').popover('hide');
  }

  function openDateSelector() {
    $('#admit-group-wrapper').hide('slow');
    $('#datepickerBox-wrapper').show('slow');
  }

  function closeDateSelector() {
    $('#admit-group-wrapper').show('slow');
    $('#datepickerBox-wrapper').hide('slow');
  }


  function admitPatient(e, formId) {
    e.preventDefault();
    if (!$('#bedNo').val() || $('#bedNo').val() == '') {
      $('#beds').popover('show');
      return;
    } else if (selectedDates.length != 2) {

    }
    let form = $(`#${formId}`);
    let url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        $('#myModal').modal('hide');
        console.log(data);
        if (data != "success") {
          alert("Unable to admit patient");
        } else {
          window.location.reload();
        }
      }
    });
  }
</script>

<style>
  #datepickerBox-wrapper {
    height: 450px;
    overflow: hidden;
    margin: auto;
    border: 1px solid #283290;
    border-radius: 8px;
  }

  #datepickerBox {
    width: fit-content;
    margin: auto;
    border-radius: 8px;
    transform: scale(1.4) translateY(10%);
    padding: 10px;
  }

  .datepicker {
    background-color: white;
    margin: 4px;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
  }

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

            </table>
            <?php
            if ($row['isAdmit'] != '1') { ?>
              <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Admit Patinet</button>
            <?php } else { ?>
              <?php
              $query = mysqli_query($con, "select tbladmits.*,departments.type, departments.name from tbladmits join departments where tbladmits.departmentId = departments.id and tbladmits.userId = '$vid' and tbladmits.discharged = '0'");
              while ($row = mysqli_fetch_array($query)) { ?>
                <div class="panel panel-white">
                  <div class="panel-body">
                    <h4>Patient admited details:</h4>
                    <p>Location : <?php echo '(' . $row['type'] . ') ' . $row['name'] ?></p>
                    <p>Admited On : <?php echo $row['fromDate'] ?></p>
                    <p>Last date : <?php echo $row['toDate'] ?></p>
                    <p></p>
                  </div>
                </div>
              <?php  } ?>
            <?php } ?>
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
        <form id="admitForm" onsubmit="admitPatient(event, this.id)" action="./admit-patient.php" role="form" method="POST">
          <input type="hidden" name="userId" value="<?php echo $_GET['viewid'] ?>">
          <input type="hidden" name="admitedBy" value="<?php echo $_SESSION['id'] ?>">
          <input required type="hidden" name="fromDate" id="fromDate">
          <input required type="hidden" name="toDate" id="toDate">
          <div id="admit-group-wrapper">
            <div class="form-group">
              <label for="department"> Department </label>
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
              <input id="bedNo" required type="hidden" name="bedNo">
              <p>Select from Available beds
                <a tabindex="0" data-html="true" data-toggle="popover" data-trigger="hover" data-content="<svg height='10' width='10'><circle cx='5' cy='5' r='5' fill='#283290' /></svg> Available<br /><svg height='10' width='10'><circle cx='5' cy='5' r='5' fill='#f69487' /></svg> Occupied">
                  <i class="fa fa-info-circle"></i>
                </a>
              </p>
              <div style="display:none;" id="beds" data-toggle="popover" data-placement="bottom" data-trigger="manual" data-content="Please select bed!"></div>
            </div>
          </div>
          <div class="col">
            <label>Duration for admit</label>
            <div class="well" onclick="openDateSelector()">
              <a id="datesText"> Tap here to select</a>
            </div>
          </div>
          <div id="datepickerBox-wrapper" style="display:none;">
            <div class="bg-light-grey well"> Please select two dates for duration.
              <i onclick="closeDateSelector()" class="pull-right fa fa-2x fa-minus-circle vertical-align-top text-primary"></i>
            </div>
            <div id="datepickerBox"></div>
          </div>
          <div class="center"><button type="submit" class="btn btn-lg btn-primary">Submit</button></div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include('include/footer.php'); ?>