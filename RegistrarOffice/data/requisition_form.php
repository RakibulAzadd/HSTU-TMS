<?php 

if(isset($_POST['user_name'])&& 
    isset($_POST['name'])&& 
   isset($_POST['title_name'])&&
   isset($_POST['department'])&&
  
   isset($_POST['email'])&&
   isset($_POST['phone'])&& 
   isset($_POST['date'])&& 
   isset($_POST['start'])&&
   isset($_POST['end']) && 
   isset($_POST['cause'])&& 
   isset($_POST['destination']) && 
   isset($_POST['transportType'])&&
   isset($_POST['transportNumber'])&&
   isset($_POST['driverName'])  ){

    include "../../DB_connection.php";
    $uname = $_POST['user_name'];
    $name = $_POST['name'];
    $title_name = $_POST['title_name'];
    $department = $_POST['department'];
	
   $email=$_POST['email'] ; 
   $phone=$_POST['phone']; 
   $date=$_POST['date'];
   $start = $_POST['start'];
    $end = $_POST['end'];
    $cause = $_POST['cause'];
	$destination=$_POST['destination'] ;
   $transport_type=$_POST['transportType'] ; 
   $transport_number=$_POST['transportNumber']; 
   $driver_name=$_POST['driverName'];
   $status="Not Approve";
   
  //  $data = "fname=".$fname."&uname=".$uname;
    //include '../requisition.php'
    if (empty($name)) {
    	$em = "Full name is required";
    	header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($uname)){
    	$em = "user name is required";
    	header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($title_name)){
    	$em = "title name is required";
    	header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($department)){
    	$em = "Section name is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($email)){
    	$em = "faculty name is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($phone)){
    	$em = "phone number is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($date)){
    	$em = "date is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($start)){
    	$em = " start date is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($end)){
    	$em = " end date is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($cause)){
    	$em = " purpose of journey  is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($destination)){
    	$em = " Destination is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($transport_type)){
    	$em = " Transport Type is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($transport_number)){
    	$em = "Transport Number is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }else if(empty($driver_name)){
    	$em = "Driver Name is required";
        header("Location: ../requisition.php?error=$em");
	    exit;
    }
	else {

    	// hashing the password
    	//$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO requisition(user_name,name, title_name, d_name,email_address,phone_number,
        j_date,j_start,j_end,p_use,destination,transport_type,transport_no,driver_name ,status  ) 
    	        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$uname,$name, $title_name,$department,$email,$phone,$date,$start,$end,$cause,$destination,$transport_type,
         $transport_number,$driver_name,$status ]);
        
    	header("Location: ../requisition.php?success=Requisition form is successfully submitted");
	    exit;
    }


}else {
	header("Location: ../requisition.php?error=error");
	exit;
}
