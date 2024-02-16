<?php 
session_start();
if (isset($_SESSION['r_user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
      include "../DB_connection.php";
       include "data/registrar_office.php";
         
       $r_user_id = $_SESSION['r_user_id'];
       $requisition = getAllRequisition($conn);
       
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Requisition</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($requisition != 0) {
     ?>
     <div class="container mt-5">
     <h2 class="display-5 text-Warning"><b>All Requisition</b></h2>
     <div class=" text-end"><a href="./requisition.php" class="btn btn-primary">Make New Requisition</a></div>
           <form action="./requisition-search.php" 
                 class="mt-3 n-table"
                 method="get">
             <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="searchKey"
                       placeholder="Search...">
                <button class="btn btn-primary">
                        <i class="fa fa-search" 
                           aria-hidden="true"></i>
                      </button>
                      
                
             </div>
              
           </form>
            

           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 table-striped table-hover">
                <thead>
                  <tr>

                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Purpose</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Status</th>
                   
                     
               
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($requisition as $req ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                     <td><?=$req['name']?></td>
                    <td> 
                        <?=$req['email_address']?>  
                    </td>
                    <td><?=$req['phone_number']?></td>
                    <td><?=$req['j_date']?></td>
                    <td><?=$req['p_use']?></td>
                    <td><?=$req['destination']?></td>
                    <td><?=$req['status']?></td>
                    <td>
                        <a href="./requisition_deatils.php?r_id=<?=$req['r_id']?>"
                           class="btn btn-warning">Download</a>
                    </td>
                    
                    
                    
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
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