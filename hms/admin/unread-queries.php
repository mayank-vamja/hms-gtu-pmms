<?php
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from doctors where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
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
          <h1 class="mainTitle">Admin > Manage Unread Queries</h1>
        </div>
        <ol class="breadcrumb">
          <li>
            <span>Admin</span>
          </li>
          <li class="active">
            <span>Unread Queries</span>
          </li>
        </ol>
      </div>
    </section>
    <!-- end: PAGE TITLE -->
    <!-- start: BASIC EXAMPLE -->
    <div class="container-fluid container-fullw bg-white">


      <div class="row">
        <div class="col-md-12">
          <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Unread Queries</span></h5>
          <table class="table table-hover" id="sample-table-1">
            <thead>
              <tr>
                <th class="center">#</th>
                <th>Name</th>
                <th class="hidden-xs">Email</th>
                <th>Contact No. </th>
                <th>Message </th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
$sql=mysqli_query($con,"select * from tblcontactus where IsRead is null");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

              <tr>
                <td class="center"><?php echo $cnt;?>.</td>
                <td class="hidden-xs"><?php echo $row['fullname'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['contactno'];?></td>
                <td><?php echo $row['message'];?></td>

                <td>
                  <a href="query-details.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-lg"
                    title="View Details"><i class="fa fa-file"></i></a>
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
  </div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->