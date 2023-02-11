<?php
session_start();
include('../includes/dbconnection.php');
if(isset($_GET['PKN'])){
    $id = $_GET['PKN'];

    $query = "UPDATE tblvehicle SET VehicleStatus = 'OUT' WHERE ID = $id";
    $ret=mysqli_query($con, $query);

    header("location:vehicle.php?msg=Transaction Success!");
    

} else{
    header("location:vehicle.php?msg=Sorry, Something went wrong");

}

?>