<?php
  include("../connection.php");
  require_once("../ses_check.php");
  $course=$_POST['course'];
  $year=$_POST['year'];
  $sem=$_POST['sem'];
  $subject=$_POST['subject'];

  //sql code to display data according to group
  $sql="SELECT * FROM `attendance_record` a natural join`student` s WHERE a.course= '$course'  AND a.year='$year' AND a.sem=$sem AND a.subject='$subject' GROUP BY a.date" ;
  $result=$conn->query($sql);

  //SQL query to check data if available
  $check=mysqli_query($conn,"SELECT * FROM `attendance_record` a natural join`student` s WHERE a.course= '$course'  AND a.year='$year' AND a.sem=$sem AND a.subject='$subject' GROUP BY a.date");
  $checkrows=mysqli_num_rows($check);

  //Condition to check and view student attendance data and show if available else alert a message
  if($checkrows>0) {?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>View_Total_Attendance.php</title>
      <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
      <link rel="stylesheet" href="css/view_Total_attendance.css">
    </head>

    <body>
      <div class="container">
        <div class="header">
          <a href="javascript:window.history.back();" class="arrow left"></a>
          <p class="Title">Student Attendance Record</p>
          <button class="download-btn" onClick="exportTableToCSV('<?php echo $year." ".$course." ".$sem." ".$subject?> Student Attendance Report.csv')">Download Record</button>
        </div>
            <!-- php code to display sql table  -->
            <?php
            if($result){
              while($row=$result->fetch_assoc()){
                $date=$row["date"];
                ?>

                <table>
                  <thead>
                    <th class="view">SID</th>
                    <th class="view">Roll No</th>
                    <th class="view">First Name</th>
                    <th class="view">Last Name</th>
                    <th class="view">Attendance</th>
                    <th class="view">Details</th>
                  </thead>

                <?php
                  //SQL Query to display attendance record table
                  $sql2="SELECT * FROM `attendance_record` a natural join`student` s WHERE a.date='$date' AND a.subject='$subject'" ;
                  $result2=$conn->query($sql2);

                  if($result2){
                    while($row=$result2->fetch_assoc()){
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
                  <td colspan="5"><?php echo $year." ".$course." ".$sem." ".$subject." ".$date;?></td>

                </tr>
              <?php } ?>

              <?php } ?>
            </table>

          <?php }}
            else{
              echo"0 result2";
            }
            ?>
          </table>
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

              for (var j = 0; j < 6; j++)
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
    echo 'alert("Your request is not valid. Provide a valid input field");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
  }
?>