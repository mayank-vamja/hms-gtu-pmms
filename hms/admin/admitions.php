<?php include('include/header.php'); ?>
<!-- <link href="http://www.cssscript.com/demo/circular-progress-bar-plain-html-css/css-circular-prog-bar.css" rel="stylesheet" /> -->

<div class="main-content">
  <div class="wrap-content container" id="container">
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle"><a href="./dashboard.php">Admin </a>> Rooms and Wards</h1>
        </div>
      </div>
    </section>

    <div class="container-fluid container-fullw center">

      <?php
      $sql = mysqli_query($con, "select floor from departments group by floor");
      $no_of_floors = mysqli_num_rows($sql);
      for ($i = $no_of_floors - 1; $i >= 0; $i--) {
        $sql = mysqli_query($con, "select * from departments where floor = '$i'");
        $noOfItems = mysqli_num_rows($sql);
      ?>

        <div class="custom-card margin-bottom-25" id='<?php echo 'floor-row-' . $i ?>'>
          <div class="custom-card-heading">
            <h4 class="text-primary"> <?php if ($i == 0) echo "Ground floor";
                                      else echo 'Floor : ' . $i; ?> </h4>
          </div>
          <div class="custom-card-body bg-light-grey" id="<?php echo $i . '-content'; ?>" style="height:285px;">
            <?php
            while ($row = mysqli_fetch_array($sql)) {
            ?>
              <div class="col-sm-6 col-md-4">
                <div class="custom-card">
                  <div class="custom-card-heading  bg-light-grey">
                    <span class="text-dark text-bold"><?php echo $row['name'] ?></span>
                  </div>
                  <div class="custom-card-body height-200">
                    <?php $occupied = ($row['currentPatients'] / $row['maxPatients']) * 100; ?>
                    <div class="progress-circle-wrapper">
                      <div class="progress progress-circle bg-light-theme">
                        <div style="width:<?php echo $occupied . '%' ?>;" class="progress-bar  progressbar-circle" role="progressbar" aria-valuenow="<?php echo $occupied ?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="progress-circle-content progress-circle-hover">
                        <?php echo '<p class="progress-percentage"> ' . $occupied . '%</p>' ?>
                        <p class="progress-text"><?php echo $row["currentPatients"] . ' out of ' . $row["maxPatients"] . ' are admited.' ?></p>
                      </div>
                      <div class="progress-circle-content hover-content">
                        <a class="link" onclick="viewPatients(<?php echo $row['id'] ?>, '<?php echo $row['name'] ?>', '<?php echo $row['type'] ?>')">Click here to know more</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <?php if ($noOfItems > 3) { ?>
            <div class="text-right padding-5">
              <a class="btn btn-flat" id="<?php echo $i . '-show'; ?>" onclick="showMoreDepts( <?php echo $i; ?>)">Show more <i class="fa fa-chevron-down"></i></a>
              <a style="display:none;" id="<?php echo $i . '-hide'; ?>" class="btn btn-flat" onclick="showLessDepts( <?php echo $i; ?>)">See less <i class="fa fa-chevron-up"></i></a>
            </div>
          <?php } ?>
        </div>
      <?php } ?>

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
        <h4 class="text-primary text-center"> Patients in <span id="departmentTitle"></span></h4>
      </div>
      <div class="modal-body">
        <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <tr align="center">
            <th colspan="5">Patients Admited</th>
          </tr>
          <tr>
            <th>#</th>
            <th>Patient Name</th>
            <th>Admited on</th>
            <th>Bed No</th>
            <th>Action</th>
          </tr>
          <tbody id="admitedPatientRows">

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  function showMoreDepts(i) {
    $(`#${i}-content`).animate({
      height: "fit-content"
    }, 'slow');
    $(`#${i}-hide`).show();
    $(`#${i}-show`).hide();
  }

  function showLessDepts(i) {
    $(`#${i}-content`).animate({
      height: "285px"
    }, 'slow');
    $(`#${i}-show`).show();
    $(`#${i}-hide`).hide();
  }

  function viewPatients(deptId, name, type) {
    $('#departmentTitle').text(`${name} (${type})`);
    $.ajax({
      type: "GET",
      url: './get-admited-patient.php?department=' + deptId,
      success: function(data) {
        if (!data) return;
        let response = JSON.parse(data);

        let rows = '';
        if (response.data && response.data.length > 0) {
          for (let i = 0; i < response.data.length; i++) {
            let d = response.data[i];
            rows = rows +
              `<tr>
                <td>${i+ 1}</td>
                <td>${d.patientName}</td>
                <td>${d.admitedOn}</td>
                <td>${d.bedNo}</td>
                <td><a href="view-patient.php?viewid=${d.patientId}"><i class="fa fa-eye"></i></a></td>
              </tr>`;
          }
        } else {
          rows = `<tr align="center">
            <td colspan="5">No Patients are admited here.</td>
          </tr>`;
        }

        $('#admitedPatientRows').html(rows);
        $('#myModal').modal('show');
      }
    });
  }
</script>

<?php include('include/footer.php'); ?>