<?php
  include("connection.php");
  if (isset($_POST['regd_btn'])) {

    $fname=$_POST['First_Name'];
    $lname=$_POST['Last_Name'];
    $uname=$_POST['user_name'];
    $year=$_POST['year'];
    $course=$_POST['course'];
    $sem=$_POST['sem'];
    $roll_no=$_POST['roll_no'];
    $password=md5($_POST['password']);
    $con_password=md5($_POST['confirm_password']);
    $cont_number=$_POST['contact_number'];
    $email=$_POST['email'];

  	$sql_u = "SELECT * FROM student WHERE User_name='$uname'";
  	$res_u = mysqli_query($conn, $sql_u);

  	if (mysqli_num_rows($res_u) > 0) {
  	  echo "Sorry... username already taken";
  	}else if($password===$con_password){
      $sql = "INSERT INTO `student`(`First_Name`,`Last_Name`,`User_name`,`password`,`year`,`sem_id`,`rollno`,`cid`,`contact`,`email`,`Active_status`)
      VALUES ( '$fname','$lname','$uname','$password','$year','$sem','$roll_no','$course',$cont_number,'$email',0)";
      $result_treg=$conn->query($sql);

      if ($result_treg=== TRUE) {
        echo '<script>
          alert("New record created successfully");
          window.location="index.php";
        </script>';
      }
  	}else {
      echo '<script>
      alert("Password does not match. Please enter same password on both password field.");
      window.location="register.php";
    </script>';
    }
  }
?>