<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['t_name']) &&
    isset($_POST['time']) &&
    isset($_POST['from_d']) &&
    isset($_POST['to_d'])     &&
    isset($_POST['t_no'])) {
    
    include '../../DB_connection.php';
    include "../transport-add-week-town.php";

    $t_name = $_POST['t_name'];
    $time = $_POST['time'];
    $from = $_POST['from_d'];
    $to = $_POST['to_d'];
    $t_no = $_POST['t_no'];

  $data= 't_name';

 // include('../../logout.php')
    if (empty($t_name)) {
		$em  = "Trip name is required";
		header("Location: ../transport-add-week-town.php?error=$em");
		exit;
	}else if (empty($time)) {
		$em  = "Departure Time is required";
		header("Location: ../transport-add-week-town.php?error=$em");
		exit;
	}else if (empty($from)) {
		$em  = "Departure From is required";
		header("Location: ../transport-add-week-town.php?error=$em");
		exit;
	}else if (empty($to)) {
		$em  = "Destination is required";
		header("Location: ../transport-add-week-town.php?error=$em");
		exit;
	}else if (empty($t_no)) {
		$em  = "Transport Number is required";
		header("Location: ../transport-add-week-town.php?error=$em");
		exit;
	}else {
       
       
        $sql  = "INSERT INTO
                 t_week_town(t_name, time, from_d, to_d, t_no)
                 VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$t_name, $time, $from, $to, $t_no]);
        $sm = "New Transport schedule successfully";
        header("Location: ../transport-add-week-town.php?success=New Transport schedule successfully");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
      header("Location: ../transport-add-week-town.php?error=$em");
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
