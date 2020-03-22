<?php include('include/header.php');?>
<!-- end: TOP NAVBAR -->
<div class="main-content">
  <div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Admin > Doctor Session Logs</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Admin </span>
          </li>
          <li class="active">
            <span>Doctor Session Logs</span>
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
                <th class="hidden-xs">User id</th>
                <th>Username</th>
                <th>User IP</th>
                <th>Login time</th>
                <th>Logout Time </th>
                <th> Status </th>


              </tr>
            </thead>
            <tbody>
              <?php
$sql=mysqli_query($con,"select * from doctorslog ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

              <tr>
                <td class="center"><?php echo $cnt;?>.</td>
                <td class="hidden-xs"><?php echo $row['uid'];?></td>
                <td class="hidden-xs"><?php echo $row['username'];?></td>
                <td><?php echo $row['userip'];?></td>
                <td><?php echo $row['loginTime'];?></td>
                <td><?php echo $row['logout'];?>
                </td>

                <td>
                  <?php if($row['status']==1)
{
	echo "Success";
}
else
{
	echo "Failed";
}?>

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
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->