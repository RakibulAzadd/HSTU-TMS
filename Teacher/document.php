<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])&&
    isset($_GET['r_id'])) {

    if ($_SESSION['role'] == 'Teacher') {
       include "../DB_connection.php";
       include "data/teacher.php";

       
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
	<style>
      .form-control {
    white-space: nowrap;
}
    </style>
  

 

  <link rel="stylesheet" type="text/css" href="./inc/print.css" media="print">
</head>
<body>
    
     <div class="container"> 
		<h1 class="text-dark text-center"> 
		<b>HSTU  Transport Requisition Form </b>
		</h1> 
         
		<form 
          class="shadow p-3 mt-5 form-w form-control no-line-break" if="form-control"
        action="./previous-requisition.php" >
        <div class="row">  <label  class="col-sm-6 bg-info">Office Copy </label>
        <label  class="col-sm-6 bg-warning">Teacher Copy </label> 
       </div>
         
			 
        <div class="row">  <label  class="col-sm-2
				">Teacher Name  </label> 
				<div class="col-sm"> 
			          <p>: <?=$requisition['name']?> </p>
				</div> 

                <label  class="col-sm-2
				">Teacher Name </label> 
				<div class="col-sm"> 
			          <p>:  <?=$requisition['name']?> </p>
				</div>

		</div>
		<div class="row">  <label  class="col-sm-2
				">Title   </label> 
				<div class="col-sm"> 
				<p>:  <?=$requisition['title_name']?> department of <?=$requisition['d_name']?> </p>
				</div> 

                <label  class="col-sm-2
				">Title  </label> 
				<div class="col-sm"> 
			          <p>:  <?=$requisition['title_name']?> department of <?=$requisition['d_name']?> </p>
				</div>

		</div>
        <div class="row">  <label  class="col-sm-2
				">Phone No  </label> 
				<div class="col-sm"> 
			          <p>:  <?=$requisition['phone_number']?> </p>
				</div> 

                <label  class="col-sm-2
				">Phone No  </label> 
				<div class="col-sm"> 
			          <p>: <?=$requisition['phone_number']?> </p>
				</div>

		</div>
        <div class="row">  <label  class="col-sm-2
				">Journey Date  </label> 
				<div class="col-sm"> 
			          <p>: <?=$requisition['j_date']?> </p>
				</div> 

                <label  class="col-sm-2
				">Journey Date  </label> 
				<div class="col-sm"> 
			          <p> : <?=$requisition['j_date']?> </p>
				</div>

		</div>
        <div class="row">  <label  class="col-sm-2
				">Journey Start  </label> 
				<div class="col-sm"> 
			          <p>:  <?=$requisition['j_start']?> </p>
				</div> 

                <label  class="col-sm-2
				">Journey Start  </label> 
				<div class="col-sm"> 
			          <p>: <?=$requisition['j_start']?> </p>
				</div>


		</div>
        <div class="row">  <label  class="col-sm-2
				">Journey End  </label> 
				<div class="col-sm"> 
			          <p> : <?=$requisition['j_end']?> </p>
				</div> 

                <label  class="col-sm-2
				">Journey End  </label> 
				<div class="col-sm"> 
			          <p> : <?=$requisition['j_end']?> </p>
				</div>

		</div>
        <div class="row">  <label  class="col-sm-2
				">Purpose  </label> 
				<div class="col-sm"> 
			          <p>:  <?=$requisition['p_use']?> </p>
				</div> 

                <label  class="col-sm-2
				">Purpose  </label> 
				<div class="col-sm"> 
			          <p> : <?=$requisition['p_use']?> </p>
				</div>

		</div>

        <div class="row">  <label  class="col-sm-2
				">Destination  </label> 
				<div class="col-sm"> 
			          <p>: <?=$requisition['destination']?> </p>
				</div> 

                <label  class="col-sm-2
				">Destination  </label> 
				<div class="col-sm"> 
			          <p>:  <?=$requisition['destination']?> </p>
				</div>

		</div>
        <div class="row">  <label  class="col-sm-2
				">Vehicle Type  </label> 
				<div class="col-sm"> 
			          <p>:  <?=$requisition['transport_type']?> </p>
				</div> 

                <label  class="col-sm-2
				">Vehicle Type  </label> 
				<div class="col-sm"> 
			          <p> : <?=$requisition['transport_type']?> </p>
				</div>

		</div>
        <div class="row">  <label  class="col-sm-2
				">Vehicle NO  </label> 
				<div class="col-sm"> 
			          <p>:  <?=$requisition['transport_no']?> </p>
				</div> 

                <label  class="col-sm-2
				">Vehicle No  </label> 
				<div class="col-sm"> 
			          <p> : <?=$requisition['transport_no']?> </p>
				</div>

		</div>

        <div class="row">  <label  class="col-sm-2
				">Driver Name  </label> 
				<div class="col-sm"> 
			          <p> : <?=$requisition['driver_name']?> </p>
				</div> 

                <label  class="col-sm-2
				">Driver Name  </label> 
				<div class="col-sm"> 
			          <p> : <?=$requisition['driver_name']?> </p>
				</div>

		</div>

        <div class="row">  <label  class="col-sm-2
				">Approval Status  </label> 
				<div class="col-sm"> 
			          <p>: <?=$requisition['status']?> </p>
				</div> 

                <label  class="col-sm-2
				">Approval Status  </label> 
				<div class="col-sm"> 
			          <p>: <?=$requisition['status']?> </p>
				</div>

		</div>

         
        
 
        <div>
            <button onclick="window.print();" class="btn btn-success" id="print-print">Print</button>
        </div>


         <!-- Details end -->
        
        

    
   
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