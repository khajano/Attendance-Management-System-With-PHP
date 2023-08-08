<?php
  require_once("../ses_check.php");
  include("../connection.php");

  $name= $_SESSION['username'];
  $sql="SELECT * FROM student where User_name='$name'";
  $data=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($data);
    
  $cid=$row['cid'];
  $sql1="SELECT * FROM course where cid=$cid";
  $data1=mysqli_query($conn,$sql1);
  $row1=mysqli_fetch_assoc($data1);

  $sem=$row['sem_id'];
  $sql2="SELECT * FROM subjects where cid=$cid AND sem_id=$sem";
  $data2=mysqli_query($conn,$sql2);


  $sid=$row['sid'];
  $fname=$row['First_Name'];
  $lname=$row['Last_Name'];
  $year=$row['year'];
  $course=$row1['course'];
  $sem=$row['sem_id'];
  $roll_no=$row['rollno'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Student_Attendance_Viewer</title>
  <link rel="stylesheet" href="css/student.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png" />
</head>

<body>

  <form action="student_view.php" method="post">
    <div id="container">
      <div class="header">
        <p class="Title">Student Profile</p>
        <a href="../ses_clear.php" class="logout">Logout</a>
      </div>

      <div class="element">
        <p>Name: <input type="text" class="input" value="<?php echo  $fname." ". $lname;?>"></p>

        <p>Student ID: <input type="text" class="input" value="<?php echo  $sid?>" name="sid"></p>

        <p>Batch: <input type="text" class="input" value="<?php echo $year;?>" name="year"></p>

        <p>Course: <input type="text" class="input" value="<?php echo $course;?>" name="course"> </p>

        <p>Semester: <input type="text" class="input" value="<?php echo $sem;?>" name="sem_id"> </p>

        <p>Roll no.:<input type="text" class="input" value="<?php echo $roll_no;?>" name="roll_no"> </p>

        <a href="editStudentProfile.php?GetID=<?php echo $sid?>" onclick="return confirm('Confirm Edit')">
          <input type="button" value="Edit Details" class="ebtn">
        </a>

        <a href="changePassword.php?GetID=<?php echo $sid?>" onclick="return confirm('Change Password')">
          <input type="button" value="Change Password" class="ebtn">
        </a>

        <p>View Your Attendance</p>
        <select name="subject" required>
          <option value="" disabled selected> Select Subject</option>
          <?php
            if($data2 -> num_rows >0){
              while($row2=$data2-> fetch_assoc()){ ?>
          <option value="<?php echo $row2['subject']; ?>"><?php echo $row2['subject']; ?></option>
          <?php }
            }else {
              echo"not found";
            }
          ?>
        </select>
        <input type="submit" value="View" class="btn">
      </div>
    </div>
  </form>
</body>
</html>