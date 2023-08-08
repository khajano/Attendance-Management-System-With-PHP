<?php
  require_once("../ses_check.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Course</title>
  <link rel="stylesheet" href="css/course.css">
  <link rel="icon" type="image/png" href="../Assist/img/AMS.png"/>
</head>

<body>
  <div class="main">
    <table>
      <tr>
        <td class="ctable">Course</td>
        <td class="ctable">cid</td>
        <td class="ctable">Action</td>
      </tr>

      <!-- php code to display sql table  -->
      <?php 
      $conn=mysqli_connect("localhost","root","","ams");
      if($conn->connect_error){
        die("connection failed".$conn->connect_error);
      }

      $sql="SELECT All course,cid from course where delete_stats=0";
      $result=$conn->query($sql);

      if($result -> num_rows >0){
        while($row=$result-> fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row["course"]?></td>
            <td><?php echo$row["cid"]?></td>

            <td>
              <a href="delete.php?cid=<?php echo$row["cid"];?>" onclick="return confirm('Confirm Delete')">
               <input id="Delete" type="button" name="Delete" value="Delete" class="button"/>
              </a>
            </td>
          </tr>
          <?php
        }
      }
      else{
        echo"0 result";
      }
      $conn->close();
      ?>
    </table>

    <!-- Insert new data on SQL -->
    <form action="insert.php" method="post">
      <table>
        <tr>
          <td> 
            <input type="text" name="new" required placeholder="New course">
            <input type="submit" name="submit" value="Add" class="button">
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>