<?php
include("connection.php");
$email=$_GET['email'];
$user_type=$_GET['user_type'];
$user_ID=$_GET['uid'];
$fname=$_GET['fname'];
$lname=$_GET['lname'];

if($user_type=='teacher'){
  if (isset($_POST['reset_btn'])){
    $password=md5($_POST['password']);
    $con_password=md5($_POST['confirm_password']);

    if($password===$con_password){

      $query="UPDATE teacher SET password='".$password."' WHERE tid='$user_ID'";

      $result=mysqli_query($conn,$query);

      if ($result=== TRUE) {
        echo '<script>
          alert("Password Reset successfully");
          window.location="index.php";
        </script>';
      }
    }else {
      echo "Password doesn't match";
    }
  }

}else if($user_type=='student'){
  if (isset($_POST['reset_btn'])){
    $password=md5($_POST['password']);
    $con_password=md5($_POST['confirm_password']);

    if($password===$con_password){

      $query="UPDATE student SET password='".$password."' WHERE sid='$user_ID'";

      $result=mysqli_query($conn,$query);

      if ($result=== TRUE) {
        echo '<script>
          alert("Password Reset successfully");
          window.location="index.php";
        </script>';
      }
    }else {
      echo "Password doesn't match";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reset Your Password</title>
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
  <link rel="stylesheet" href="Assist\css\reset_password.css">
</head>

<body>
  <div class="container">
    <p><?php echo$fname." ".$lname; ?></p>
    <p>Reset Your Password</p>
    <form action="" method="post">
      <input type="password" name="password" placeholder="Enter New Password" required>
      <input type="password" name="confirm_password" placeholder="Conform Password" required>
      <input type="submit"name="reset_btn" class="button" value="Reset">
    </form>
  </div>
</body>
</html>