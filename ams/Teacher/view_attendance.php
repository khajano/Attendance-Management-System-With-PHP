<?php
  include("../connection.php");
  require_once("../ses_check.php");

  $course=$_GET['course'];
  $year=$_GET['year'];
  $sem=$_GET['sem'];
  $subject=$_GET['subject'];
  $date=$_GET['date'];

  //SQL query to display attendance record from database.
  $sql="SELECT * FROM `attendance_record` a natural join`student` s WHERE a.course= '$course'  AND a.year='$year' AND a.sem=$sem AND a.subject='$subject' AND a.date='$date' order by rollno" ;
  $result=$conn->query($sql);

  //SQL query to check data if available
  $check=mysqli_query($conn,"SELECT * FROM `attendance_record` a natural join`student` s WHERE a.course= '$course'  AND a.year='$year' AND a.sem=$sem AND a.subject='$subject' AND a.date='$date'");
  $checkrows=mysqli_num_rows($check);

  //Condition to check and view student attendance data and show if available else send a message
  if($checkrows>0) {?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>View_Attendance.php</title>
      <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
      <link rel="stylesheet" href="css/view_attendance.css">
    </head>

    <body>
      <div class="container">
        <div class="header">
          <a href="index.php" class="arrow left"></a>
          <h1 class="Title"><?php echo $year." ".$course." ".$sem." ".$subject." ".$date;?></h1>
          <button class="download-btn" onClick="exportTableToCSV('<?php echo $year." ".$course." ".$sem." ".$subject." ".$date;?> Attendance status.csv')">Download Attendance</button>
        </div>

        <div class="container2">
          <table>
            <thead>
              <th class="view">SID</th>
              <th class="view">Roll No</th>
              <th class="view">First Name</th>
              <th class="view">Last Name</th>
              <th class="view">Attendance</th>
              <th class="view">Action</th>
              <th class="view">Present Days</th>
              <th class="view">Absent Days</th>
              <th class="view">Leave Days</th>
              <th class="view">Total Days</th>
            </thead>

            <!-- php code to display sql table  -->

            <?php
            if($result){
              while($row=$result->fetch_assoc()){
                $roll=$row["rollno"];
                $std_ID=$row["sid"];
                $attendance=$row["attendance_stat"];
                $fname=$row["First_Name"];
                $lname=$row["Last_Name"];
                ?>
                <tr>
                  <td><?php echo $std_ID; ?></td>
                  <td><?php echo $roll; ?></td>
                  <td><?php echo $fname ?></td>
                  <td><?php echo $lname ?></td>
                  <td><?php echo $attendance; ?></td>
                  <td>
                    <a href="edit.php?stdID=<?php echo $std_ID;?>&fname=<?php echo $fname;?>&lname=<?php echo $lname;?>&course=<?php echo $course;?>&year=<?php echo $year;?>&sem=<?php echo $sem;?>&subject=<?php echo $subject;?>&date=<?php echo $date;?>&roll=<?php echo $roll;?>&attendance=<?php echo $attendance ?>" onclick="return confirm('Confirm Edit')"><!-- Edit Student Attendance -->
                    <input type="button" name="Edit" Value="Edit" class="Edit_btn"/>
                    </a>
                  </td>

                  <?php
                  $sid=$row['sid'];
                  $sql1="SELECT COUNT(*) as c FROM attendance_record WHERE  attendance_stat='present' and sid=$sid and subject='$subject'";
                  $data1=mysqli_query($conn,$sql1);
                  $row1=mysqli_fetch_assoc($data1);
                  ?>
                  <td><?php echo $row1['c'] ?></td>

                  <?php
                  $sid=$row['sid'];
                  $sql2="SELECT COUNT(*) as c FROM attendance_record WHERE  attendance_stat='absent' and sid=$sid and subject='$subject'";
                  $data2=mysqli_query($conn,$sql2);
                  $row2=mysqli_fetch_assoc($data2);
                  ?>
                  <td><?php echo $row2['c'] ?></td>

                  <?php
                  $sid=$row['sid'];
                  $sql3="SELECT COUNT(*) as c FROM attendance_record WHERE  attendance_stat='leave' and sid=$sid and subject='$subject'";
                  $data3=mysqli_query($conn,$sql3);
                  $row3=mysqli_fetch_assoc($data3);
                  ?>
                  <td><?php echo $row3['c'] ?></td>

                  <?php
                  $sid=$row['sid'];
                  $sql4="SELECT count( * ) as attendance_stat FROM attendance_record WHERE sid='$sid'";
                  $data4=mysqli_query($conn,$sql4);
                  $row4=mysqli_fetch_assoc($data4);
                  ?>
                  <td><?php echo $row4['attendance_stat'] ?></td>

                </tr>
            <?php }}
            else{
              echo"0 result";
            }
            $conn->close();
            ?>
          </table>
          
          <!-- This section displays additional information about student attendance -->
          <div class="xtra">
            <?php
            include("../connection.php");

            // displays total student
            $sqlT="SELECT COUNT(*) as c FROM attendance_record WHERE course='$course' and year='$year' and sem='$sem' and subject='$subject' and date='$date'";
            $dataT=mysqli_query($conn,$sqlT);
            $rowT=mysqli_fetch_assoc($dataT);
            echo"
              <div class='iextra'>"."
                <p class='extra'>"."Total Student: ".$rowT['c']."</p>
              "."</div>
            ";

            //displays present and percentage of student present
            $sql5="SELECT COUNT(*) as c FROM attendance_record WHERE attendance_stat='Present'and course='$course' and year='$year' and sem='$sem' and subject='$subject' and date='$date'";
            $data5=mysqli_query($conn,$sql5);
            $row5=mysqli_fetch_assoc($data5);
            $percentage5=($row5['c']/$rowT['c'])*100;
            echo"
              <div class='iextra'>"."
                <p class='extra'>"."Present: ".$row5['c']."</p>
                <p class='extra'>".round($percentage5, 2)."%"."</p>
              "."</div>
            ";

            // displays absent and percentage of student absent
            $sql6="SELECT COUNT(*) as c FROM attendance_record WHERE attendance_stat='Absent'and course='$course' and year='$year' and sem='$sem' and subject='$subject' and date='$date'";
            $data6=mysqli_query($conn,$sql6);
            $row6=mysqli_fetch_assoc($data6);
            $percentage6=($row6['c']/$rowT['c'])*100;
            echo"
              <div class='iextra'>"."
                <p class='extra'>"."Absent: ".$row6['c']."</p>
                <p class='extra'>".round($percentage6, 2)."%"."</p>
              "."</div>
            ";

            //displays leave and percentage of student leave
            $sql7="SELECT COUNT(*) as c FROM attendance_record WHERE attendance_stat='Leave'and course='$course' and year='$year' and sem='$sem' and subject='$subject' and date='$date'";
            $data7=mysqli_query($conn,$sql7);
            $row7=mysqli_fetch_assoc($data7);
            $percentage7=($row7['c']/$rowT['c'])*100;
            echo"
              <div class='iextra'>"."
                <p class='extra'>"."Leave: ".$row7['c']."</p>
                <p class='extra'>".round($percentage7, 2)."%"."</p>
              "."</div>
            ";
            ?>
          </div>
        </div>
      </div>

      <script>
        function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {type: "text/csv"});

        // Download link
        downloadLink = document.createElement("a");
        downloadLink.download = filename;

        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
        }

        function exportTableToCSV(filename) {
          var csv = [];
          var rows = document.querySelectorAll("table tr");

          for (var i = 0; i < rows.length; i++) {
              var row = [], cols = rows[i].querySelectorAll("td, th");

              for (var j = 0; j < 5; j++)
                  row.push(cols[j].innerText);
              csv.push(row.join(","));
          }
          // Download CSV file
          downloadCSV(csv.join("\n"), filename);
        }
      </script>

    </body>
    </html>

    <?php
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Your request is not valid. Please take a attendance before viewing Or Provide a valid input field");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
  }
?>