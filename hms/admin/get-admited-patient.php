<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$response = array("status" => "failure", "data" => null, "message" => null);
$data = array();
$temp = array('patientId' => null, 'patientName' =>  null, 'admitedOn' => null);
try {
  $dept = $_GET['department'];
  $query = mysqli_query($con, "select tbladmits.*,tblpatient.ID,tblpatient.PatientName from tbladmits join tblpatient where tbladmits.departmentId = '$dept' and tbladmits.userId = tblpatient.ID and tbladmits.discharged = '0'");
  if ($query) {
    while ($row = mysqli_fetch_array($query)) {
      $temp['patientId'] = $row['ID'];
      $temp['patientName'] = $row['PatientName'];
      $temp['admitedOn'] = $row['fromDate'];
      $temp['bedNo'] = $row['bedNo'];
      array_push($data, $temp);
    }
    $response["status"] = "success";
    $response["data"] = $data;
    $response["message"] = "Data listed successfully";
    echo json_encode($response);
  }
} catch(Exception $e) {
  $msg = $e->getMessage();
  $response["message"] = "Failed. " . $msg;
  echo json_encode($response);
}