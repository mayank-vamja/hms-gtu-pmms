<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
try {
  $userId = $_POST['userId'];
  $admitedBy = $_POST['admitedBy'];
  $deptId = $_POST['department'];
  $bedNo = $_POST['bedNo'];
  $from = $_POST['fromDate'];
  $to = $_POST['toDate'];
  
  $query = mysqli_query($con, "insert into tbladmits(userId, admitedBy, departmentId, bedNo, fromDate, toDate, updatedBy) values ('$userId','$admitedBy','$deptId','$bedNo','$from','$to','$admitedBy')");
  if($query) {
    $patient_query = mysqli_query($con, "update tblpatient set isAdmit = '1' where ID = '". $_POST['userId'] ."'");
    if ($patient_query) {
      $booked_query = mysqli_query($con, "select currentPatients,booked from departments where id = '$deptId'");
      while ($row = mysqli_fetch_array($booked_query)) {
        $booked = $row['booked'];
        $curPatrients = $row['currentPatients'];
        break;
      }
      $newBooked = $booked . $bedNo . ' ';
      $newCP = $curPatrients + 1;
      $department_query = mysqli_query($con, "update departments set booked = '$newBooked', currentPatients = '$newCP'  where id = '$deptId'");
      if ($department_query) {
        echo "success";
      } else {
        echo "failure";
        mysqli_rollback($con);
        mysqli_rollback($con);
      }
    } else {
      echo "failure";
      mysqli_rollback($con);
    }
  } 
  else {
    echo "failure";
  }

  
}
catch(Exception $e) {
  echo 'failure,'.$e->getMessage();
}
