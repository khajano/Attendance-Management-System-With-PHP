<?php
require_once("../ses_check.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Course_Subject</title>
  <link rel="stylesheet" href="css/subject.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
  <style>
    .subjectTitle{
    font-family: monospace;
    color:rgb(0, 152, 253);
    }
  </style>
</head>

<body>
  <div id="Container">
    <!-- Section to view subject according course semester -->
    <div id="view_curricular">

      <form action="subject_dbcon.php" method="post">

        <h3 class="subjectTitle">Curricular structure</h3>
        <select class="VC" name="course" required>
          <option value="" disabled selected>Course</option>
            <?php
              include("../connection.php"); // Using database connection file here
              $records = mysqli_query($conn, "SELECT * From course where delete_stats=0");  // Use select query here 
      
              while($data = mysqli_fetch_array($records))
              {
                echo "<option value='". $data['cid'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
              }	
            ?> 
            <?php mysqli_close($conn);  // close connection ?>
        </select>

        <select class="VC" name="sem" required>
          <option value=""disabled selected>Semester</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>
        <button type="submit" name="view_btn" id="load_me" class="btn">View</button>
      </form>
    </div>

    <!-- Section to add new course subject -->
    <div class=Add_subject_course>
      <h3 class="subjectTitle">Add subjects</h3>
      <form action="add_subject.php" method="post">
        <select name="course" class="VC" required>
          <option value="" disabled selected >Course</option>
          <?php
            include("../connection.php"); // Using database connection file here
            $records = mysqli_query($conn, "SELECT * From course where delete_stats=0");  // Use select query here 
            while($data = mysqli_fetch_array($records))
            {
              echo "<option value='". $data['cid'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
            }	
          ?> 
          <?php mysqli_close($conn);  // close connection ?>
        </select>

        <select name="sem" required class="VC" >
          <option value="">Semester</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>

        <input type="text" name="new_subject" required placeholder="Subject" class="VC">
        <input type="text" name="sid" required placeholder="Subject Code" class="VC">
        <input type="submit" name="submit" value="Add" class="btn">
      </form>
    </div>
  </div>
</body>
</html>