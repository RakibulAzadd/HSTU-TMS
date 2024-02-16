<?php 

if(isset($_POST['fname']) && 
   isset($_POST['uname']) && 
   isset($_POST['pass'])  &&
   isset($_POST['email']) && 
   isset($_POST['phone']) && 
   isset($_POST['address'])){

    include "../DB_connection.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "Full name is required";
    	header("Location: ../ssemployee-register.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../ssemployee-register.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../ssemployee-register.php?error=$em&$data");
	    exit;
    }else if(empty($email)){
    	$em = "email is required";
    	header("Location: ../ssemployee-register.php?error=$em&$data");
	    exit;
    }else if(empty($phone)){
    	$em = "phone Number is required";
    	header("Location: ../ssemployee-register.php?error=$em&$data");
	    exit;
    }else if(empty($address)){
    	$em = "address is required";
    	header("Location: ../ssemployee-register.php?error=$em&$data");
	    exit;
    }
    else {

    	// hashing the password
    	$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO registrar_office(fname, username, password,email_address,phone_number,address) 
    	        VALUES(?,?,?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname, $uname, $pass,$email,$phone,$address]);

    	header("Location: ../ssemployee-register.php?success=Your account has been created successfully");
	    exit;
    }


}else {
	header("Location: ../ssemployee-register.php?error=error");
	exit;
}
