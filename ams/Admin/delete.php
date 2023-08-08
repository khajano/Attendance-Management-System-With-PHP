<?php
  //Deleting data on Course
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ams";
  $delete=$_GET['cid'];

  $conn = new mysqli($servername, $username, $password, $dbname);

  // sql to delete a record
  $sql = "UPDATE course set delete_stats=1 WHERE cid=$delete";

  if ($conn->query($sql) === TRUE) {
    echo '<script>
    alert("Record deleted successfully");
    window.location="index.php#course";
    </script>';
  } else {
    echo'<script>
    alert(""Error deleting record: " . $conn->error;");
    window.location="index.php#course";
    </script>';
  }
  header("location:index.php#course");
?>