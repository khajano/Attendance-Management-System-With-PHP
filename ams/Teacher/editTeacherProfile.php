<?php
include("../connection.php");
require_once("../ses_check.php");
$UserID=$_GET['GetID'];
$query="SELECT * from teacher where tid=".$UserID."";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
  $userID=$row["tid"];
  $fname=$row["First_Name"];
  $lname=$row["Last_Name"];
  $uname=$row["user_name"];
  $contact=$row["contact_number"];
  $email=$row["email"];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Teacher Update Profilr</title>
  <link rel="stylesheet" href="css/editTeacherProfile.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
</head>

<body>
  <div id="container">
    <div class="content">
      <a href="javascript:window.history.back();" class="arrow left"></a>
      <h1>Edit Details</h1>
      <form action="UpdateTeacherProfile.php?ID=<?php echo $userID;?>" method="post">

        <label for="fname">First Name</label>
        <input id="fname" type="text" name="First_Name" placeholder="Enter first name" required value="<?php echo $fname ?>">

        <label for="lname">Last Name</label>
        <input id="lname" type="text" name="Last_Name" placeholder="Enter last name" required value="<?php  echo  $lname ?>">

        <label for="contact">Contact Number</label>
        <input id="contact" type="text" name="contact_number" placeholder="Enter contact number" required value="<?php echo  $contact ?>" maxlength="10" pattern="[1-9]{1}[0-9]{9}" title="Please enter exactly 10 digits">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Your email" required value="<?php  echo $email?>">

        <input type="submit"name="update" class="btn" value="Save">
      </form>
    </div>
  </div>
</body>
</html>
