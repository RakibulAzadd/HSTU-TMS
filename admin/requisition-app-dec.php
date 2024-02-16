<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	
    
    include '../DB_connection.php';
   
    $r_id = $_POST['r_id'];
    if(isset($_POST['approve'])){
     $status="Approved";
        $sql = "UPDATE requisition SET
                status = ?
                WHERE r_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$status, $r_id]);
        $sm = "Approved!";
       
        header("Location: ./requisition.php?success=$sm&$data");
        exit;
    }
    else if(isset($_POST['decline'])){
        $status="Declined";
        $sql = "UPDATE requisition SET
                status = ?
                WHERE r_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$status, $r_id]);
        $sm = "Declined!";
       
        header("Location: ./requisition.php?success=$sm&$data");
        exit;
    }
    else{
        header("Location: ../logout.php");
    }

  }else {
    
    header("Location: ../logout.php");
    exit;
  } 
}else {
	header("Location: ../logout.php");
	exit;
} 
