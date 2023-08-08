<?php
  require_once("../ses_check.php");
  include("../connection.php");
  $name= $_SESSION['username'];
  $sql="SELECT * FROM teacher where User_name='$name'";
  $data=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
  <link rel="stylesheet" href="css/teacher.css">
</head>

<body>
  <div id="MC">

    <div class="container"><!-- Take attendance -->

      <div class="header">
        <img src="../Assist/img/AMS.png" class="logo">  
        <h1 class="title">
          <span>Attendance Management System</span>
        </h1>
        <div class="data">
          <p class="T-Name">Teacher:<a href="TeacherProfile.php?ID=<?php echo $tid=$row['tid'];?>"><?php $tid=$row['tid']; echo $row['First_Name']." ".$row['Last_Name'];?></a></p>
          <a href="../ses_clear.php">Click to Logout</a>
        </div>
      </div>

      <form action="attendance.php" method="post">
        <h1>Take Attendance</h1>

        <select class="TakeA" required name="course">
          <option value="" disabled selected >Course</option>
          <?php
            include("../connection.php"); // Using database connection file here
            
            // Use select query here 
            $records = mysqli_query($conn, "SELECT * From course c natural join teacher_subject ts where ts.tid=$tid");

            while($data = mysqli_fetch_array($records))
            {
            echo "<option value='". $data['cid'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
            }	
          ?> 
        </select>

        <input type="text" name="year" list="year" autocomplete="off" placeholder="Batch" class="TakeA YB" required maxlength="4" pattern="[2]{1}[0]{1}[0-9]{2}" title="Please enter valid Year">
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
            include("../connection.php"); // Using database connection file here
            $records1 = mysqli_query($conn, "SELECT * From subjects s natural join teacher_subject ts where ts.tid=$tid");  // Use select query here 

            while($data = mysqli_fetch_array($records1))
            {
            echo "<option value='". $data['subject'] ."'>" .$data['subject'] ."</option>";  // displaying data in option menu
            }	
          ?> 
        </select>

        <button class="button">Take Attendance</button>

      </form>
    </div>

    <div class="container"><!-- View attendance -->

      <form action="view_attendance.php" method="get">
        <h1>View Attendance</h1>

        <select class="TakeA" required name="course">
          <option value="" disabled selected >Course</option>
          <?php
            include("../connection.php"); // Using database connection file here

            // Use select query here 
            $records = mysqli_query($conn, "SELECT * From course c natural join teacher_subject ts where ts.tid=$tid");

            while($data = mysqli_fetch_array($records))
            {
            echo "<option value='". $data['course'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
            }	
          ?> 
        </select>

        <input type="text" name="year" list="year" autocomplete="off" placeholder="Batch" class="TakeA YB" required maxlength="4" pattern="[2]{1}[0]{1}[0-9]{2}" title="Please enter valid Year">
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
            $records1 = mysqli_query($conn, "SELECT * From subjects s natural join teacher_subject ts where ts.tid=$tid");
            while($data = mysqli_fetch_array($records1))
            {
            echo "<option value='". $data['subject'] ."'>" .$data['subject'] ."</option>";  // displaying data in option menu
            }	
          ?> 
        </select>
        <input class="TakeA" type="date" name="date" required>

        <button class="button">View Attendance</button>
      </form>
    </div>

    <div class="container"><!-- View Total attendance -->

      <form action="view_Total_attendance.php" method="post">
        <h1>View Total Attendance</h1>

        <select class="TakeA" required name="course">
          <option value="" disabled selected >Course</option>
          <?php
            include("../connection.php"); // Using database connection file here

            $records = mysqli_query($conn, "SELECT * From course c natural join teacher_subject ts where ts.tid=$tid"); // Use select query here

            while($data = mysqli_fetch_array($records))
            {
            echo "<option value='". $data['course'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
            }
          ?>
        </select>

        <input type="text" name="year" list="year" autocomplete="off" placeholder="Batch" class="TakeA YB" required maxlength="4" pattern="[2]{1}[0]{1}[0-9]{2}" title="Please enter valid Year">
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
            $records1 = mysqli_query($conn, "SELECT * From subjects s natural join teacher_subject ts where ts.tid=$tid");
            while($data = mysqli_fetch_array($records1))
            {
            echo "<option value='". $data['subject'] ."'>" .$data['subject'] ."</option>";  // displaying data in option menu
            }
          ?>
        </select>
        <button class="button">View Attendance</button>

      </form>
    </div>
  </div>
</body>
</html>