<?php

if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno' where id='".$_SESSION['id']."'");
if($sql)
{
echo "<script>alert('Doctor Details updated Successfully');</script>";

}
}
?>
<?php include('include/header.php');?>
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Doctor > Profile </h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Doctor</span>
          </li>
          <li class="active">
            <span>Profile</span>
          </li>
        </ol>
      </div>
    </section>
    <!-- end: PAGE TITLE -->
    <!-- start: BASIC EXAMPLE -->
    <div id="profile" class="">
      <div class="panel panel-sm">
        <?php $sql=mysqli_query($con,"select * from doctors where docEmail='".$_SESSION['dlogin']."'");
        while($data=mysqli_fetch_array($sql))
        {
      ?>
        <div class="profile-top">
          <button class="btn top-right-button" onclick="editProfile()">
            <i class="fa fa-pencil fa-3x"></i>
          </button>
          <div class="profile_pic">
            <img src="../assets/images/doctor_dp.jpg">
          </div>
          <div class="profile-name"><?php echo htmlentities($data['doctorName']);?></div>
        </div>
        <div class="profile-body">

        <div class="row">
          <div class="col-sm-6 float-left">
            <h4><span class="label label-default bg-primary margin-left-15"><i
              class="fa fa-star margin-right-5"></i><?php echo htmlentities($data['specilization']);?></span></h4>
            <div class="profile-badge-iconic">
              <span><i class="fa fa-phone fa-2x bg-cyan" aria-hidden="true"></i></span>
              <span class="badge-profile border-cyan"><?php echo htmlentities($data['contactno']);?></span>
            </div>
            <div class="profile-badge-iconic">
              <span><i class="fa fa-envelope-o fa-2x bg-pinky" aria-hidden="true"></i></span>
              <span class="badge-profile border-pinky"><?php echo htmlentities($data['docEmail']);?></span>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="profile-imp-green">
              <div class="green-heading"><i class="fa fa-inr" aria-hidden="true"></i>Doctor Consultancy Fees</div>
              <div class="green-body"><p><?php echo htmlentities($data['docFees']);?></p></div>
            </div>
          </div>
        </div>
        <?php } ?>
        </div>
      </div>
    </div>

    <div id="edit-profile" class="container-fluid container-fullw bg-white" style="display:none">
      <div class="row">
        <div class="col-md-12">

          <div class="row margin-top-30">
            <div class="col-lg-8 col-md-12">
              <div class="panel panel-white">
                <div class="panel-heading">
                  <h5 class="panel-title">Edit Doctor</h5>
                </div>
                <div class="panel-body">
                  <?php $sql=mysqli_query($con,"select * from doctors where docEmail='".$_SESSION['dlogin']."'");
                    while($data=mysqli_fetch_array($sql))
                    {
                  ?>
                  <h4><?php echo htmlentities($data['doctorName']);?>'s Profile</h4>
                  <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']);?></p>
                  <?php if($data['updationDate']){?>
                  <p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
                  <?php } ?>
                  <hr />
                  <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                    <div class="form-group">
                      <label for="DoctorSpecialization">
                        Doctor Specialization
                      </label>
                      <select name="Doctorspecialization" class="form-control" required="required">
                        <option value="<?php echo htmlentities($data['specilization']);?>">
                          <?php echo htmlentities($data['specilization']);?></option>
                        <?php $ret=mysqli_query($con,"select * from doctorspecilization");
                        while($row=mysqli_fetch_array($ret))
                        {
                        ?>
                        <option value="<?php echo htmlentities($row['specilization']);?>">
                          <?php echo htmlentities($row['specilization']);?>
                        </option>
                        <?php } ?>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="doctorname">
                        Doctor Name
                      </label>
                      <input type="text" name="docname" class="form-control"
                        value="<?php echo htmlentities($data['doctorName']);?>">
                    </div>


                    <div class="form-group">
                      <label for="address">
                        Doctor Clinic Address
                      </label>
                      <textarea name="clinicaddress"
                        class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="fess">
                        Doctor Consultancy Fees
                      </label>
                      <input type="text" name="docfees" class="form-control" required="required"
                        value="<?php echo htmlentities($data['docFees']);?>">
                    </div>

                    <div class="form-group">
                      <label for="fess">
                        Doctor Contact no
                      </label>
                      <input type="text" name="doccontact" class="form-control" required="required"
                        value="<?php echo htmlentities($data['contactno']);?>">
                    </div>

                    <div class="form-group">
                      <label for="fess">
                        Doctor Email
                      </label>
                      <input type="email" name="docemail" class="form-control" readonly="readonly"
                        value="<?php echo htmlentities($data['docEmail']);?>">
                    </div>
                    <?php } ?>
                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                      Update
                    </button>
                    <button type="button" class="btn btn-o btn-danger" onclick="cancelEdit()">
                      Cancel
                    </button>
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

<script>
function editProfile() {
  $('#edit-profile').show('slow');
  $('#profile').hide('slow');
}

function cancelEdit() {
  $('#edit-profile').hide('slow');
  $('#profile').show('slow');

}
</script>

<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->
