<?php
  require_once("../ses_check.php");
  include("../connection.php");

  $course=$_GET["course"];
  $year=$_GET["year"];
  $sem=$_GET["sem"];
  $std_ID=$_GET["sid"];
  $attendance=$_GET['attendance'];
  $subject=$_GET['subject'];
  $date=$_GET['date'];

  $query="UPDATE attendance_record SET attendance_stat='$attendance' WHERE sid='$std_ID' AND subject='$subject' AND date='$date' ";
  
  $result=mysqli_query($conn,$query);

  if($result){
    echo'<script> alert("Updated");</script>';

    echo ("<script>location.href='view_attendance.php?course=$course&year=$year&sem=$sem&subject=$subject&date=$date'</script>");
  }
?>