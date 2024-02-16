<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transport Schedule Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php
    include "inc/navbar.php";
    ?>
    <div class="container mt-4  ">

        <form class="shadow w-450 p-5" action="./transport/add-week-town-cam.php" method="post">

            <h4 class="display-4  fs-1 text-center"><b>Town to Campus Weekend Transport Schedule Add</b></h4><br>

            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php } ?>
            <!-- include()
            form start -->


            <div class="mb-3">
                <label class="form-label">Trip Name</label>
                <input type="text" class="form-control" name="t_name"
                    value="<?php echo (isset($_GET['t_name'])) ? $_GET['t_name'] : "" ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Departure Time</label>
                <input type="text" class="form-control" name="time"
                    value="<?php echo (isset($_GET['time'])) ? $_GET['time'] : "" ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">From Departure</label>
                <input type="text" class="form-control" name="from_d"
                    value="<?php echo (isset($_GET['from_d'])) ? $_GET['from_d'] : "" ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">To Destination</label>
                <input type="text" class="form-control" name="to_d"
                    value="<?php echo (isset($_GET['to_d'])) ? $_GET['to_d'] : "" ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Transport Number</label>
                <input type="text" class="form-control" name="t_no"
                    value="<?php echo (isset($_GET['t_no'])) ? $_GET['t_no'] : "" ?>">
            </div>



            <button type="submit" class="btn btn-primary">Add New Transport</button>

        </form>
    </div>
</body>

</html>