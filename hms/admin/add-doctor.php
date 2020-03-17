<?php 

if (isset($_POST['submit'])) {
	$docspecialization = $_POST['Doctorspecialization'];
	$docname = $_POST['docname'];
	$docaddress = $_POST['clinicaddress'];
	$docfees = $_POST['docfees'];
	$doccontactno = $_POST['doccontact'];
	$docemail = $_POST['docemail'];
	$password = md5($_POST['npass']);
	$sql = mysqli_query($con, "insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
	if ($sql) {
		echo "<script>alert('Doctor info added Successfully');</script>";
		echo "<script>window.location.href ='manage-doctors.php'</script>";
	}
}
?>
<?php include('include/header.php'); ?>

<!-- end: TOP NAVBAR -->
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Admin | Add Doctor</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Admin</span>
          </li>
          <li class="active">
            <span>Add Doctor</span>
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
                  <h5 class="panel-title">Add Doctor</h5>
                </div>
                <div class="panel-body">

                  <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                    <div class="form-group">
                      <label for="DoctorSpecialization">
                        Doctor Specialization
                      </label>
                      <select name="Doctorspecialization" class="form-control" required="true">
                        <option value="">Select Specialization</option>
                        <?php $ret = mysqli_query($con, "select * from doctorspecilization");
															while ($row = mysqli_fetch_array($ret)) {
															?>
                        <option value="<?php echo htmlentities($row['specilization']); ?>">
                          <?php echo htmlentities($row['specilization']); ?>
                        </option>
                        <?php } ?>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="doctorname">
                        Doctor Name
                      </label>
                      <input type="text" name="docname" class="form-control" placeholder="Enter Doctor Name"
                        required="true">
                    </div>

                    <div class="form-group">
                      <label for="address">
                        Doctor Clinic Address
                      </label>
                      <textarea name="clinicaddress" class="form-control" placeholder="Enter Doctor Clinic Address"
                        required="true"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="fess">
                        Doctor Consultancy Fees
                      </label>
                      <input type="text" name="docfees" class="form-control" placeholder="Enter Doctor Consultancy Fees"
                        required="true">
                    </div>

                    <div class="form-group">
                      <label for="fess">
                        Doctor Contact no
                      </label>
                      <input type="text" name="doccontact" class="form-control" placeholder="Enter Doctor Contact no"
                        required="true">
                    </div>

                    <div class="form-group">
                      <label for="fess">
                        Doctor Email
                      </label>
                      <input type="email" id="docemail" name="docemail" class="form-control"
                        placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
                      <span id="email-availability-status"></span>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">
                        Password
                      </label>
                      <input type="password" name="npass" class="form-control" placeholder="New Password"
                        required="required">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword2">
                        Confirm Password
                      </label>
                      <input type="password" name="cfpass" class="form-control" placeholder="Confirm Password"
                        required="required">
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
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->