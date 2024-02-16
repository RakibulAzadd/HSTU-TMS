<?php 
session_start();
if (isset($_SESSION['r_user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
      include "../DB_connection.php";
       include "data/registrar_office.php";
         
       $r_user_id = $_SESSION['r_user_id'];
       $employee = getR_usersById($r_user_id, $conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Information</title>
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
     <div class="d-flex justify-content-center align-items-center flex-column">
     <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/registrar-office-edit.php">
        <h3>Update Information</h3><hr>
          <?php if (isset($_GET['perror'])) { ?>
            <div class="alert alert-danger" role="alert">
             <?=$_GET['perror']?>
            </div>
          <?php } ?>
          <?php if (isset($_GET['psuccess'])) { ?>
            <div class="alert alert-success" role="alert">
             <?=$_GET['psuccess']?>
            </div>
          <?php } ?>

          <!-- update information -->
          <div class="mb-3">
          <label class="form-label">First name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$employee['fname']?>" 
                 name="fname">
        </div>
        
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$employee['username']?>"
                 name="username">
        </div>
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$employee['email_address']?>"
                 name="email_address">
        </div> 
       
        <div class="mb-3">
          <label class="form-label">Phone number</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$employee['phone_number']?>"
                 name="phone_number">
        </div>
      
         
        <div class="mb-3">
          <label class="form-label">address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$employee['address']?>"
                 name="address">
        </div>
  
        <input type="text"
                value="<?=$employee['r_user_id']?>"
                name="r_user_id"
                hidden>

      
  

      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>


          <form method="post"
              class="shadow p-3 my-5 form-w" 
              action="req/registrar-office-change.php"
              id="change_password">


       <div class="mb-3">
            <div class="mb-3">
            <label class="form-label">Old password</label>
                <input type="password" 
                       class="form-control"
                       name="old_pass"> 
          </div>

            <label class="form-label">New password </label>
            <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="new_pass"
                       id="passInput">
                <button class="btn btn-secondary"
                        id="gBtn">
                        Random</button>
            </div>
            
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm new password  </label>
                <input type="text" 
                       class="form-control"
                       name="c_new_pass"
                       id="passInput2"> 
          </div>
          <button type="submit" 
              class="btn btn-primary">
              Change</button>
        </form>
     </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });

        function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
           var passInput = document.getElementById('passInput');
           var passInput2 = document.getElementById('passInput2');
           passInput.value = result;
           passInput2.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
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