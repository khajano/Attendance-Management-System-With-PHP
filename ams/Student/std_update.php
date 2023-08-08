<?php
require_once("../ses_check.php");
require_once("../connection.php");
if(isset($_GET['update'])){

  $UserID=$_GET['ID'];
  $roll_no=$_GET["roll_no"];
  $fname=$_GET["First_Name"];
  $lname=$_GET["Last_Name"];
  $year=$_GET["year"];
  $cid=$_GET["course"];
  $sem_id=$_GET["sem"];
  $contact=$_GET["contact"];
  $email=$_GET["email"];

  $query="UPDATE student SET First_Name='$fname',Last_Name='$lname',year='$year',sem_id='$sem_id',rollno='$roll_no',cid='$cid',contact='$contact',email='$email' WHERE sid='$UserID'";
  
  if($UserID !=""){
    $result=mysqli_query($conn,$query);

    if($result){
      echo'<script>
      alert("Updated");
      window.location="index.php";
      </script>';
    }else {
      echo'<script>
      alert("Error");
      window.location="index.php";
      </script>';
    }
  }else{
    echo'<script>
    alert("Something went wrong!");
    window.location="index.php";
    </script>';
  }
}
?>