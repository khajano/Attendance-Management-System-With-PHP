<?php
require_once("../ses_check.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Teacher_Subject</title>
  <link rel="stylesheet" href="css/teacher_subject.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
</head>

<body>

  <div class="container">

    <div class="AST">
      <h1 class="TitleAST">Assign Subject Teacher</h1>
    </div>

    <div class="table">
      <div class="table_r">
        <div class="ID th1">ID</div>
        <div class="Fname th1">First Name</div>
        <div class="Lname th1">Last Name</div>
        <div class="crs th1">Course</div>
        <div class="batch th1">Batch</div>
        <div class="sem th1">Semester</div>
        <div class="sub th1">Subject</div>
        <div class="operation th1">Action</div>
      </div>
      <!-- php code to display sql table  -->
      <?php 
        include("../connection.php");
        $sql="SELECT * FROM teacher;";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck >0){
          while($row =mysqli_fetch_assoc($result)){ ?>

          <form action="teacher_subject_db.php" method="get" class='table_r'>

            <div class="ID"><a href="adminTeacherProfile.php ?ID=<?php echo $row['tid'];?>"><input name="tid" class="id" type="text" value="<?php echo $row["tid"]; ?>"></a></div>
            <div><input class="fname" type="text" value="<?php echo $row["First_Name"]; ?>"></div>
            <div><input class="lname" type="text" value="<?php echo $row["Last_Name"]; ?>"></div>
            <div class="crs">
              <select required name="course" class="TakeA">
                <option value="" disabled selected>Select Course</option>
                <?php
                  include("../connection.php"); // Using database connection file here
                  $records = mysqli_query($conn, "SELECT * From course where delete_stats=0");  // Use select query here 

                  while($data = mysqli_fetch_array($records))
                  {
                  echo "<option name='cid' value='". $data['course'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
                  }	
                  ?>
              </select>
            </div>

            <div class="batch">
              <input type="number" name="year" list="year" autocomplete="off" placeholder="Select Batch" class="TakeA YB" required>
              <datalist id="year">
                <option>2074</option>
                <option>2075</option>
                <option>2076</option>
                <option>2077</option>
                <option>2078</option>
              </datalist>
            </div>

            <div class="sem">
              <select class="TakeA" required name="sem">
                <option value="">Select Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>

            <div class="sub">
              <select class="TakeA" name="subject" required>
                <option value="" disabled selected>Select Subject</option>
                <?php
                include("../connection.php"); // Using database connection file here
                $records = mysqli_query($conn, "SELECT * From subjects");  // Use select query here 

                while($data = mysqli_fetch_array($records))
                { ?>
                <option value="<?php echo $data['sid']?>"> <?php echo $data['subject'];?></option>
                <!-- displaying data in option menu-->
                <?php
                }	
              ?>
              </select>
            </div>

            <div>
              <input type="submit" value="Assign" class="button">
            </div>
          </form>
          <?php 
        }
       }
      ?>
  </div>
</body>
</html>