<?php
if(isset($_GET['cancel']))
		  {
mysqli_query($con,"update appointment set doctorStatus='0' where id ='".$_GET['id']."'");
                  $_SESSION['msg']="Appointment canceled !!";
		  }
?>
<?php include('include/header.php');?>
<!-- end: TOP NAVBAR -->
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Doctor > Appointment History</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Doctor </span>
          </li>
          <li class="active">
            <span>Appointment History</span>
          </li>
        </ol>
      </div>
    </section>
    <!-- end: PAGE TITLE -->
    <!-- start: BASIC EXAMPLE -->
    <div class="container-fluid container-fullw bg-white">


      <div class="row">
        <div class="col-md-12">

          <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
            <?php echo htmlentities($_SESSION['msg']="");?></p>
          <table class="table table-hover" id="sample-table-1">
            <thead>
              <tr>
                <th class="center">#</th>
                <th class="hidden-xs">Patient Name</th>
                <th>Specialization</th>
                <th>Consultancy Fee</th>
                <th>Appointment Date / Time </th>
                <th>Appointment Creation Date </th>
                <th>Current Status</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
$sql=mysqli_query($con,"select users.fullName as fname,appointment.*  from appointment join users on users.id=appointment.userId where appointment.doctorId='".$_SESSION['id']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

              <tr>
                <td class="center"><?php echo $cnt;?>.</td>
                <td class="hidden-xs"><?php echo $row['fname'];?></td>
                <td><?php echo $row['doctorSpecialization'];?></td>
                <td><?php echo $row['consultancyFees'];?></td>
                <td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?>
                </td>
                <td><?php echo $row['postingDate'];?></td>
                <td>
                  <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{
	echo "Active";
}
if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
{
	echo "Cancel by Patient";
}

if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
{
	echo "Cancel by you";
}



												?></td>
                <td>
                  <div class="visible-md visible-lg hidden-sm hidden-xs">
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{ ?>


                    <a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update"
                      onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                      class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top"
                      tooltip="Remove">Cancel</a>
                    <?php } else {

		echo "Canceled";
		} ?>
                  </div>
                </td>
              </tr>

              <?php 
$cnt=$cnt+1;
											 }?>


            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- end: BASIC EXAMPLE -->
    <!-- end: SELECT BOXES -->

  </div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->