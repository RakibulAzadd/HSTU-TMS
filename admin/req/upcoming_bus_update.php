<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['campus_s_bus']) &&
    isset($_POST['campus_s_time']) &&
    isset($_POST['town_s_bus']) &&
    isset($_POST['town_s_time']) &&
    isset($_POST['campus_t_bus']) &&
    isset($_POST['campus_t_time']) &&
    isset($_POST['town_t_bus']) &&
    isset($_POST['town_t_time']) &&
    isset($_POST['campus_st_bus']) &&
    isset($_POST['campus_st_time']) &&
    isset($_POST['town_st_bus']) &&
    isset($_POST['town_st_time'])) {
    
    include '../../DB_connection.php';

    $campus_s_bus = $_POST['campus_s_bus'];
    $campus_s_time= $_POST['campus_s_time'];
    $town_s_bus = $_POST['town_s_bus'];
    $town_s_time= $_POST['town_s_time'];

    $campus_t_bus = $_POST['campus_t_bus'];
    $campus_t_time= $_POST['campus_t_time'];
    $town_t_bus = $_POST['town_t_bus'];
    $town_t_time= $_POST['town_t_time'];

    $campus_st_bus = $_POST['campus_st_bus'];
    $campus_st_time= $_POST['campus_st_time'];
    $town_st_bus = $_POST['town_st_bus'];
    $town_st_time= $_POST['town_st_time'];


  //include ('../upcoming_bus.php')
   

    if (empty($campus_s_bus)) {
        $em  = "Bus no is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($campus_s_time)) {
        $em  = "time is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($town_s_bus)) {
        $em  = "Bus no is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($town_s_time)) {
        $em  = "time is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }
    
    else if (empty($campus_t_bus)) {
        $em  = "Bus no is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($campus_t_time)) {
        $em  = "time is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($town_t_bus)) {
        $em  = "Bus no is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($town_t_time)) {
        $em  = "time is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }
    else if (empty($campus_st_bus)) {
        $em  = "Bus no is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($campus_st_time)) {
        $em  = "time is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($town_st_bus)) {
        $em  = "Bus no is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }else if (empty($town_st_time)) {
        $em  = "time is required";
        header("Location: ../upcoming_bus.php?error=$em");
        exit;
    }
    else {
        $id = 1;
        $sql  = "UPDATE upcoming_bus
                 SET campus_s_bus=?,
                     campus_s_time=?,
                     town_s_bus=?,
                     town_s_time=?,
                     campus_t_bus=?,
                     campus_t_time=?,
                     town_t_bus=?,
                     town_t_time=?,
                     campus_st_bus=?,
                     campus_st_time=?,
                     town_st_bus=?,
                     town_st_time=?
                 WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$campus_s_bus,$campus_s_time,$town_s_bus,$town_s_time,$campus_t_bus,$campus_t_time,$town_t_bus,$town_t_time,$campus_st_bus,$campus_st_time,$town_st_bus,$town_st_time,$id]);
        $sm = "Upcoming Bus schedule updated successfully";
        header("Location: ../upcoming_bus.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../upcoming_bus.php?error=$em");
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
