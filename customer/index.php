<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');


if(isset($_POST['login'])){


    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $query = "SELECT * FROM tbuser WHERE Email ='$Email' AND UserPassword = '$Password' ";
    $queryRun = mysqli_query($con,$query);
    $result = mysqli_fetch_array($queryRun);
 

 
    if($result > 0){

       
        $_SESSION["USERID"] = $result['UserID'];
        $_SESSION["Email"]= $result['Email'];
        $_SESSION["UserName"]= $result['UserName'];
        $_SESSION["ContactNumber"]= $result['MobileNumber'];


        header("Location: vehicle.php");

    
      

    }else{
 
        $msg = "Invalid Details";

    }






 }

     
 if(isset($_SESSION["USERID"])){
    header("Location: vehicle.php");
}

 

  ?>
<!doctype html>
<html class="no-js" lang="">

<head>

    <title> Login </title>


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="manifest" href="../manifest.json">
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

                        <p style="font-size:16px; color:red"> 
                            <?php 
                                if($msg){
                                    echo $msg;
                                }  
                            ?> 
                        </p>

                        <div class="form-group">
                            <label class="text-light">Email</label>
                            <input class="form-control" type="text" placeholder="Email"
                                required="true" name="Email">
                        </div>
                        <div class="form-group">
                            <label class="text-light">Password</label>
                            <input class="form-control" type="password" placeholder="Password"
                                required="true" name="Password">

                        </div>


                        <input type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30" value="Login">
             
                          
                        <a class="btn btn-primary text-light" href="registration.php">Register</a>

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