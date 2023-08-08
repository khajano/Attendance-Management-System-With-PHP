<?php
require_once("../ses_check.php");
require_once("../connection.php");
  $std_ID=$_GET['stdID'];
  $fname=$_GET['fname']; 
  $lname=$_GET['lname'];
  $course=$_GET['course'];
  $year=$_GET['year'];
  $sem=$_GET['sem'];
  $subject=$_GET['subject'];
  $date=$_GET['date'];
  $roll=$_GET['roll'];
  $attendance=$_GET['attendance']; 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Student Attendance</title>
    <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
    <link rel="stylesheet" href="css/edit.css">
  </head>

  <body>
    <div class="container">
        <div class="header">
          <p>Date: <?php echo $date ?> </p>
          <p>Attendance status: <?php echo $attendance ?> </p>
        </div>
        <div class="sdata">
          <p>Name: <?php echo $fname," ". $lname?> </p>
          <p>Roll no: <?php echo $roll ?> </p>
          <p>Batch: <?php echo $year ?> </p>
          <P>Course: <?php echo  $course ?> </P>
          <p>Semester: <?php echo $sem ?> </p>
          <p>Subject: <?php echo  $subject?> </p>
        </div>

        <form action="update_atd.php" method="GET">

          <input name="sid" type="hidden" value="<?php   echo $std_ID ;?>">
          <input name="subject" type="hidden" value="<?php   echo $subject;?>">
          <input name="date" type="hidden" value="<?php   echo $date;?>">
          <input name="course" type="hidden" value="<?php   echo $course ;?>">
          <input name="year" type="hidden" value="<?php   echo $year ;?>">
          <input name="sem" type="hidden" value="<?php   echo $sem ;?>">

          <select name="attendance" required>
            <option disabled selected value="">New status</option>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
            <option value="Leave">Leave</option>
          </select>

          <button type="submit" name="Update" value="Update">Update</button>
        </form>
    </div>
  </body>
</html>