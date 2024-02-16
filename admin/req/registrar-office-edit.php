<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['fname'])   &&
    isset($_POST['username'])   &&
    isset($_POST['r_user_id']) &&
    isset($_POST['address'])  &&
    isset($_POST['phone_number'])  &&
    isset($_POST['email_address'])) {
    
    include '../../DB_connection.php';
    include "../data/registrar_office.php";

    $fname = $_POST['fname'];
    $uname = $_POST['username'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $r_user_id = $_POST['r_user_id'];
    

    $data = 'r_user_id='.$r_user_id;

    if (empty($fname)) {
		$em  = "First name is required";
		header("Location: ../registrar-office-edit.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../registrar-office-edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn, $r_user_id)) {
		$em  = "Username is taken! try another";
		header("Location: ../registrar-office-edit.php?error=$em&$data");
		exit;
	}else if (empty($address)) {
        $em  = "Address is required";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else if (empty($phone_number)) {
        $em  = "Phone number is required";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else if (empty($email_address)) {
        $em  = "Email address is required";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE registrar_office SET
                username = ?, fname=?, 
                address = ?,  phone_number = ?,  email_address = ?
                WHERE r_user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $fname,  $address,  $phone_number,  $email_address, $r_user_id]);
        $sm = "successfully updated!";
        header("Location: ../registrar-office-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../registrar-office.php?error=$em");
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
