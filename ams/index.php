<?php
  session_start();
  if(isset($SESSION['LoginUser'])){
    header('Location:verification.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Attendance_Management_System_Login</title>
    <link rel="icon" type="image/png" href="Assist/img/AMS.png"/>
    <link rel="stylesheet" href="Assist/CSS/index.css">
  </head>

  <body>
    <div class="head">
      <h1>Attendance Management System</h1>
    </div>

    <div class="container">

      <div class="AMS">
        <p class="Quoet">Attend today, and achieve tomorrow</p><img class="AMSI" src="Assist/img/AMS.png">
      </div>

      <div class="login">

        <form id="LoginForm" action="verification.php" method="post">
          <select class="u_select" name="user_type" required>
            <option value="" disabled selected>Choose Account Type</option>
            <option value="admin">Admin</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
          </select>
          <input type="Text" placeholder="@Username" required name="uname">
          <input type="password" placeholder="Password" required name="password">

          <button type="submit" name="Login_btn">Login</button>
        </form>
        <a href="register.php"><button name="reg_btn">Register</button></a>
        <a href="forgotpassword.php" class="forgotpassword">Forgot Password?</a>

      </div>
    </div>
  </body>
</html>