<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

        if(isset($_POST['fname']) && 
        isset($_POST['title_name']) &&
        isset($_POST['d_name']) &&
        isset($_POST['uname']) && 
        isset($_POST['pass'])  &&
        isset($_POST['email']) && 
        isset($_POST['phone']) && 
        isset($_POST['address'])){
     
         include "../../DB_connection.php";
       
         $fname = $_POST['fname'];
         $title_name = $_POST['title_name'];
         $section = $_POST['d_name'];
         $uname = $_POST['uname'];
         $pass = $_POST['pass'];
         $email=$_POST['email'];
         $phone=$_POST['phone'];
         $address=$_POST['address'];
     
         $data = "fname=".$fname."&uname=".$uname;
                //  include ("../teacher-add.php")
         if (empty($fname)) {
             $em = "Full name is required";
             header("Location: ../registrar-office-add.php?error=$em&$data");
             exit;
         }else if(empty($uname)){
             $em = "User name is required";
             header("Location: ../registrar-office-add.php?error=$em&$data");
             exit;
         }else if(empty($title_name)){
             $em = "title name is required";
             header("Location: ../registrar-office-add.php?error=$em&$data");
             exit;
         }else if(empty($section)){
             $em = "Department name is required";
             header("Location: ../registrar-office-add.php?error=$em&$data");
             exit;
         }
         else if(empty($pass)){
             $em = "Password is required";
             header("Location: ../registrar-office-add.php?error=$em&$data");
             exit;
         }else if(empty($email)){
             $em = "email is required";
             header("Location: ../registrar-office-add.php?error=$em&$data");
             exit;
         }else if(empty($phone)){
             $em = "phone Number is required";
             header("Location: ../registrar-office-add.php?error=$em&$data");
             exit;
         }else if(empty($address)){
             $em = "address is required";
             header("Location: ../registrar-office-add.php?error=$em&$data");
             exit;
         }
         else {
           //  include("../registrar-office-add.php")
             // hashing the password
             $pass = password_hash($pass, PASSWORD_DEFAULT);
     
             $sql = "INSERT INTO registrar_office(fname,title_name,section, username, password,email_address,phone_number,address) 
                     VALUES(?,?,?,?,?,?,?,?)";
             $stmt = $conn->prepare($sql);
             $stmt->execute([$fname,$title_name,$section, $uname, $pass,$email,$phone,$address]);
     
             header("Location: ../registrar-office-add.php?success=New Staff account has been created successfully");
             exit;
         }
     
     
     }else {
         header("Location: ../registrar-office-add.php?error=error");
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
