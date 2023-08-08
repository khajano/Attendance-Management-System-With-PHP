<?php 
  require_once("../connection.php");
  require_once("../ses_check.php");
  if(isset($_POST['update'])){

    $UserID=$_GET['ID'];
    $fname=$_POST['First_Name'];
    $lname=$_POST['Last_Name'];
    $cont_number=$_POST['contact_number'];
    $email=$_POST['email'];

    $query="UPDATE teacher SET First_Name='".$fname."',Last_Name='".$lname."',contact_number='".$cont_number."', email='".$email."' WHERE tid='".$UserID."' ";

    $result=mysqli_query($conn,$query);

    if($result){
      echo'<script>
      alert("Updated");
      window.location="index.php";
      </script>';
    }
  }
?>