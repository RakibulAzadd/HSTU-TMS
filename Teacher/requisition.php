<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
      include "../DB_connection.php";
       include "data/teacher.php";
         
       $teacher_id = $_SESSION['teacher_id'];
       $teacher = getTeacherById($teacher_id, $conn);
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisition</title>
    <!-- Add Bootstrap CSS link here -->
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
<div class="container mt-10 ">
    <form class="shadow w-900 p-3" 
    	      action="data/requisition_form.php" 
    	      method="post">

    		<h4 class="display-4  fs-1 text-center">Requisition Form</h4><br>
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
          <label for="user_name" class="form-label">User Name</label>
            <input type="text" class="form-control"
             id="user_name" name="user_name"
             value="<?=$teacher['username']?>"
              required>
      </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" 
            id="name" name="name" 
            value="<?=$teacher['fname']?>" 
              required>
        </div>
        
        <div class="mb-3">
            <label for="name" class="form-label">Title Name</label>
            <input type="text" class="form-control" id="title_name" name="title_name"
            value="<?=$teacher['title_name']?>" 
             required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department Name</label>
            <input type="text" class="form-control" id="department"
             name="department"  value="<?=$teacher['d_name']?>" 
             required>
        </div>
        <div class="mb-3">
            <label for="faculty" class="form-label">Faculty Name</label>
            <input type="text" class="form-control" id="faculty" name="faculty"
            value="<?=$teacher['f_name']?>" 
             required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
            value="<?=$teacher['email_address']?>"
            required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?=$teacher['phone_number']?>"
            required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date of Journey</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="start" class="form-label">Journey Start</label>
            <input type="text" class="form-control" id="start" name="start" required>
        </div>
        <div class="mb-3">
            <label for="end" class="form-label">Journey End</label>
            <input type="text" class="form-control" id="end" name="end" required>
        </div>
        <div class="mb-3">
            <label for="cause" class="form-label">Purpose of Use</label>
            <textarea class="form-control" id="cause" name="cause" rows="3" placeholder="Write something here..."></textarea>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" required>
        </div>
        <div class="mb-3">
            <label for="transportType" class="form-label">Vehicle Type</label>
            <select class="form-select" id="transportType" name="transportType" required>
                <option value="" disabled selected>Select transport type</option>
                <option value="car">Car</option>
                <option value="bus">Bus</option>
                <option value="bus">Ambulance</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="mb-3">
            <label for="transportNumber" class="form-label">Transport Number</label>
            <input type="text" class="form-control" id="transportNumber" name="transportNumber" >
        </div>
        <div class="mb-3">
            <label for="driverName" class="form-label">Driver Name</label>
            <input type="text" class="form-control" id="driverName" name="driverName">
        </div>
        <button type="submit" class=" btn btn-primary">Submit</button>
    </form>
</div>

<!-- Add Bootstrap JS and Popper.js scripts here -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>