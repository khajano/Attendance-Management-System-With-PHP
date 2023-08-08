<?php
  require_once("../ses_check.php");
  include("../connection.php"); 
  $tid=$_GET['ID'];
  $sql="SELECT * FROM teacher where tid='$tid'";
  $data=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
  <title>TeacherProfile</title>
  <link rel="stylesheet" href="css/adminTeacherProfile.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png" />
</head>

<body>
  <form action="student_view.php" method="post">
    <div id="container">
      <div class="header">
        <a href="javascript:window.history.back();" class="arrow left"></a>
        <p class="Title">Teacher Profile</p>
      </div>

      <div class="element">
        <p>Name: <input type="text" class="input" value="<?php echo $row['First_Name']." ".$row['Last_Name'];?>"></p>
        <p>Teacher ID: <input type="text" class="input" value="<?php echo  $tid?>" name="tid"></p>
        <p>User name: <input type="text" class="input" value="<?php echo  $row['user_name']?>"></p>
        <p>Contact: <input type="text" class="input" value="<?php echo  $row['contact_number']?>"></p>
        <p>Email: <input type="text" class="input" value="<?php echo  $row['email']?>"></p>
        <p>Lectures</p>
        <table>
          <thead>
            <tr>
              <td>Subject</td>
              <td>Action</td>
              <td>Course</td>
              <td>Batch</td>
              <td>Semester</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql2="SELECT * FROM `teacher_subject` natural join`subjects` WHERE tid='$tid'";
            $data2=mysqli_query($conn,$sql2);
            while($row2=mysqli_fetch_assoc($data2)){?>
            <tr>
            <td><?php echo $row2['subject'];?></td>

            <!-- Delete Assigned Subject -->
            <td>
              <a href="delete-teacher-subject.php?tid=<?php echo $tid;?>&subject=<?php echo $row2['sid'];?>&course=<?php echo $row2['course'];?>&year=<?php echo $row2['year'];?>&sem=<?php echo $row2['sem_id'];?>" onclick="return confirm('Confirm Delete')">
               <input id="Delete" type="button" name="DeleteSubject" value="Delete" class="button"/>
              </a>
            </td>

            <td><?php echo $row2['course'];?></td>
            <td><?php echo $row2['year'];?></td>
            <td><?php echo $row2['sem_id'];?></td>
            </tr>
            <?php
            }?>
          </tbody>
        </table>
      </div>
    </div>
  </form>
</body>
</html>