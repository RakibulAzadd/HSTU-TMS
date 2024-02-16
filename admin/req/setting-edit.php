<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['notice1']) &&
    isset($_POST['notice2']) &&
    isset($_POST['notice3'])) {
    
    include '../../DB_connection.php';

    $notice1 = $_POST['notice1'];
    $notice2 = $_POST['notice2'];
    $notice3 = $_POST['notice3'];
  

   

    if (empty($notice1)) {
        $em  = "Notice is required";
        header("Location: ../settings.php?error=$em");
        exit;
    }else if (empty($notice2)) {
        $em  = "Notice is required";
        header("Location: ../settings.php?error=$em");
        exit;
    }else if (empty($notice3)) {
        $em  = "Notice is required";
        header("Location: ../settings.php?error=$em");
        exit;
    }else {
        $id = 1;
        $sql  = "UPDATE setting 
                 SET notice1=?,
                     notice2=?,
                     notice3=?
                 WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$notice1, $notice2, $notice3, $id]);
        $sm = "Notice updated successfully";
        header("Location: ../settings.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    
    header("Location: ../settings.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
