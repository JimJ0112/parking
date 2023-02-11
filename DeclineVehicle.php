<?php
session_start();
include('includes/dbconnection.php');
if(isset($_GET['vid'])){
    $id = $_GET['vid'];

    $query = "UPDATE tblvehicle SET VehicleStatus = 'Declined' WHERE ID = $id";
    $ret=mysqli_query($con, $query);

    header("location:manage-incomingvehicle.php?msg=Transaction Success!");
    

} else{
    header("location:manage-incomingvehicle.php?msg=Sorry, Something went wrong");

}

?>