<?php
  require_once("../ses_check.php");
  include("../connection.php");
  if(isset($_POST['search'])){
    $searchkey=$_POST['search'];
    $sql="SELECT * FROM student,course WHERE  CONCAT(`sid`, `First_Name`, `Last_Name`, `User_name`, `contact`, `email`)LIKE'%$searchkey%'AND student.cid=course.cid";
  }else{
    $sql="SELECT * FROM student,course where student.cid=course.cid";
    $searchkey="";
  }
  $result=mysqli_query($conn,$sql);
?>
<table>
  <thead>
    <th>Roll no.</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>User Name</th>
    <th>Batch</th>
    <th>Course</th>
    <th>Semester</th>
    <th>Contact Number</th>
    <th>Email</th>
    <th colspan="3">Action</th>
  </thead>
  <!-- php code to display sql table  -->
  <?php
    while($row =mysqli_fetch_assoc($result)){
      $userID=$row["sid"];
      $roll_no=$row["rollno"];
      $fname=$row["First_Name"];
      $lname=$row["Last_Name"];
      $uname=$row["User_name"];
      $year=$row["year"];
      $course=$row['course'];
      $sem_id=$row["sem_id"];
      $contact=$row["contact"];
      $email=$row["email"];
      ?>

      <tr>
      <td><?php echo $roll_no;?></td>
      <td><?php echo $fname;?></td>
      <td><?php echo $lname;?></td>
      <td><?php echo $uname;?></td>
      <td><?php echo $year;?></td>
      <td><?php echo $course;?></td>
      <td><?php echo $sem_id;?></td>
      <td><?php echo $contact;?></td>
      <td><?php echo $email;?></td>

      <td><!-- Edit Student -->
        <a href="std_edit.php?GetID=<?php echo $userID?>" onclick="return confirm('Confirm Edit')">
        <input id="Edit" type="button" name="Edit" value="Edit" class="btn-action"/>
        </a>
      </td>

      <td><!-- Activate De-Activate Student -->
        <?php
            if ($row['Active_Status']==1){ ?>
              <a href="user_deact.php?id=<?php echo $row['sid']?>" onclick="return confirm('Deactivating')">
                <input id="deact" type="button" name="Deactive" value="Deactivate" class="btn-action" />
              </a>
            <?php }else { ?>
                <a href="user_act.php?id=<?php echo $row['sid']?>" onclick="return confirm('Activating')">
                  <input id="act" type="button" name="Active" value="Activate" class="btn-action" />
                </a>
            <?php }
          ?>
      </td>
      </tr>
    <?php
    }
  ?>
</table>