<?php
require_once("../ses_check.php");
//Inserting new data on Course
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ams";
$new=$_POST['new'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Checking if course already exist
$sql_u = "SELECT * FROM course WHERE course='$new'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
  echo'<script>
  alert("Course already exist");
  window.location="index.php#course";
  </script>';
}else{
  $sql = "INSERT INTO course (course)
  VALUES ('$new')";

  if ($conn->query($sql) === TRUE) {

    echo '<script>
    alert("New record created successfully");
    window.location="index.php#course";
    </script>';

  } else {
    echo'<script>
    alert(""Error deleting record: " . $conn->error;");
    window.location="index.php#course";
    </script>';
  }
  header("location:index.php#course");
}
?>
