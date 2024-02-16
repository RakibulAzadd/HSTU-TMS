<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['ID'])) {

    if ($_SESSION['role'] == 'Admin') {
        include "../../../DB_connection.php";
        include "../AllFunction.php";

       
       $t_id = $_GET['ID'];
       $transport= getTransportSpecialCampusById($t_id, $conn);

       if ($transport== 0) {
       // include "../../transport-schedule.php"
         header("Location: ../../transport-schedule.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Edit Transport Schedule</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
     <div class="container mt-5">
        <a href="../../transport-schedule.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="./update_special_campus_town.php">
        <h3 class=" text-center">Edit Transport Schedule</h3><hr>
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
          <label class="form-label">Trip name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$transport['t_name']?>" 
                 name="t_name">
        </div>
        <div class="mb-3">
          <label class="form-label">Day</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$transport['day']?>" 
                 name="day">
        </div>
        <div class="mb-3">
          <label class="form-label">Departure Time</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$transport['time']?>"
                 name="time">
        </div>
        <div class="mb-3">
          <label class="form-label">Place of Departure </label>
          <input type="text" 
                 class="form-control"
                 value="<?=$transport['from_d']?>"
                 name="from_d">
        </div>
        <div class="mb-3">
          <label class="form-label">To Destination</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$transport['to_d']?>"
                 name="to_d">
        </div>
        <div class="mb-3">
          <label class="form-label">Transport Number</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$transport['t_no']?>"
                 name="t_no">
        </div>
        
        <input type="text"
                value="<?=$transport['ID']?>"
                name="ID"
                hidden>

        

      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>

    
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