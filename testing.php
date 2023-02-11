<?php
include('includes/dbconnection.php');

$query = "SELECT SlotNumber FROM tblvehicle WHERE VehicleStatus ='IN' AND SlotNumber != 0";
$queryRun=mysqli_query($con,$query);
$result = mysqli_fetch_all($queryRun);
  foreach($result as $key){
    foreach($key as $value){ ?>
       <?php echo $value; ?>

       <?php
    }
  }
  ?>