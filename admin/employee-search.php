<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       if (isset($_GET['searchKey'])) {

       $search_key = $_GET['searchKey'];
       include "../DB_connection.php";
       include "data/registrar_office.php";
       $r_users = searchEmployee($search_key, $conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Search Employee</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($r_users != 0) {
     ?>
     <div class="container mt-5">
     <h2 class="display-5 text-primary">Found Staff</h2>

           <form action="employee-search.php"
                 method="get" 
                 class="mt-3 n-table">
             <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="searchKey"
                       value="<?=$search_key?>" 
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
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 0; foreach ($r_users as $r_user ) { 
                    $i++;  ?>
                  <tr>
                   
                    <td><?=$r_user['r_user_id']?></td>
                    <td><?=$r_user['fname']?></td>
                    <td><?=$r_user['username']?></td>
                    <td><?=$r_user['email_address']?></td>
                    <td><?=$r_user['phone_number']?></td>
                    <td><?=$r_user['address']?></td>
                    <td>
                        <a href="registrar-office-edit.php?r_user_id=<?=$r_user['r_user_id']?>"
                           class="btn btn-warning">Edit</a>
                        <a href="registrar-office-delete.php?r_user_id=<?=$r_user['r_user_id']?>"
                           class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                  No Results Found
                <a href="./registrar-office.php"
                   class="btn btn-dark">Go Back</a>
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

   }else {
    header("Location: registrar-office.php");
    exit;
   } 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>