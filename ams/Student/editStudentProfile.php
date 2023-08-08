<?php
include("../connection.php");
require_once("../ses_check.php");
$UserID=$_GET['GetID'];
$query="SELECT * FROM student,course where student.cid=course.cid And sid=".$UserID."";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result)){
  $userID=$row["sid"];
  $roll_no=$row["rollno"];
  $fname=$row["First_Name"];
  $lname=$row["Last_Name"];
  $uname=$row["User_name"];
  $year=$row["year"];
  $course=$row["course"];
  $cid=$row['cid'];
  $sem_id=$row["sem_id"];
  $contact=$row["contact"];
  $email=$row["email"];
}
?>

<?php
  function drop_course(){include("../connection.php");
    $records = mysqli_query($conn, "SELECT * From course where delete_stats=0");  // Use select query here

    while($data = mysqli_fetch_array($records))
    {
      echo "<option value='". $data['cid'] ."'>" .$data['course'] ."</option>";
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Update_Student</title>
  <link rel="stylesheet" href="css/std_edit.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
</head>

<body>
  <div id="container">
    <div class="content">
      <h1>Update Details</h1>
      <form class="" action="std_update.php" method="get">
        <input type="hidden" name="ID" value="<?php echo $userID;?>">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="First_Name" placeholder="Enter first name" required value="<?php echo  $fname?>">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="Last_Name" placeholder="Enter last name" required value="<?php echo $lname ?>">

        <label for="batch">Batch</label>
        <input type="text"  id="batch" name="year" placeholder="Enter Batch" required value="<?php echo $year ?>" maxlength="4" pattern="[2]{1}[0]{1}[0-9]{2}" title="Please enter valid Year">

        <label for="course">Course</label>
        <select id="course" name="course" required>
          <option selected disable value="<?php echo $cid?>"><?php echo $course?></option>
          <?php
          drop_course();
          ?>
        </select>

        <label for="roll">Roll No.</label>
        <input id="roll" type="text" name="roll_no" placeholder="Roll no." required value="<?php echo   $roll_no ?>">

        <label for="sem">Semester</label>
        <input id="sem" type="text" name="sem" placeholder="Enter semester" required value="<?php echo   $sem_id ?>" maxlength="1" pattern="[1-8]{1}" title="Please enter valid semester">

        <label for="contact">Contact Number</label>
        <input id="contact" type="text" name="contact" placeholder="Enter contact number" required value="<?php echo  $contact ?>" maxlength="10" pattern="[1-9]{1}[0-9]{9}" title="Please enter exactly 10 digit number">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Your email" required value="<?php echo $email ?>">

        <input type="submit" name="update" class="btn" value="Update">
      </form>
    </div>
  </div>
</body>
</html>
