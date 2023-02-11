<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

    if(isset($_POST['UserRegistration'])){




    date_default_timezone_set("Asia/Manila");
    //echo date("Y-m-d H:i:s",time());
    //$today = date("Y-m-d H:i:s",time());
    $today = date("Y-m-d",time());


    $OwnerName = $_POST["OwnerName"];
    $Password = $_POST["Password"];
    $ConfirmPassword = $_POST["ConfirmPassword"];
    $Email = $_POST["Email"];
    $MobileNumber = $_POST["MobileNumber"];

    
        
    $EmailExistQuery = "SELECT * FROM tbuser WHERE Email = '$Email' OR UserName = '$OwnerName' ";
    $queryRun = mysqli_query($con,$EmailExistQuery);
    $result = mysqli_fetch_array($queryRun);

        if($result > 0){

            $msg = "Email or Username Already Exists";
       
         }else{
 
    

                if($Password  != $ConfirmPassword){
                    $msg = "Password Don't Match";
                }else {     

                    $query = "INSERT INTO tbuser VALUES (0,'$OwnerName','$MobileNumber','$Email', '$Password','$today','Email Verification','$today')";
                    $query=mysqli_query($con,$query);
                    $msg = "Registered Successfully!";


                    $query = "SELECT * FROM tbuser WHERE Email = '$Email'";
                    $RunQuery=mysqli_query($con,$query);
                    $row = mysqli_fetch_array($RunQuery);

                        if($row > 0){
                           // $_SESSION["USERID"] = $row['UserID'];
                            $_SESSION["Email"]= $row['Email'];
                            $code = mt_rand(100, 990)."".mt_rand(100, 990);
                            $_SESSION["Code"] =  $code;

                            $_SESSION["UserName"]= $row['UserName'];
                            $_SESSION["ContactNumber"]= $row['MobileNumber'];
           
                            header("location: sendEmailVerification.php?userEmail=$Email&code=$code");

                        }

   
       
        }


    }

    }



    if(isset($_SESSION["USERID"])){
        header("Location: vehicle.php?msg=Already Logged In");
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
                            <label class="text-light">UserName</label>
                            <input class="form-control" type="text" placeholder="Please enter your name"
                                required="true" name="OwnerName">
                        </div>

                        <div class="form-group">
                            <label class="text-light">Password</label>
                            <input class="form-control" type="password" placeholder="Please enter your name"
                                required="true" name="Password">
                        </div>

                        <div class="form-group">
                            <label class="text-light">Confirm Password</label>
                            <input class="form-control" type="password" placeholder="Please enter your name"
                                required="true" name="ConfirmPassword">
                        </div>

                        <div class="form-group">
                            <label class="text-light">Email</label>
                            <input class="form-control" type="text" placeholder="Please enter your name"
                                required="true" name="Email">
                        </div>

                        <div class="form-group">
                            <label class="text-light">Mobile Number</label>
                            <input class="form-control" type="text" placeholder="Please enter your name"
                                required="true" name="MobileNumber">
                        </div>


                        <button type="submit" name="UserRegistration" class="btn btn-success btn-flat m-b-30 m-t-30">Sign
                            in</button>
                          
                      

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