<?php
  require_once("../ses_check.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin_View_Attendance</title>
  <link rel="stylesheet" href="css/VT_attendance.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
</head>
<body>

  <div class="VTA"><!-- View Total attendance -->

    <form action="attendance_fetch.php" method="post">
      <h1 class="Title_VAT">View Total Attendance</h1>

      <select class="TakeA" name="course" required>
        <option value="" disabled selected>Course</option>
        <?php
          include("../connection.php"); // Using database connection file here
          $records = mysqli_query($conn, "SELECT * From course where delete_stats=0");  // Use select query here

          while($data = mysqli_fetch_array($records))
          {
          echo "<option value='". $data['course'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
          }
        ?>
      </select>

      <input type="text" name="year" list="year" autocomplete="off" placeholder="Batch" class="TakeA batch" required maxlength="4" pattern="[2]{1}[0]{1}[0-9]{2}" title="Please enter valid Year">
      <datalist id="year">
        <option>2074</option>
        <option>2075</option>
        <option>2076</option>
        <option>2077</option>
        <option>2078</option>
      </datalist>

      <select class="TakeA" name="sem" required>
        <option value="" disabled selected>Semester</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>

      <select class="TakeA" name="subject" required>
        <option value="" disabled selected>Subject</option>
        <?php
          $records1 = mysqli_query($conn, "SELECT * From subjects");
          while($data = mysqli_fetch_array($records1))
          {
          echo "<option value='". $data['subject'] ."'>" .$data['subject'] ."</option>";  // displaying data in option menu
          }
        ?>
      </select>
      <button class="button">View Attendance</button>

    </form>
  </div>


  <!-- Check Student Eligibility For Exam -->
  <div class="container">

    <form action="exam.php" method="get">
      <h1 class="Title_VAT">Check Student Eligibility For Exam</h1>

      <select class="TakeA" required name="course">
        <option value="" disabled selected >Course</option>
        <?php
          include("../connection.php"); // Using database connection file here

          // Use select query here
          $records = mysqli_query($conn, "SELECT * From course where delete_stats=0");

          while($data = mysqli_fetch_array($records))
          {
          echo "<option value='". $data['course'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
          }
        ?>
      </select>

      <input type="text" name="year" list="year" autocomplete="off" placeholder="Batch" class="TakeA batch" required maxlength="4" pattern="[2]{1}[0]{1}[0-9]{2}" title="Please enter valid Year">
      <datalist id="year">
        <option>2074</option>
        <option>2075</option>
        <option>2076</option>
        <option>2077</option>
        <option>2078</option>
      </datalist>

      <select class="TakeA" required name="sem">
        <option disabled selected value="">Semester</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>

      <select class="TakeA" name="subject" required>
        <option disabled selected value="">Subject</option>
        <?php
          $records1 = mysqli_query($conn, "SELECT * From subjects");
          while($data = mysqli_fetch_array($records1))
          {
          echo "<option value='". $data['subject'] ."'>" .$data['subject'] ."</option>";  // displaying data in option menu
          }
        ?>
      </select>
      <button class="button">Check</button>
    </form>
  </div>


  <div> <!-- Live Attendance Record -->
    <h1 class="live-title">Attendance Live update</h1>
    <?php
      include("../connection.php");

      $today=date('Y-m-d');
      $sql="SELECT course,sem,attendance_stat,count(attendance_stat) as number from attendance_record WHERE `date`='$today' group by course,sem, attendance_stat order by attendance_stat";

      $result=$conn->query($sql);
      if($result->num_rows >0){
    ?>

    <div class="live">
      <table>
        <tr>
          <td>Course</td>
          <td>Semester</td>
          <td>Status</td>
          <td>Number</td>
        </tr>
        <?php
          while($row=$result-> fetch_assoc()){?>
            <tr>
              <td><?php echo $row["course"]?></td>
              <td><?php echo$row["sem"]?></td>
              <td><?php echo$row["attendance_stat"]?></td>
              <td><?php echo$row["number"]?></td>
            </tr><?php
          }
          }
          else{?>
            <h1 class="live-message">Attendance record will be visible once it's taken.</h1>
            <?php
          }?>
      </table>
    </div>
  </div>
</body>
</html>
