<?php
  require_once("../ses_check.php");
  include("../connection.php");
  $subject=$_GET['subject'];
  $date=$_GET['date'];
  $course=$_GET['course'];
  $batch=$_GET['batch'];
  $sem=$_GET['sem'];
  $cid=$_GET['cid'];

  // student array data
  $sid=$_GET['sid'];
  $roll_no=$_GET['rollno'];
  $attendance=$_GET['checkbox'];
  $today=date('Y-m-d');
  // var_dump($attendance);

  //SQL query to check if data is already inserted
  $check=mysqli_query($conn,"SELECT * FROM `attendance_record` a natural join`student` s WHERE a.course= '$course'  AND a.year='$batch' AND a.sem=$sem AND a.subject='$subject' AND a.date='$today' " );

  $checkrows=mysqli_num_rows($check);

  if($checkrows>0) {
    echo '<script type="text/javascript">';
    echo 'alert("Attendance Already Taken");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
  }else{
    $i=0;
    while($i<sizeof($attendance)){
    //SQL query to insert data 
    $sql = "INSERT INTO attendance_record (sid, rollno, course, year, sem, subject, date, attendance_stat)
    VALUES ('$sid[$i]', '$roll_no[$i]', '$course', '$batch','$sem','$subject','$date','$attendance[$i]')";
    $conn->query($sql);
    $i++;
  }
  echo '<script type="text/javascript">';
  echo 'alert("Record Stored");';
  echo 'window.location.href = "index.php";';
  echo '</script>';
  }
?>
