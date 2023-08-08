<?php 
$server_name = "localhost";
$username = "root";
$password = "";
$dbname = "ams";
$conn=mysqli_connect($server_name, $username,$password, $dbname);
if($conn){
  // echo("connected");
}else{
  echo"<br>connection failed";
}
?>