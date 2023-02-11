<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

    if(isset($_POST['UserRegistration'])){





    $VerificationInput = $_POST["VerificationInput"];
    $userID = $_SESSION["USERID"];
    $code = $_SESSION["Code"];


    if($code  != $VerificationInput){
        $msg = "Incorrect Code";

    }else {     


   
                $_SESSION["USERID"] = $_SESSION["RegisteredUserID"];


                header("Location: vehicle.php?msg=Registered Successfully! ");

            

   
       
    }



    }


    
    if(isset($_SESSION["USERID"])){
        header("Location: vehicle.php");
    }

?>


<!doctype html>
<html class="no-js" lang="">

<head>

    <title> Parking Customer Registration </title>


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
                            <label class="text-light">Verification Code </label>
                            <input class="form-control" type="number" placeholder="Please enter your email verification code"
                                required="true" name="VerificationInput">
                        </div>






                        <button type="submit" name="UserRegistration" class="btn btn-success btn-flat m-b-30 m-t-30">Enter </button>
                          
                      

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