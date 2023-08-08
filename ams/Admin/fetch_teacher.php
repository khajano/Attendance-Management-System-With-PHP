<?php
  require_once("../ses_check.php");
  include("../connection.php");
  if(isset($_POST['search'])){
    $searchkey=$_POST['search'];
    $sql="SELECT * FROM teacher WHERE  CONCAT(`tid`, `First_Name`, `Last_Name`, `user_name`, `contact_number`, `email`)LIKE'%$searchkey%'";
  }else{
    $sql="SELECT * FROM teacher";
    $searchkey="";
  }
  $result=mysqli_query($conn,$sql);
?>

<table>
  <thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>User Name</th>
    <th>Contact Number</th>
    <th>Email</th>
    <th colspan="3">Action</th>
  </thead>
  <!-- php code to display sql table  -->
  <?php
    while($row =mysqli_fetch_assoc($result)){
      $userID=$row["tid"];
      $fname=$row["First_Name"];
      $lname=$row["Last_Name"];
      $uname=$row["user_name"];
      $contact=$row["contact_number"];
      $email=$row["email"];
      ?>
      <tr>
        <td><?php echo $userID; ?></td>
        <td><?php echo $fname; ?></td>
        <td><?php echo $lname; ?></td>
        <td><?php echo $uname; ?></td>
        <td><?php echo $contact; ?></td>
        <td><?php echo $email; ?></td>

        <td><!-- Edit Teacher -->
          <a href="edit.php?GetID=<?php echo $userID?>" onclick="return confirm('Confirm Edit')">
          <input id="Edit" type="button" name="Edit" value="Edit" class="btn-action"/>
          </a>
        </td>

        <td><!-- Activate De-Activate Teacher -->
          <?php
            if ($row['Active_Status']==1){ ?>
              <a href="user_deact.php?id=<?php echo $row['tid']?>" onclick="return confirm('Deactivating')">
                <input id="deact" type="button" name="Deactive" value="Deactivate" class="btn-action" />
              </a>
            <?php }else { ?>
                <a href="user_act.php?id=<?php echo $row['tid']?>" onclick="return confirm('Activating')">
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