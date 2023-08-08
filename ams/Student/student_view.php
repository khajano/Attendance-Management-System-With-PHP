<?php
  require_once("../ses_check.php");
  include("../connection.php");

  $sid=$_POST['sid'];
  $year=$_POST['year'];
  $course=$_POST['course'];
  $sem=$_POST['sem_id'];
  $roll=$_POST['roll_no'];
  $subject=$_POST['subject'];

  $sql="SELECT COUNT(*) as c  FROM `attendance_record` a natural join`student` WHERE a.course= '$course' AND a.year='$year' AND a.sem='$sem' AND a.sid='$sid' AND a.rollno='$roll' AND a.subject='$subject' " ;
  $data=mysqli_query($conn,$sql);

  while($row=mysqli_fetch_array($data)){?>
    <table>
      <tr>
        <!-- Query for Present -->
        <?php
          $sql1="SELECT COUNT(*) as c FROM attendance_record WHERE  attendance_stat='present' and sid='$sid' and subject='$subject'";
          $data1=mysqli_query($conn,$sql1);
          $row1=mysqli_fetch_assoc($data1);
        ?>
        <!-- Query for Absent -->
        <?php
          $sql2="SELECT COUNT(*) as c FROM attendance_record WHERE  attendance_stat='absent' and sid='$sid' and subject='$subject'";
          $data2=mysqli_query($conn,$sql2);
          $row2=mysqli_fetch_assoc($data2);
        ?>
        <!-- Query for Leave -->
        <?php
          $sql3="SELECT COUNT(*) as c FROM attendance_record WHERE  attendance_stat='leave' and sid='$sid' and subject='$subject'";
          $data3=mysqli_query($conn,$sql3);
          $row3=mysqli_fetch_assoc($data3);
        ?>

        <?php
          $sql4="SELECT count( * ) as attendance_stat FROM attendance_record WHERE sid='$sid' and subject='$subject'";
          $data4=mysqli_query($conn,$sql4);
          $row4=mysqli_fetch_assoc($data4);
        ?>
      </tr>
    </table>
    <?php
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student_Attendance_Viewer</title>
  <link rel="stylesheet" href="css/student.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png" />
</head>

<body>
  <div id="container">
    <div class="header">
      <a href="javascript:window.history.back();" class="arrow left"></a>
      <p class="Title"><?php echo $subject;?></p>
    </div>
    <div class="element">
      <p class="AR">Attendance Report</p>
      <table>
        <thead>
          <tr>
            <th class="h">Present</th>
            <th class="h">Absent</th>
            <th class="h">Leave</th>
            <th class="h">Attendance Days</th>
            <th class="h">Attendance Percentage</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><?php echo $row1['c'] ?></td>
            <td><?php echo $row2['c'] ?></td>
            <td><?php echo $row3['c'] ?></td>
            <td><?php echo $row4['attendance_stat'] ?></td>
            <td><?php
                  // $mathematical expression to calculate % Present/Total Days *100%
                  if($row1['c'] > 0){
                      $percentage=($row1['c']/$row4['attendance_stat'])*100;
                      if($percentage<80){
                        echo "<font color='red'>".round($percentage, 2)."%"."</font>";
                      }else{
                        echo "<font color='green'>".round($percentage, 2)."%"."</font>";
                    }
                   }else{
                     echo"NA";
                    }
                ?>
            </td>
          </tr>
        </tbody>
      </table>
      <p class="quote">"80% of <span class="hilight">Success</span> is <span class="hilight">showing up.</span>"</p>
    </div>
  </div>
</body>
</html>