<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');


if (!isset($_SESSION['USERID'])) {

    header('location:logout.php');

}else{
  
  if(isset($_POST['submit'])){

    $parkingnumber=mt_rand(100, 990);
    $catename=$_POST['catename'];
     $vehcomp=$_POST['vehcomp'];
    $vehreno=$_POST['vehreno'];
    $ownername=$_POST['ownername'];
    $ownercontno=$_POST['ownercontno'];
    $enteringtime=$_POST['enteringtime'];
    $occupiedSlot = $_POST["occupiedSlot"];
 
    
    $query=mysqli_query($con, "insert into  tblvehicle(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,SlotNumber,VehicleStatus,ParkingCharge) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno',$occupiedSlot,'Pending',50)");
   
 
    if ($query === true) {
      $message = "Vehicle Entry Detail has been added";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
    }

  
}


if(isset($_GET["msg"])){
  $msg = $_GET["msg"];
  echo "<script> alert('$msg') </script>";
}

  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>Customer Add Vehicle</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<style>
  /*
  table {
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: 20px;
   
  }
  */
  table tr {
    margin: 10px;
    color: #fff;
    height: 50px;
    color:black;
  }
  table td {
    width: 120px;
  text-align: center;
  border: 1px solid #fff;
  font-size: 18px;
  position: relative;
  }
  .occupied {
    background-color: red;
  }
  .available {
    background-color: green;
  }

  #parking-table tr{
    
    margin: 10px;
    color: #fff;
    height: 50px;
    
  
  }
</style>
<body>
  


        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                               <h1>Add your vehicle</h1>
                               <div style="float:right;"> 
                                  <a> <?php $email = $_SESSION['Email']; echo $email; ?> </a> <br/>
                                  <a class="btn btn-danger" style="color:white;" href="logout.php"> Log Out </a>
                               </div>
                            </div>

                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                   

                                <center> 
                                <table id="parking-table">
                                <!-- The table cells will be added dynamically by the JavaScript code -->
                                </table>
                                </center>
                                <br/>
                                <br/>
                                   
                                   <p style="font-size:16px; color:red" allign="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                   

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select Hours</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catename" id="catename" class="form-control">
                                                <option value="0">Select</option>
                                                <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle Company</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="vehcomp" name="vehcomp" class="form-control" placeholder="Vehicle Company" required="true"></div>
                                    </div>
                                 
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Plate Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="vehreno" name="vehreno" class="form-control" placeholder="Plate Number" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownername" name="ownername" class="form-control" placeholder="Owner Name" required="true" value="<?php if(isset($_SESSION["UserName"])){ echo $_SESSION["UserName"]; }?>"></div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Contact Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownercontno" name="ownercontno" class="form-control" placeholder="Owner Contact Number" required="true" maxlength="10" pattern="[0-9]+" value="<?php if(isset($_SESSION["ContactNumber"])){ echo $_SESSION["ContactNumber"]; }?>"></div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Proof of payment through gcash (09388419364)</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="proof" name="proof" class="form-control" placeholder="Proof of payment" required="true">
                                        <br>
    <a class="btn btn-primary" href="https://m.gcash.com/gcash-login-web/index.html#/">Gcash Payment</a>
    <a type="button" class="btn btn-success text-light" data-toggle="modal" data-target="#myModal">
  Open QR for gcash
</a>

                                    </div>
                                        
                                    </div>
                                   
                                    
                                    <div class="d-flex justify-content-end align-items-center">
                                    <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-lg" name="submit" >Add</button></p>
                                   <p style="text-align: center;"> <a  href="index.php" class="btn btn-dark btn-lg">Go back</a></p>
                                    </div>



                                    
                               </form>

                               
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="col-lg-6">
                        
                  
                </div>

           

            </div>


        </div>
        
        
        
        
        <!-- .animated -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Scan Using Gcash</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <img class="img-fluid" src="https://scontent.xx.fbcdn.net/v/t1.15752-9/324062083_857879425542074_3557165933887346273_n.jpg?stp=dst-jpg_s206x206&_nc_cat=100&ccb=1-7&_nc_sid=aee45a&_nc_eui2=AeHfTbQnyNrL-SiyqVE-XpWpu7N8RMjhzyK7s3xEyOHPIlkIJCkmHfilonnkahDEXHsuhE3gFEpotafBzxHNo12e&_nc_ohc=1CrLccWPm2AAX8SG1sh&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdR643wTGW8wQJovT1UctKnvtUIX-hWmSm2E7bVDpUrKqw&oe=63EAF446" alt="Modal Image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  
