<?php
  //Request to enter system
  if(isset($_POST['Login_btn'])){
    $GLOBALS['uname']=$_POST['uname'];
    $password=md5($_POST['password']);
    $user_type=$_POST['user_type'];

    function db_connection($query,$head){
      include("connection.php");
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
          session_start();
          $_SESSION['username']= $GLOBALS['uname'];
          header($head);
        }
      }else {?>
        <script>
          alert("Invalid User or Password...");
          window.location='index.php';
        </script>
        <?php
      }
    }

    // Verify user and type of user
    if($user_type=='admin'){
      echo "hello  $user_type";
      $query="SELECT * FROM `admin` WHERE `user_name`='".$uname."' AND `password`='".$password."' ";
      $head='location:Admin/index.php';
      db_connection($query,$head);
    }
    else if($user_type=='teacher'){
      echo "hello  $user_type";
      $query="SELECT * FROM `teacher` WHERE `user_name`='".$uname."' AND `password`='".$password. "' AND `Active_Status`=1";
      $head='location:Teacher/index.php';
      db_connection($query,$head);
    }
    else if($user_type=='student'){
      echo "hello  $user_type";
      $query="SELECT * FROM `student` WHERE `user_name`='".$uname."' AND `password`='".$password."' AND `Active_Status`=1";
      $head='location:Student/index.php';
      db_connection($query,$head);
    }
    else {
      echo "UNAUTHORIZED";
    }

  }else {
    echo "UNAUTHORIZED";
  }
?>