<?php
  include("../connection.php");
  require_once("../ses_check.php");

  if(isset($_POST['view_btn'])){}
  $course=$_POST['course'];
  $sem=$_POST['sem'];

  //SQL query to fetch data on table
  $sql="SELECT * from subjects where cid=$course and sem_id=$sem";
  $result=mysqli_query($conn,$sql);

  //SQL quary to display course
  $sql1="SELECT * from course where cid=$course";
  $result1=mysqli_fetch_array(mysqli_query($conn,$sql1));

  //SQL query to check data if available
  $check=mysqli_query($conn,"SELECT * from subjects where cid=$course and sem_id=$sem");
  $checkrows=mysqli_num_rows($check);

  //Condition to check and view student attendance data and show if available else alert a message
  if($checkrows>0) {?>

    <html>
      <head>
        <title>Curricular structure</title>
        <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
        <link rel="stylesheet" href="CSS/subject_dbcon.css">
      </head>

      <body>

        <div class="container">

          <div class="data">
            <a href="javascript:window.history.back();" class="arrow left"></a>
          </div>

          <table>
            <caption class="course_head"><?php echo"Course:$result1[0] Semester:$sem " ?></caption>
            <tr>
              <th>Course Code</th>
              <th>Course Title</th>
            </tr>
            <tr>
              <?php
              while($row=mysqli_fetch_array($result)){
              ?>
              <td>
                <?php echo $row['sid']; ?>
              </td>

              <td>
                <?php echo $row['subject']; ?>
              </td>
            </tr>
            <?php }?>
          </table>
        </div>
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