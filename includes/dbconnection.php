<?php
/*
$con=mysqli_connect("localhost", "root", "", "vpmsdb");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}*/

/*
$con=mysqli_connect("localhost", "root", "", "vpmsdb_v2");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
*/

// jim
$con=mysqli_connect("localhost:3307", "root", "", "vpmsdb_v2");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

?>
