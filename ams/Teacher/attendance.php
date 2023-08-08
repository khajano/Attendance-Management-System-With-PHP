<!-- This file helps to view student data and take attendance. -->

<!-- Data or attendance taken is saved in database. Data from this page is sent to save_data_attendance.php file. This file will assist in saving data in DB.  -->

<?php
  include("../connection.php");
  require_once("../ses_check.php");
  $course=$_POST['course'];
  $batch=$_POST['year'];
  $sem=$_POST['sem'];
  $subject=$_POST['subject'];

  //SQL query to check if data is already inserted
  $check=mysqli_query($conn,"SELECT * from student as s join subjects as sb where sb.subject='$subject'  and s.cid=$course and sb.cid=$course  and s.year=$batch and s.sem_id=$sem and s.Active_Status=1");
  $checkrows=mysqli_num_rows($check);

  //Condition to check and view student data and show if available else send a message
  if($checkrows>0) {?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Attendance</title>
      <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
      <link rel="stylesheet" href="css/attendance.css">
    </head>
    <body>
      <div class="container">
        <div class="header">
          <a href="javascript:window.history.back();" class="arrow left"></a>
          <h1 class="Title">Take Attendance</h1>
        </div>
        <form action="save_data_attendance.php" method="GET">

        <input type="hidden" name="cid" value="<?php echo $course;?>">
          <table>

            <thead>
            <th colspan="3"> <input type="text" name="subject" value="<?php echo $subject;?>" class="subject" >

            <th colspan="2"><input type="text" name="date" value="<?php echo date("Y-m-d");?>" class="ams"> </th>
            </thead>

            <thead>
              <th colspan="2">
              <input name="course" type="text" class="ams" value=
                "<?php
                $sql1="SELECT * from course where cid=$course";
                $result1=mysqli_fetch_array(mysqli_query($conn,$sql1));
                echo"$result1[0]";
                ?>"
                >
              </th>
              <th ><input name="batch" type="text" value="<?php echo $batch;?>" class="ams"> </th>
              <th colspan="2"><input name="sem" type="text" value="<?php echo $sem;?>" class="ams"></th>
            </thead>

            <thead>
            <th>Roll no.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>ID</th>
            <th>Mark attendance</th>
            </thead>

            <?php
              include("../connection.php");
              $course=$_POST['course'];
              $batch=$_POST['year'];
              $sem=$_POST['sem'];
              $subject=$_POST['subject'];

              $sql="SELECT * from student where cid=$course  and year=$batch and sem_id=$sem and Active_Status=1 order by rollno";
              $result=mysqli_query($conn,$sql);

            if($result){
              $i=0;
              while($row=$result-> fetch_assoc()){ ?>
                  <tr>
                    <td><input type='text'  name='rollno[]' value= "<?php echo $row["rollno"];?>"  class="disable"></td>
                    <td><input type="text"  name='First_Name[]' value="<?php echo $row["First_Name"]; ?>"  class="disable"></td>
                    <td><input type="text"  name='Last_Name[]' value="<?php echo $row["Last_Name"]; ?>"  class="disable"></td>
                    <td><input type='text'  name='sid[]' value="<?php echo $row['sid']; ?>"  class="disable"></td>
                    <td>
                    P<input type='radio' value='Present' name='checkbox[<?= $i ?>]'required/>
                    A<input type='radio' value='Absent' name='checkbox[<?= $i ?>]'/>
                    L<input type='radio' value='Leave' name='checkbox[<?= $i ?>]'/>
                    </td>
                  </tr>
            <?php $i++; }?>

            </table>
          <?php } ?>
          </table>
            <button  class="button" type="submit">Save Attendance</button>
        </form>
      </div>
    </body>
    </html>

  <?php
}
  else {
    echo '<script type="text/javascript">';
    echo 'alert("Your request is not valid. Please provide a valid input field");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
  }
?>