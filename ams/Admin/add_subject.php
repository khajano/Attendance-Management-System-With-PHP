<?php
  include("../connection.php");
  require_once("../ses_check.php");

  $course=$_POST['course'];
  $sem=$_POST['sem'];
  $subject=$_POST['new_subject'];
  $sub_code=$_POST['sid'];

  $sql = "INSERT INTO subjects (sid,subject,cid,sem_id)
  VALUES ('$sub_code','$subject','$course','$sem')";

  if ($conn->query($sql) === TRUE) {

    ?>
      <script>
        alert("New Subject Added");
        window.location='index.php#subject';
      </script>
    <?php
  } else {
    echo'<script>
  alert("Subject already exist");
  window.location="index.php#subject";
  </script>';
  }

  $conn->close();
?>