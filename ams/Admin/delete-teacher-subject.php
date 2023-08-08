<?php
  //Deleting data on teacher_subject table
  include("../connection.php");
  require_once("../ses_check.php");

  $tid=$_GET['tid'];
  $subject=$_GET['subject'];
  $course=$_GET['course'];
  $batch=$_GET['year'];
  $sem=$_GET['sem'];

  // sql to delete a record
  $sql = "DELETE FROM teacher_subject WHERE tid='$tid' AND sid='$subject' AND course='$course' AND year='$batch' AND sem_id='$sem'";

  if ($conn->query($sql) === TRUE) {
    echo '<script>
    alert("Record deleted successfully");
    window.location="//localhost/ams/Admin/adminTeacherProfile.php ?ID='.$tid.'";
    </script>';
  } else {
    echo'<script>
    alert(""Error deleting record: " . $conn->error;");
    window.location="//localhost/ams/Admin/adminTeacherProfile.php ?ID='.$tid.'";
    </script>';
  }
  header("location:http://localhost/ams/Admin/adminTeacherProfile.php ?ID=$tid");

?>