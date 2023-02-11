<?php

session_start();
include('../includes/dbconnection.php');


$Email = $_POST["Email"];
$Password = $_POST["Password"];
echo $query = "SELECT * FROM tbuser WHERE Email ='$Email' AND UserPassword = '$Password' ";
$queryRun = mysqli_query($con,$query);
$result = mysqli_fetch_array($queryRun);



if($result > 0){

   
    $_SESSION["USERID"] = $result['UserID'];
    $_SESSION["Email"]= $result['Email'];

    header("Location: vehicle.php");


  

}else{

    $msg = "Invalid Details";

}


?>