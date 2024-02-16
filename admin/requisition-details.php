<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['r_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
   
       include "data/requisition.php";

       
       $requisition_id = $_GET['r_id'];
    
       $requisition = getRequisitionById($requisition_id, $conn);
       
       if ($requisition == 0) {
         header("Location: requisition.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admim- Requisition</title>
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
        <a href="requisition.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow w-900 p-3 " 
              action="./requisition-app-dec.php">
        <h3>Requisition form Details</h3><hr>
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
        <div class="mb-3">
          <label class="form-label"> name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$requisition['name']?>" 
                 name="name">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Title Name</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['title_name']?>"

                  name="title_name" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Department Name</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['d_name']?>"

                  name="d_name" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Faculty Name</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['f_name']?>"

                  name="f_name" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Email Address</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['email_address']?>"

                  name="email_address" >
        </div>
         
        <div class="mb-3">
            <label for="name" class="form-label">Phone Number</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['phone_number']?>"

                  name="phone_number" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Journey Date</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['j_date']  ?>"

                  name="j_date" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Journey Start</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['j_start']  ?>"
                  name="j_start" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Journey End</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['j_end']  ?>"

                  name="j_end" >
        </div>
        <div class="mb-3">
            <label for="cause" class="form-label">Purpose of Use</label>
            <input class="form-control" id="cause" 
            name="cause"  value="<?= $requisition['p_use']?>"
            rows="3">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Destination</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['destination']  ?>"

                  name="destination" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Transport type</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['transport_type']  ?>"

                  name="transport_type" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Transport Number</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['transport_no']  ?>"

                  name="transport_no" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Driver Name</label>
            <input type="text" 
                  class="form-control" 
                  value="<?= $requisition['driver_name']  ?>"

                  name="driver_name" >
        </div>



         <!-- Details end -->
        
        <input type="text"
                value="<?=$requisition['r_id']?>"
                name="r_id"
                hidden>

        

      <button type="submit" 
              class="btn btn-primary" name="approve">
              Approve</button>
       <button type="submit" 
              class="btn btn-primary" name="decline">
              Declined</button>
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
    header("Location: student.php");
    exit;
  } 
}else {
	header("Location: student.php");
	exit;
} 

?>