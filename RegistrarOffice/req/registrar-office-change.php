<?php 
session_start();
if (isset($_SESSION['r_user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
    	

if (isset($_POST['old_pass']) &&
    isset($_POST['new_pass'])   &&
    isset($_POST['c_new_pass']) ) {
    
    include '../../DB_connection.php';
    include "../data/registrar_office.php";

    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];

    $employee_id = $_SESSION['r_user_id'];
    
    if (empty($old_pass)) {
		$em  = "Old password is required";
		header("Location: ../pass.php?perror=$em");
		exit;
	}else if (empty($new_pass)) {
		$em  = "New password is required";
		header("Location: ../pass.php?perror=$em");
		exit;
	}else if (empty($c_new_pass)) {
		$em  = "Confirmation password is required";
		header("Location: ../pass.php?perror=$em");
		exit;
	}else if ($new_pass !== $c_new_pass) {
        $em  = "New password and confirm password does not match";
        header("Location: ../pass.php?perror=$em");
        exit;
    }else if (!employeePasswordVerify($old_pass, $conn, $employee_id)) {
      $em  = "Incorrect old password";
      header("Location: ../pass.php?perror=$em");
      exit;
  }
    else {
        // hashing the password
        $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = "UPDATE registrar_office SET
                password = ?
                WHERE r_user_id=?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_pass, $employee_id]);
        $sm = "The password has been changed successfully!";
        header("Location: ../pass.php?psuccess=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../pass.php?error=$em");
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
