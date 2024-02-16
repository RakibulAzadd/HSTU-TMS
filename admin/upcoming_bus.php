<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/setting.php";

       
       $upcoming_bus = getUpcomingBus( $conn);
 ?>

<!DOCTYPE html> 
<html> 

<head> 
	<title>Update Upcoming Bus schedule</title> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
		crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"> 
	</script> 
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head> 

<body> 
<?php
      include "inc/navbar.php";?>
	<div class="container"> 
		<h1 class="text-success text-center"> 
		HSTU Update Upcoming Bus
		</h1> 
		<form method="post"
          class="shadow p-3 mt-5 form-w"
        action="./req/upcoming_bus_update.php" >
         
			<div class="row"> 
                <h3 class="text-info text-center">Students Upcoming Bus</h3> 
                <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
             <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>


				<label for="campus_s_bus" class="col-sm-3
				col-form-label">From Campus student Bus No:</label> 
				<div class="col-sm"> 
					<input type="text" class="form-control" 
                         name="campus_s_bus"
					
                        value="<?=$upcoming_bus['campus_s_bus']?>" 
                        placeholder="student upcoming Bus No from campus"> 
				</div> 
                <label for="campus_s_time" class="col-sm-1
				col-form-label">Time :</label> 
                <div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="campus_s_time"
                    value="<?=$upcoming_bus['campus_s_time']?>" 
						id="campus_s_time" 
                        placeholder="student upcoming bus time from campus "> 
				</div>                 
			</div>
             <br>
            <div class="row">  <label for="town_s_bus" class="col-sm-3
				col-form-label">From Town student Bus No:</label> 
				<div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="town_s_bus"
                    value="<?=$upcoming_bus['town_s_bus']?>" 
						id="town_s_bus"
                         placeholder="student upcoming Bus No from Town"> 
				</div> 
                <label for="town_s_time" class="col-sm-1
				col-form-label">Time :</label> 
                <div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="town_s_time"  value="<?=$upcoming_bus['town_s_time']?>" 
						id="town_s_time" placeholder="student upcoming bus time from Town "> 
				</div>
             </div>

   <br>

             <div class="row"> 
                <h3 class="text-info text-center">Teacher Upcoming Bus</h3> 
              
				<label for="campus_t_bus" class="col-sm-3
				col-form-label">From Campus Teacher Bus No:</label> 
				<div class="col-sm"> 
					<input type="text" class="form-control"
                     name="campus_t_bus"  value="<?=$upcoming_bus['campus_t_bus']?>" 
						id="campus_t_bus" placeholder="Teacher upcoming Bus No from campus"> 
				</div> 
                <label for="campus_t_time" class="col-sm-1
				col-form-label">Time :</label> 
                <div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="campus_t_time"  value="<?=$upcoming_bus['campus_t_time']?>" 
						id="campus_t_time" placeholder="Teacher Upcoming Bus time from campus "> 
				</div>                 
			</div>
             <br>
            <div class="row">  <label for="town_t_bus" class="col-sm-3
				col-form-label">From Town Teacher Bus No:</label> 
				<div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="town_t_bus"    value="<?=$upcoming_bus['town_t_bus']?>" 
						id="town_t_bus" placeholder="Teacher upcoming Bus No from Town"> 
				</div> 
                <label for="town_t_time" class="col-sm-1
				col-form-label">Time :</label> 
                <div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="town_t_time"    value="<?=$upcoming_bus['town_t_time']?>" 
						id="town_t_time" placeholder="Teacher upcoming bus time from Town "> 
				</div>
             </div>

             <br>

             <div class="row"> 
                <h3 class="text-info text-center">Staff Upcoming Bus</h3> 
        
				<label for="campus_st_bus" class="col-sm-3
				col-form-label">From Campus Staff Bus No:</label> 
				<div class="col-sm"> 
					<input type="text" class="form-control"
                     name="campus_st_bus"    value="<?=$upcoming_bus['campus_st_bus']?>" 
						id="campus_st_bus" placeholder="staff upcoming Bus No from campus"> 
				</div> 
                <label for="campus_st_time" class="col-sm-1
				col-form-label">Time :</label> 
                <div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="campus_st_time"  value="<?=$upcoming_bus['campus_st_time']?>" 
						id="campus_st_time" placeholder="Staff upcoming bus time from campus "> 
				</div>                 
			</div>
             <br>
            <div class="row">  <label for="town_st_bus" class="col-sm-3
				col-form-label">From Town Staff Bus No:</label> 
				<div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="town_st_bus"   value="<?=$upcoming_bus['town_st_bus']?>" 
						id="town_st_bus" placeholder="Staff upcoming Bus No from Town"> 
				</div> 
                <label for="town_st_time" class="col-sm-1
				col-form-label">Time :</label> 
                <div class="col-sm"> 
					<input type="text" class="form-control" 
                    name="town_st_time"   value="<?=$upcoming_bus['town_st_time']?>" 
						id="town_st_time" placeholder="Staff upcoming bus time from Town "> 
				</div>
             </div>
             <input type="text"
                value="<?=$upcoming_bus['id']?>"
                name="id"
                hidden>


 <br> <div class="text-center"><button type="submit" class="btn btn-primary">Update</button> </div>

			 
		</form> 
	</div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(6) a").addClass('active');
        });
    </script>
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