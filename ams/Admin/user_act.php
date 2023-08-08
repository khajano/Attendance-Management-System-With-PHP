<!-- Teacher Activation -->
<?php
  require_once("../ses_check.php");
  include("../connection.php");

  $sql="UPDATE `teacher` SET `Active_status` = '1' WHERE tid='".$_GET['id']."'";
  echo 'Activating';
  if($conn->query($sql)){ ?>
    <script>
      alert('User Activated');
      window.location='index.php#teacher';
    </script>
  <?php
  }else{
    echo "Not Activated";
  }
  ?>

  <!-- Student Deactivation -->
  <?php
  include("../connection.php");

  $sql2="UPDATE `student` SET `Active_status` = '1' WHERE sid='".$_GET['id']."'";
  echo 'Activating';
  if($conn->query($sql2)){ ?>
    <script>
      alert('User Activated');
      window.location='index.php#student';
    </script>
  <?php
  }else{
    echo "Not Activated";
  }
?>
