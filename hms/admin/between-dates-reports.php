<?php include('include/header.php');?>

<!-- end: TOP NAVBAR -->
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Between Dates | Reports</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Between Dates</span>
          </li>
          <li class="active">
            <span>Reports</span>
          </li>
        </ol>
      </div>
    </section>
    <!-- end: PAGE TITLE -->
    <!-- start: BASIC EXAMPLE -->
    <div class="container-fluid container-fullw bg-white">
      <div class="row">
        <div class="col-md-12">

          <div class="row margin-top-30">
            <div class="col-lg-8 col-md-12">
              <div class="panel panel-white">
                <div class="panel-heading">
                  <h5 class="panel-title">Between Dates Reports</h5>
                </div>
                <div class="panel-body">

                  <form role="form" method="post" action="betweendates-detailsreports.php">
                    <div class="form-group">
                      <label for="exampleInputPassword1">
                        From Date:
                      </label>
                      <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">
                        To Date::
                      </label>
                      <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>

                    </div>


                    <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                      Submit
                    </button>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="panel panel-white">


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->