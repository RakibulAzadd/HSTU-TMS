<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {

    include "../DB_connection.php";
   
   
    ?>
   <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin - Add Teacher</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="icon" href="../logo.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
 
    <body>
      <?php
      include "inc/navbar.php";
      ?>
      <div class="container mt-5">
        <a href="teacher.php" class="btn btn-dark">Go Back</a>
        <div class="d-flex justify-content-center align-items-center ">
    	
    	<form class="shadow w-450 p-3" 
    	      action="./req/teacher-add.php" 
    	      method="post">

    		<h4 class="display-4  fs-1">Add Teacher Account</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label">Full Name</label>
		    <input type="text" 
		           class="form-control"
		           name="fname"
		           value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Title Name</label>
		    <input type="text" 
		           class="form-control"
		           name="title_name"
		           value="<?php echo (isset($_GET['title_name']))?$_GET['title_name']:"" ?>">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Department </label>
		    <input type="text" 
		           class="form-control"
		           name="d_name"
		           value="<?php echo (isset($_GET['d_name']))?$_GET['d_name']:"" ?>">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Faculty </label>
		    <input type="text" 
		           class="form-control"
		           name="f_name"
		           value="<?php echo (isset($_GET['f_name']))?$_GET['f_name']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">User name</label>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>
          <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="email" 
		           class="form-control"
		           name="email"
		           value="<?php echo (isset($_GET['email']))?$_GET['email']:"" ?>">
		  </div>
          <div class="mb-3">
		    <label class="form-label">Phone Number</label>
		    <input type="text" 
		           class="form-control"
		           name="phone"
		           value="<?php echo (isset($_GET['phone']))?$_GET['phone']:"" ?>">
		  </div>
          <div class="mb-3">
		    <label class="form-label">Address</label>
		    <input type="text" 
		           class="form-control"
		           name="address"
		           value="<?php echo (isset($_GET['address']))?$_GET['address']:"" ?>">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Sign Up</button>
		  
		  
		  
		</form>
    </div>
         

    </body>

    </html>
  <?php

  } else {
    header("Location: ../login.php");
    exit;
  }
} else {
  header("Location: ../login.php");
  exit;
}

?>