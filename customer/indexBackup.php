<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $ParkingNumber=$_POST['ParkingNumber'];
    $query=mysqli_query($con,"select ID from tblvehicle where ParkingNumber='$ParkingNumber'");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboards.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!doctype html>
<html class="no-js" lang="">

<head>

    <title>Parking Customer name</title>


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <br>
                <div class="login-logo d-flex justify-content-center align-items-center" >
                    <a href="index.php">
                        <h2 style="color: #fff">Customer Parking</h2>
                        
                    </a>
                 
                </div>
                <div class="d-flex justify-content-center align-items-center">
                <p style="color: #fff">Make sure you pay first so we can confirm your access</p>
                </div>
                <div class="login-form">
                    <form method="post">
                        <p style="font-size:16px; color:red"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="form-group">
                            <label class="text-light">Parking number</label>
                            <input class="form-control" type="text" placeholder="Please enter parking number "
                                required="true" name="ParkingNumber">
                        </div>
                        <div class="form-group">
                            <label class="text-light">Owner Name</label>
                            <input class="form-control" type="text" placeholder="Please enter your name"
                                required="true" name="OwnerName">
                        </div>
                        <div class="form-group">
                            <label class="text-light">Proof of payment</label> <br>
                            <input class="text-light" type="file" type="file" name="proof">
                        </div>

                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign
                            in</button>
                          
                        <a class="btn btn-primary text-light" href="vehicle.php">Add Vehicle</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>