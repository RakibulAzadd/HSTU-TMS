<?php 

if(isset($_POST['fname']) && 
   isset($_POST['title_name']) &&
   isset($_POST['d_name']) &&
   isset($_POST['f_name']) &&
   isset($_POST['uname']) && 
   isset($_POST['pass'])  &&
   isset($_POST['email']) && 
   isset($_POST['phone']) && 
   isset($_POST['address'])){

    include "../DB_connection.php";
  
    $fname = $_POST['fname'];
	$title_name = $_POST['title_name'];
	$d_name = $_POST['d_name'];
	$f_name = $_POST['f_name'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "Full name is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }else if(empty($title_name)){
    	$em = "title name is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }else if(empty($d_name)){
    	$em = "Department name is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }else if(empty($f_name)){
    	$em = "Faculty name is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }
	else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }else if(empty($email)){
    	$em = "email is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }else if(empty($phone)){
    	$em = "phone Number is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }else if(empty($address)){
    	$em = "address is required";
    	header("Location: ../teacher-register.php?error=$em&$data");
	    exit;
    }
    else {

    	// hashing the password
    	$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO teachers(fname,title_name,d_name,f_name, username, password,email_address,phone_number,address) 
    	        VALUES(?,?,?,?,?,?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname,$title_name,$d_name,$f_name, $uname, $pass,$email,$phone,$address]);

    	header("Location: ../teacher-register.php?success=Your account has been created successfully");
	    exit;
    }


}else {
	header("Location: ../teacher-register.php?error=error");
	exit;
}
