<?php
session_start();
include('../includes/dbconnection.php');

if(isset($_GET['PKN'])){
    $_SESSION['vpmsaid'] = $_GET['PKN'];

}else{
    header('location:vehicle.php');

}

/*
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{
 $_SESSION['vpmsaid'];
*/

  ?>
<!doctype html>

<html class="no-js" lang="">

<head>

    <title>VPMS - Manage Incoming Vehicle</title>


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

</head>

<body>

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">



                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">DASHBOARD</strong>
                        </div>
                        <div class="d-flex justify-content-end align-items-end">
                          <a class="btn btn-dark" href="logout.php">log out</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>S.NO</th>


                              
                                        <th>Owner Name</th>
                                        <th>Vehicle Reg Number</th>

                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <?php 
$ret=mysqli_query($con,"select * from tblvehicle ");
$cnt=1;

$ID = $_GET['PKN'];
while ($row=mysqli_fetch_array($ret)) {  
  if($ID == $row['ID']){
?>

                                <tr>
                                <td><?php  echo $row['SlotNumber'];?></td>



                               
                                    <td><?php  echo $row['OwnerName'];?></td>
                                    <td><?php  echo $row['RegistrationNumber'];?></td>

                                    <td><a class="btn btn-dark"href="view.php?viewid=<?php echo $row['ID'];?>">View</a>
                                        <a class="btn btn-light" href="../print.php?vid=<?php echo $row['ID'];?>" style="cursor:pointer"
                                            target="_blank">Print ticket</a>
                                    </td>
                                </tr>
                                <?php 
$cnt=$cnt+1;
}}?>
                            </table>

                        </div>
                    </div>
                </div>



            </div>
        </div><!-- .animated -->
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
            <!-- Button trigger modal You can edit your arduino under the open and close button -->
            <button onclick="openGate()"  id="open" type="button" class="btn btn-success" >
                
                Open
                
            </button>
            &nbsp; |  &nbsp;
            <button type="button" class="btn btn-danger" onclick="closeGate()" >
                Closed
            </button>

            &nbsp; |  &nbsp;
            <a class="btn btn-danger" href="<?php $pkn = $_GET['PKN']; echo "LeaveVehicle.php?PKN=$pkn";?>">
                Leave
            </a>

            <!-- Modal -->
           
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Open</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <p>Your timer starts now <br> <span id="time"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Closed</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <p>Your timer ends now <br> <span id="times"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .content -->

        <div class="clearfix"></div>

        <?php include_once('../includes/footer.php');?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    var datetime = new Date();
    console.log(datetime);
    document.getElementById("time").textContent = datetime;
    document.getElementById("times").textContent = datetime;
    </script>
  <script>
    function myFunction() {
        var x = document.getElementById("open");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }


    function openGate(){
        var xmlhttp = new XMLHttpRequest();
    
        xmlhttp.onload = function() {
            if (this.readyState === 4 || this.status === 200){ 
           
                var dataArray = this.response;
                alert(dataArray);
           

            }else{
           
                console.log("error");
            }      
        };

        xmlhttp.onreadystatechange = function() {
           // document.getElementById('LeaderBoardContent').innerHTML = "Loading...";

    
        };

        xmlhttp.open("POST", "OpenGate.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }



    function closeGate(){
        var xmlhttp = new XMLHttpRequest();
    
        xmlhttp.onload = function() {
            if (this.readyState === 4 || this.status === 200){ 
           
                var dataArray = this.response;
                alert(dataArray);
           

            }else{
           
                console.log("error");
            }      
        };

        xmlhttp.onreadystatechange = function() {
           // document.getElementById('LeaderBoardContent').innerHTML = "Loading...";

    
        };

        xmlhttp.open("POST", "OpenGate.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }
  </script>
  
</body>

</html>

