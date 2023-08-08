<?php
  include("../connection.php");
  require_once("../ses_check.php");

  $course=$_GET['course'];
  $year=$_GET['year'];
  $sem=$_GET['sem'];
  $subject=$_GET['subject'];

  //SQL query to display attendance record from database.
  $sql="SELECT DISTINCT sid, rollno, First_Name, Last_Name FROM `attendance_record` a natural join`student` s WHERE a.course= '$course'  AND a.year='$year' AND a.sem=$sem AND a.subject='$subject' ORDER BY `rollno`" ;
  $result=$conn->query($sql);

  //SQL query to check data if available
  $check=mysqli_query($conn,"SELECT * FROM `attendance_record` a natural join`student` s WHERE a.course= '$course'  AND a.year='$year' AND a.sem=$sem AND a.subject='$subject'");
  $checkrows=mysqli_num_rows($check);

  //Condition to check and view student attendance data and show if available else send a message
  if($checkrows>0) {?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>Student-Exam-Elegibility-List</title>
      <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
      <link rel="stylesheet" href="css/exam.css">
    </head>

    <body>
      <div class="container">
        <div class="header">
          <a href="index.php" class="arrow left"></a>
          <?php echo $year." ".$course." ".$sem." ".$subject."<br>";?>
        </div>
        <div class="header2">
         <?php echo "Student Exam Elegibility List";?>
         <button class="download-btn" onClick="exportTableToCSV('<?php echo $year." ".$course." ".$sem." ".$subject;?> Student-Exam-Elegibility-List.csv')">Download</button>
        </div>

        <div class="container2">
          <table>
            <thead>
              <th class="view">SID</th>
              <th class="view">Roll No</th>
              <th class="view">First Name</th>
              <th class="view">Last Name</th>
              <th class="view">Present Days</th>
              <th class="view">Absent Days</th>
              <th class="view">Leave Days</th>
              <th class="view">Total Days</th>
              <th class="view">Attendance Percentage</th>
              <th class="View">Eligibility</th>
            </thead>

            <!-- php code to display sql table  -->

            <?php
            if($result){
              while($row=$result->fetch_assoc()){
                $roll=$row["rollno"];
                $std_ID=$row["sid"];
                $fname=$row["First_Name"];
                $lname=$row["Last_Name"];
                ?>
                <tr>
                  <td><?php echo $std_ID; ?></td>
                  <td><?php echo $roll; ?></td>
                  <td><?php echo $fname ?></td>
                  <td><?php echo $lname ?></td>

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

                  <td><?php
                        // $mathematical expression to calculate % Present/Total Days *100%
                        if($row1['c'] > 0){
                            $percentage=($row1['c']/$row4['attendance_stat'])*100;
                            echo round($percentage, 2)."%";
                         }else{
                           echo"NA";
                          }
                      ?>
                  </td>

                  <td><?php
                      if($row1['c'] > 0){
                          $percentage=($row1['c']/$row4['attendance_stat'])*100;

                       }else{
                         $percentage="NA";
                        }

                        if($percentage>= 80){
                            echo "<font color='green'>Elegible</font>";
                          }elseif ($percentage="NA") {
                            echo "<font color='red'>Not Elegible</font>";
                          }else{
                            echo "<font color='red'>Not Elegible</font>";
                          }
                      ?>
                  </td>

                </tr>
              <?php } ?>
            </table>

            <?php }
            else{
              echo"0 result";
            }
            $conn->close();
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

              for (var j = 0; j < 10; j++)
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
    echo 'alert("Your request is not valid. Please provide a valid input field");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
  }
?>
