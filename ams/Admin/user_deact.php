<!-- Teacher De-Activation -->
<?php
  require_once("../ses_check.php");
  include("../connection.php");

  $sql="UPDATE `teacher` SET `Active_status` = '0' WHERE tid='".$_GET['id']."'";
  echo 'Deactivated successfully.';
  if($conn->query($sql)){ ?>
  <script>
    alert('User Deactivated');
    window.location='index.php#teacher';
  </script>
  <?php
  }else{
	echo "Not Deactivated";
  }
?>

<!-- Student DE-activation -->
<?php
  require_once("../ses_check.php");
  include("../connection.php");

  $sql2="UPDATE `student` SET `Active_status` = '0' WHERE sid='".$_GET['id']."'";
  echo 'Deactivated successfully.';
  if($conn->query($sql2)){ ?>
    <script>
      alert('User Deactivated');
      window.location='index.php#student';
    </script>
  <?php
  }else{
    echo "Not Deactivated";
  }
?>

