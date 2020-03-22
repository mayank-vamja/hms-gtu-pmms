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
                    <div class="progress progress-circle bg-light-theme">
                      <div style="width:<?php echo $occupied . '%' ?>;" class="progress-bar  progressbar-circle" role="progressbar" aria-valuenow="<?php echo $occupied ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="progress-circle-content">
                      <?php echo '<p class="progress-percentage"> ' . $occupied . '%</p>' ?>
                      <p class="progress-text"><?php echo $row["currentPatients"] . ' out of ' . $row["maxPatients"] . ' are admited.' ?></p>
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
</script>

<?php include('include/footer.php'); ?>