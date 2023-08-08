<?php
  include("../connection.php");
  require_once("../ses_check.php");
  $ID=$_GET['ID'];
  $password=md5($_POST['password']);
  $con_password=md5($_POST['confirm_password']);
  $old_password=md5($_POST['old_password']);

  $sql_u = "SELECT * FROM student WHERE sid='$ID' AND password='$old_password'";
  $res_u = mysqli_query($conn, $sql_u);

  if (mysqli_num_rows($res_u)>0) {
    if($password===$con_password){

        $query="UPDATE student SET password='".$password."' WHERE sid='$ID'";

        $result=mysqli_query($conn,$query);

        if ($result=== TRUE) {
          echo '<script>
            alert("New Password saved successfully");
            window.location="index.php";
          </script>';
        } else {
          echo "Error:" . $sql . "<br>" . $conn->error;
        }
      }else {
        echo'<script>
          alert("New Password not match.");
          window.location="index.php";
        </script>';
      }
  }else{
    echo'<script>
      alert("Old-Password not matched.");
      window.location="index.php";
    </script>';
  }
?>
