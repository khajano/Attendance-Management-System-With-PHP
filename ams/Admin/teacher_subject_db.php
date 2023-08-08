<!-- Store Assigned Teacher -->
<?php
  require_once("../ses_check.php");
  include("../connection.php");
  $tid=$_GET['tid'];
  $sid=$_GET['subject'];
  $course=$_GET['course'];
  $batch=$_GET['year'];
  $sem=$_GET['sem'];

  $sql = "INSERT INTO teacher_subject (`tid`,`sid`,`course`,`year`,`sem_id`) VALUES ('$tid', '$sid', '$course', '$batch', '$sem')";
  if($conn->query($sql)){ ?>
    <script>
      alert('Assigned');
      window.location='index.php#Subject_teacher';
    </script>
    <?php
  }else
  {
  echo "Not Assigned";
  }
?>