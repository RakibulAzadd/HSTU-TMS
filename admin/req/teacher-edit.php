<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['fname'])      &&
    isset($_POST['username'])   &&
    isset($_POST['teacher_id']) &&
    isset($_POST['phone_number'])  &&
    isset($_POST['email_address']) &&
    isset($_POST['address'])) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";

    $fname = $_POST['fname'];
    $uname = $_POST['username'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $email_address = $_POST['email_address'];
    $teacher_id = $_POST['teacher_id'];
    

    $data = 'teacher_id='.$teacher_id;

    if (empty($fname)) {
		$em  = "First name is required";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn, $teacher_id)) {
		$em  = "Username is taken! try another";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($address)) {
        $em  = "Address is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($phone_number)) {
        $em  = "Phone number is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($email_address)) {
        $em  = "Email address is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE teachers SET
                username = ?, fname=?,
                address = ?, phone_number = ?, email_address = ?
                WHERE teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,  $fname,  $address,  $phone_number, $email_address, $teacher_id]);
        $sm = "successfully updated!";
        header("Location: ../teacher-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../teacher.php?error=$em");
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