</div>

    </div>
    <hr style="color:black;backgroundColor:black;"/>

    <br/> 
  <center>
    <h1> My Vehicles </h1> 
   <table  class="table table-striped" style="width:80%;">
        <thead> 
          <tr> 
            <th scope="col"> Vehicle </th>
            <th scope="col"> Plate No. </th>
            <th scope="col"> Status </th>
            <th scope="col"> Action </th>
          </tr>
        </thead>

        <tbody>
          <?php

            $OwnerName = $_SESSION["UserName"];
            $query = "SELECT * FROM tblvehicle WHERE VehicleStatus !='OUT' AND OwnerName = '$OwnerName'";
            $queryRun=mysqli_query($con,$query);
            $resultCheck = mysqli_num_rows($queryRun);

          
            if($resultCheck  > 0){
           
             while($result = mysqli_fetch_assoc($queryRun)){
          
                if($result['VehicleStatus'] === "IN"){
                  echo "<tr color='black'>"."<td>".$result['VehicleCompanyname']."</td>"."<td>".$result['RegistrationNumber']."</td>". "<td style='color:green;'>".$result['VehicleStatus']."</td>"."<td> <a class='btn btn-success text-light' href='dashboards.php?PKN=".$result['ID']."'/> See More </a> </td>"."</tr> ";
                } else{
                 echo "<tr color='black'>"."<td>".$result['VehicleCompanyname']."</td>"."<td>".$result['RegistrationNumber']."</td>". "<td style='color:Orange;'>".$result['VehicleStatus']."</td>"."<td> </td> </tr> ";

                }
          
             }

            }

          ?>
        </tbody>
      </table>
    </center>
      <br/> 
      <br/> 
      <br/> 
      <br/> 
    <hr/>
    
    <!-- .content -->

                


    
   
    <div class="clearfix"></div>

   <?php include_once('../includes/footer.php');?>



      <br/>
</div><!-- /#right-panel -->


<!-- Right Panel -->

<!-- Scripts -->
<script>
  // Initialize an array to store the state of each slot (occupied or available)
  let slots = [];


  <?php
  
    $query = "SELECT SlotNumber FROM tblvehicle WHERE VehicleStatus ='IN' AND SlotNumber != 0";
    $queryRun=mysqli_query($con,$query);
    $result = mysqli_fetch_all($queryRun);
      foreach($result as $key){
        foreach($key as $value){ ?>
          var occupied = <?php echo $value; ?>;
          occupied--;
          slots[occupied]="occupied";

           <?php
        }
      }
      ?>


 

  console.log(occupied);

  // Function to update the table cells and the array
  function updateTable() {
    // Clear the table
    let table = document.getElementById('parking-table');
    table.innerHTML = '';

    var o = 1;

    // Add a row to the table for each slot
    for (let i = 0; i < 6; i++) {

      let row = document.createElement('tr');

      for (let j = 0; j < 6; j++) {

        let cell = document.createElement('td');
        var cellID =  i * 6 + j + 1; // Set the ID of the slot
        cell.innerHTML = cellID;

        if (slots[i * 6 + j] === 'occupied') {
          // Mark the cell as occupied and disable the button
          var k = o + 1;
          var radioID = "radio" + cellID;
          var buttonID = "button" + cellID;

          cell.className = 'occupied';
          //cell.innerHTML += '<br><div class="btn btn-primary" id="'+buttonID+'"> Occupied </div> ';
          cell.innerHTML += '<br> <div  id="'+buttonID+'"> <input type="hidden" class="ParkingSlotRadio" style="visibility:hidden;"  id="'+radioID+'" onchange="selectSlot()" value="'+o+'" >' + '<label for="'+radioID+'" class="radioLabel" style="cursor:pointer;"> Occupied </label> </div>';

          cell.onclick = '';

        } else {
          // Mark the cell as available and enable the button
          cell.className = 'available';
          //cell.innerHTML += '<br><button class="btn btn-primary" onclick="occupySlot(' + (i * 6 + j) + ')">Occupy</button>';

          var k = o + 1;
          var radioID = "radio" + cellID;
          var buttonID = "button" + cellID;
          
          cell.innerHTML += '<br> <label class="btn btn-primary" id="'+buttonID+'" for="'+radioID+'"> <input type="radio" class="ParkingSlotRadio" style="visibility:hidden;" name="occupiedSlot" id="'+radioID+'" onchange="selectSlot()" value="'+o+'" >' + '<label for="'+radioID+'" class="radioLabel" style="cursor:pointer;"> Occupy </label> </label>';

          
        }

        o++;
        row.appendChild(cell);

      }

      table.appendChild(row);

    }
  }

  // Function to occupy a slot
  function occupySlot(index) {
    slots[index] = 'occupied'; // Update the array
    updateTable(); // Update the table
  }

  function selectSlot(){
    radioButtons = document.getElementsByClassName('ParkingSlotRadio');
    radioLabel = document.getElementsByClassName('radioLabel');
 
    radioButtonsLeng = radioButtons.length;

    var j = 1;
    for(var i = 0; i<radioButtonsLeng;i++){
      if(radioButtons[i].checked === true){
        radioLabel[i].innerText = "Selected";
        radioLabel[i].style.backgroundColor = "red";
        var buttonID = "button" + j;
        button = document.getElementById(buttonID).style.backgroundColor = "red";


      } else{

        if(slots[i] != "occupied"){
          radioLabel[i].innerText = "Occupy";
          radioLabel[i].style.backgroundColor = "";
          var buttonID = "button" + j;
          button = document.getElementById(buttonID).style.backgroundColor = "";
        } else{
          radioLabel[i].innerText = "Occupied";
          radioLabel[i].style.backgroundColor = "";
          var buttonID = "button" + j;
          button = document.getElementById(buttonID).style.backgroundColor = "";
        }
 

      }
      j++;

    }
  };

  // Initialize the table and the array with all slots available
  for (let i = 0; i < 36; i++) {
    slots.push('available');
  }
  updateTable();
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>
