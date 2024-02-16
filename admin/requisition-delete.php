<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['r_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/requisition.php";

     $id = $_GET['r_id'];
     if (removeRequisition($id, $conn)) {
     	$sm = "Successfully deleted!";
        header("Location: requisition.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: requisition.php?error=$em");
        exit;
     }


  }else {
    header("Location: requisition.php");
    exit;
  } 
}else {
	header("Location: requisition.php");
	exit;
} 