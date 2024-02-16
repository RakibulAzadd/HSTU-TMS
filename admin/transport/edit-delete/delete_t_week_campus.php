<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['ID'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../../../DB_connection.php";
     include "../AllFunction.php";

     $id = $_GET['ID'];
     if (removeTransportWeekCampus($id, $conn)) {
     	$sm = "Successfully deleted!";
      //  include "../../transport-schedule.php"
        header("Location: ../../transport-schedule.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: ../../transport-schedule.php?error=$em");
        exit;
     }


  }else {
    header("Location: ../../transport-schedule.php");
    exit;
  } 
}else {
	header("Location: ../../transport-schedule.php");
	exit;
} 