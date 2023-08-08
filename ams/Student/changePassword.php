<?php
include("../connection.php");
require_once("../ses_check.php");
$UserID=$_GET['GetID'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>ChangePassword</title>
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
  <style>
    .container{
      margin: 0 auto;
      width: 30%;
      padding: 10px;
      height:auto 250px;
      margin-top: 50px;
      border-radius: 50px;
      background: #e0e0e0;
      box-shadow:  20px 20px 60px #bebebe,-20px -20px 60px #ffffff;
    }

    p{
      font-family:serif;
      text-align:center;
      font-size:large;
    }
    form{
    margin: auto;
    width: 50%;
    border: 3px solid #0c9bbe;
    padding: 10px;
    }
    input{
      display: block;
      margin: auto;
      margin-bottom:10px;
      padding: 10px;
    }

  .button{
    background: #0c9bbe;
    border-style: none;
    padding: 8px;
    height: 100%;
    width: 100%;
    font-size: medium;
    font-family: serif;
    font-weight: 500;
    color: #efefef;
    cursor: pointer;
    }

  </style>
</head>

<body>
  <div class="container">
    <p>Change Password</p>
    <form action="changePasswordDB.php?ID=<?php echo $UserID;?>" method="post">
      <input type="password" name="old_password" placeholder="Enter Old Password" required>
      <input type="password" name="password" placeholder="Enter New Password" required>
      <input type="password" name="confirm_password" placeholder="Conform Password" required>
      <input type="submit"name="regd_btn" class="button" value="Change">
    </form>
  </div>
</body>
</html>