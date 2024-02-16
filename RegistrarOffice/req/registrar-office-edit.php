<?php 
session_start();
if (isset($_SESSION['r_user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
    	

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
    header("Location: ../pass.php?perror=$em");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
    header("Location: ../pass.php?perror=$em");
		exit;
	}else if (!unameIsUnique($uname, $conn, $r_user_id)) {
		$em  = "Username is taken! try another";
    header("Location: ../pass.php?perror=$em");
		exit;
	}else if (empty($address)) {
        $em  = "Address is required";
        header("Location: ../pass.php?perror=$em");
        exit;
    }else if (empty($phone_number)) {
        $em  = "Phone number is required";
        header("Location: ../pass.php?perror=$em");
        exit;
    }else if (empty($email_address)) {
        $em  = "Email address is required";
        header("Location: ../pass.php?perror=$em");
        exit;
    }else {
        $sql = "UPDATE registrar_office SET
                username = ?, fname=?, 
                address = ?,  phone_number = ?,  email_address = ?
                WHERE r_user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $fname,  $address,  $phone_number,  $email_address, $r_user_id]);
        $em = "successfully updated!";
        header("Location: ../pass.php?psuccess=$em");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../pass.php?perror=$em");
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
