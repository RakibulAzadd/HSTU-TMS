<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
       include "../DB_connection.php";
       include('../req/AllFunction.php');
   
       $transport_special_campus = getAllTransportSpecialCampus($conn);
       
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher - Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";

        if (($transport_special_campus !=0) ) {
          ?>
  
  
            <!-- campus to town special schedule start-->
  
  
  
  
            <h2 class="display-5 text-center text-primary"><b> Transport Schedule</b>
          </h2>   

          <form action="./index_tschdule_search.php" 
                 class="mt-3 n-table"
                 id="search"
                 method="get">
             <div class="input-group mb-3 w-50">
                <input type="text" 
                       class="form-control"
                       name="searchKey"
                       placeholder="Search...">
                <button class="btn btn-primary">
                       Search
                      </button>
             </div>
           </form>



  
          <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" role="alert">
              <?= $_GET['error'] ?>
            </div>
          <?php } ?>
  
          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" role="alert">
              <?= $_GET['success'] ?>
            </div>
          <?php } ?>
  
          <div class="table-responsive ml-4 mr-4">
            <table class="table table-bordered mt-4 table-striped table-hover">
              <thead>
                <tr>
  
                  <th scope="col">No</th>
                  <th scope="col">Trip Name</th>
                  <th scope="col">Day</th>
                  <th scope="col">Departure Time</th>
                  <th scope="col">Place Of Departure</th>
                  <th scope="col">To Destination</th>
                  <th scope="col">Transport Number</th>
                  <th scope="col">Route </th>
  
                </tr>
              </thead>
              <tbody>
                <?php $i = 0;
                foreach ($transport_special_campus as $t3) {
                  $i++; ?>
                  <tr>
                    <th scope="row">
                      <?= $i ?>
                    </th>
                    <td>
                      <?= $t3['t_name'] ?>
                    </td>
                    <td>
                      <?= $t3['day'] ?>
                    </td>
                    <td>
                      <?= $t3['time'] ?>
                    </td>
                    <td>
                      <?= $t3['from_d'] ?>
                    </td>
                    <td>
                      <?= $t3['to_d'] ?>
                    </td>
                    <td>
                      <?= $t3['t_no'] ?>
                    </td>
                    <td> <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#campus_to_town_special">
                        Details
                      </button>
  
                      <!-- Modal -->
                      <div class="modal fade" id="campus_to_town_special" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h2 class="modal-title" id="exampleModalLabel"><b>Campus to Town Route </b>
                              </h2>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <p class="text-center"><b>Campus -> College Mor -> Terminal -> Bot Toli -> Sahi Mosque -> BaluBari -> Hospital -> Boromath </b></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            </div>
                          </div>
                        </div>
                      </div>
  
  
  
                    </td>
                  
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div> 
   <!-- campus to town special schedule end-->
       
      
     <?php 
        }else {
          header("Location: logout.php?error=An error occurred");
          exit;
        }
     ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
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